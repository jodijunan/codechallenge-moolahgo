<?php

namespace Homiedopie\Core;

use \PDO;
use \PDOException;

/**
 * Database class
 */
class Database
{
    /**
     * Connection instance
     *
     * @var \PDO
     */
    protected static $connection;

    /**
     * Create Mysql Connection
     *
     * @param string $host
     * @param string $port
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $charset
     * @param array $options
     * @return void
     */
    public static function createMysqlConnection(
        $host = 'localhost',
        $port = '3306',
        $username = 'root',
        $password = null,
        $database = null,
        $charset = null,
        $options = null
    ) {
        $connectionArray = [
            'host' => $host,
            'port' => $port
        ];

        if ($database !== null) {
            $connectionArray['database'] = $database;
        }

        if ($charset !== null) {
            $connectionArray['charset'] = $charset;
        }

        if ($options === null) {
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
        }

        // Create connection string
        $connectionParsedArray = [];
        foreach ($connectionArray as $key => $value) {
            array_push($connectionParsedArray, $key .'='. $value);
        }

        $connectionString = 'mysql:'.implode(';', $connectionParsedArray);

        try {
            static::$connection = new PDO($connectionString, $username, $password, $options);
        } catch (\Excepetion $e) {
            error_log("Database::createMySqlConnection - Exception occured: " . $e->getMessage());
            throw $e;
        } catch (PDOException $e) {
            error_log("Database::createMySqlConnection - Connection failed: " . $e->getMessage());
            throw $e;
        }
    }

    public static function createSqliteConnection($database = 'test.sq3', $type = 'disk', $version = 'sqlite')
    {
        if (!\is_string($database) || !\is_string($type) || !\is_string($version)) {
            throw new \Exception("Database::createSqliteConnection - Argument must be string ");
        }

        try {
            $connectionString = $version.':'.($type === 'disk' ? $database : 'memory:');
            static::$connection = new PDO($connectionString);
        } catch (\Excepetion $e) {
            error_log("Database::createSqliteConnection - Exception occured: " . $e->getMessage());
            throw $e;
        } catch (PDOException $e) {
            error_log("Database::createSqliteConnection - Connection failed: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Database connection
     *
     * @return \PDO
     */
    public static function getConnection()
    {
        return static::$connection;
    }

    /**
     * PDO Query function
     *
     * @param string $statement
     * @param string $class
     * @return array
     */
    public static function query($statement, $class = null)
    {
        if (!static::$connection) {
            throw new \Exception('Database::$connection - There is no active connection');
            return;
        }

        if ($statement === null) {
            throw new \Exception('Database::query - Statement empty, cannot execute');
        }

        if (!\is_string($statement)) {
            throw new \Exception('Database::query - Statement must be a string');
        }

        $pdoStatement = static::$connection->query($statement);

        if ($pdoStatement === false) {
            $errorInfo = static::$connection->errorInfo();
            throw new \Exception($errorInfo[2], $errorInfo[1]);
        }

        if ($class !== null) {
            if (!\is_string($class)) {
                throw new \Exception('Database::query - Class must be a string');
            }
            return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $class);
        }

        return $pdoStatement->fetchAll();
    }

    /**
     * PDO Exec query
     *
     * @param string $statement
     * @param string $class
     * @return integer
     */
    public static function exec($statement = null, $class = null)
    {
        if (!static::$connection) {
            throw new \Exception('Database::$connection - There is no active connection');
        }

        if ($statement === null) {
            throw new \Exception('Database::exec - Statement empty, cannot execute');
        }

        if (!\is_string($statement)) {
            throw new \Exception('Database::exec - Statement must be a string');
        }

        $pdoStatement = static::$connection->exec($statement);

        if ($pdoStatement === false) {
            $errorInfo = static::$connection->errorInfo();
            throw new \Exception($errorInfo[2], $errorInfo[1]);
        }

        if ($class !== null) {
            if (!\is_string($class)) {
                throw new \Exception('Database::query - Class must be a string');
            }
            return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $class);
        }

        return $pdoStatement>fetchAll();
    }

    /**
     * PDO Execute Prepared
     *
     * @param string $statement
     * @param array $parameters
     * @param array $options
     * @param string $class
     * @return array
     */
    public static function prepared($statement = null, $parameters = [], $options = [], $class = null)
    {
        if (!static::$connection) {
            throw new \Exception('Database::$connection - There is no active connection');
        }

        if ($statement === null) {
            throw new \Exception('Database::prepared - Statement empty, cannot execute');
        }

        if (!\is_string($statement)) {
            throw new \Exception('Database::prepared - Statement must be a string');
        }

        $pdoStatement = static::$connection->prepare($statement, $options);

        if ($pdoStatement === false) {
            $errorInfo = static::$connection->errorInfo();
            throw new \Exception($errorInfo[2], $errorInfo[1]);
        }

        $executeResult = $pdoStatement->execute($parameters);
        if ($executeResult === false) {
            $errorInfo = static::$connection->errorInfo();
            throw new \Exception($errorInfo[2], $errorInfo[1]);
        }

        if ($class !== null) {
            if (!\is_string($class)) {
                throw new \Exception('Database::prepared - Class must be a string');
            }
            return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $class);
        }

        return $pdoStatement->fetchAll();
    }

    /**
     * Get last insert id
     *
     * @return integer
     */
    public static function getLastInsertId()
    {
        return Database::getConnection()->lastInsertId();
    }
}
