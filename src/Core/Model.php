<?php

namespace Homiedopie\Core;

/**
 * Model class
 */
abstract class Model
{
    protected $table = null;
    protected $migration_up = null;
    protected $migration_down = null;
    protected $fields = null;
    protected $saved = false;
    protected $id = null;

    /**
     * Setup model with fields
     *
     * @param array $fields
     */
    public function __construct($fields = [])
    {
        if (\is_array($fields)) {
            foreach ($fields as $key => $value) {
                if (\is_string($key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    /**
     * Convert model into readable string
     *
     * @return array
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }

    /**
     * Convert model into readable array
     *
     * @return array
     */
    public function toArray()
    {
        return \array_intersect_key(\get_object_vars($this), \array_flip($this->fields));
    }

    /**
     * Save model (upsert)
     *
     * @return boolean
     */
    public function save()
    {
        if ($this->saved) {
            $objectArray = $this->toArray();
            $columns = implode("= ?,", array_keys($objectArray));
            $values = array_values($objectArray);
            array_push($values, $this->id);
            $result = $this->prepared("UPDATE {$this->table} SET {$columns} WHERE rowid = ?", $values);
            return;
        }

        $objectArray = $this->toArray();
        $columns = implode(",", array_keys($objectArray));
        $valuesPlaceholder = implode(",", array_fill(0, count($objectArray), '?'));
        $values = array_values($objectArray);
        $result = $this->prepared("INSERT INTO {$this->table} ({$columns}) VALUES ({$valuesPlaceholder})", $values);
        if ($result) {
            $this->saved = true;
            $this->id = Database::getLastInsertId();
            return true;
        }

        return false;
    }

    /**
     * Find all records - model version
     *
     * @return array
     * @throws \Exception
     */
    public function getAll()
    {
        if (!$this->table) {
            throw new \Exception("Mode::getAll - No table set");
        }
        if (!\is_string($this->table)) {
            throw new \Exception("Mode::getAll - Table is not string");
        }
        return $this->query("SELECT * FROM {$this->table}");
    }

    /**
     * Execute query on model - wrapper
     *
     * @param string $statement
     * @return array
     */
    public function query($statement = '')
    {
        return Database::query($statement, get_class($this));
    }

    /**
     * Execute prepared query on model - wrapper
     *
     * @param string $statement
     * @return array
     */
    public function prepared($statement = null, $parameters = [], $options = [])
    {
        return Database::prepared($statement, $parameters, $options, get_class($this));
    }

    /**
     * Run migration
     *
     * @return void
     * @throws \Exception
     */
    public function upMigration()
    {
        if (!$this->migration_up) {
            return;
        }
        if (!\is_string($this->migration_up)) {
            throw new \Exception('Model::upMigration - migration_up is not a string');
            return;
        }
        $this->query($this->migration_up);
    }

    /**
     * Rollback migration
     *
     * @return void
     * @throws \Exception
     */
    public function downMigration()
    {
        if (!$this->migration_down) {
            return;
        }

        if (!\is_string($this->migration_down)) {
            throw new \Exception('Model::upMigration - migration_down is not a string');
            return;
        }

        $this->query($this->migration_down);
    }
}
