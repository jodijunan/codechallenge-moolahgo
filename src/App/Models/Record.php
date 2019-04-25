<?php

namespace Homiedopie\App\Models;

use Homiedopie\Core\Model;

/**
 * Record model
 */
class Record extends Model
{
    protected $table = "record";

    protected $fields  = [
        'date',
        'amount',
        'percentage',
        'final_amount',
        'fee'
    ];

    protected $migration_up  = "
        CREATE TABLE record (
            date TEXT,
            amount REAL,
            percentage REAL,
            final_amount REAL,
            fee REAL
        );
    ";

    protected $migration_down = "DROP TABLE record;";
}
