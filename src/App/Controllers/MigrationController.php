<?php

namespace Homiedopie\App\Controllers;

use Homiedopie\Core\Response;
use Homiedopie\App\Models\Record;

/**
 * MigrationController class
 */
class MigrationController
{
    public function recordUp()
    {
        (new Record())->upMigration();
        return [
            'message' => 'Successful record migration!'
        ];
    }

    public function recordDown()
    {
        (new Record())->downMigration();
        return [
            'message' => 'Successful rollback record migration!'
        ];
    }
}
