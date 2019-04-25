<?php

namespace Homiedopie\Core;

/**
 * Main class
 */
class Main
{
    /**
     * Router object
     *
     * @var Router
     */
    protected $router;
    /**
     * Dispatcher object
     *
     * @var Dispatcher
     */
    protected $dispatcher;
    /**
     * App root
     *
     * @var string
     */
    protected $appRoot;
    /**
     * Core root
     *
     * @var string
     */
    protected $coreRoot;
    /**
     * Source root
     *
     * @var string
     */
    protected $srcRoot;
    /**
     * Storage root
     *
     * @var string
     */
    protected $storageRoot;
    /**
     * Doc root
     *
     * @var string
     */
    protected $docRoot;
    /**
     * Database config
     *
     * @var array
     */
    protected $databaseConfig;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->docRoot = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'..';
        $this->storageRoot = $this->docRoot.DIRECTORY_SEPARATOR.'storage';
        $this->srcRoot = $this->docRoot.DIRECTORY_SEPARATOR.'src';
        $this->appRoot = $this->srcRoot.DIRECTORY_SEPARATOR.'App';
        $this->coreRoot = $this->srcRoot.DIRECTORY_SEPARATOR.'Core';
        $this->router = new Router();
        $this->dispatcher = new Dispatcher();

        Template::setViewDirectory($this->appRoot.DIRECTORY_SEPARATOR.'Views');
        Session::getInstance()->start();
    }

    /**
     * Setup database based on driver
     *
     * @return void
     */
    public function setupDatabase()
    {
        $config = $this->getDatabaseConfig();
        switch ($config['driver']) {
            case 'mysql':
                $mysql_config = $config['drivers']['mysql'];
                Database::createMysqlConnection(
                    $mysql_config['host'],
                    $mysql_config['port'],
                    $mysql_config['username'],
                    $mysql_config['password']
                );
                break;
            case 'sqlite':
                $sqlite_config = $config['drivers']['sqlite'];
                Database::createSqliteConnection(
                    $sqlite_config['database'],
                    $sqlite_config['type'],
                    $sqlite_config['version']
                );
                break;
        }
    }

    /**
     * Set database config and set ups connection
     *
     * @param array $config
     * @return void
     */
    public function setDatabaseConfig($config = [])
    {
        $this->databaseConfig = $config;
        $this->setupDatabase();
    }

    /**
     * Return database config
     *
     * @return string
     */
    public function getDatabaseConfig()
    {
        return $this->databaseConfig;
    }

    /**
     * Return storage root
     *
     * @return string
     */
    public function getStorageRoot()
    {
        return $this->storageRoot;
    }

    /**
     * Return router object
     *
     * @return Router
     */
    public function router()
    {
        return $this->router;
    }

    /**
     * Start application
     *
     * @return void
     */
    public function start()
    {
        $request = new Request($_GET, $_POST, $_SERVER);

        $match = $this->router->matchRoute($request->getMethod(), $request->getPathInfo());

        if (!$match) {
            return (new Response('404', 404))->sendOutput();
        } else {
            $result = null;

            try {
                $result = $this->dispatcher->dispatch($request, $match);
            } catch (\Error $error) {
                // var_dump($error);
                // return (new Response('Something went wrong - Error', 500))->sendOutput();
                throw $error;
            } catch (\Exception $exception) {
                // var_dump($exception);
                // return (new Response('Something went wrong - Exception', 500))->sendOutput();
                throw $exception;
            }

            if (!$result) {
                error_log('Main::start - Empty response');
                return (new Response('', 200))->sendOutput();
            }

            if ($result instanceof Response) {
                return $result->sendOutput();
            }

            if (is_string($result)) {
                return (new Response($result, 200))->sendOutput();
            }

            if (is_array($result)) {
                try {
                    return (new Response(\json_encode($result), 200, [
                        'Content-Type' => 'application/json'
                    ]))->sendOutput();
                } catch (\Error $error) {
                    error_log('Main::start - Something went wrong - Error: ', $error->getMessage());
                    return (new Response('Something went wrong - Error', 500))->sendOutput();
                } catch (\Exception $exception) {
                    error_log('Main::start - Something went wrong - Exception: ', $exception->getMessage());
                    return (new Response('Something went wrong - Exception', 500))->sendOutput();
                }
            }

            error_log('Main::start - Invalid output');
            return (new Response('Invalid output', 500))->sendOutput();
        }
    }
}
