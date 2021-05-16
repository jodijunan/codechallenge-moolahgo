<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private static $users = [
        [
            'id' => 1,
            'name' => 'John Dawn',
            'email' => 'john@gmail.com',
            'contact_number' => '+65-32423423',
        ],
        [
            'id' => 2,
            'name' => 'Charles Garry',
            'email' => 'charles@gmail.com',
            'contact_number' => '+65-98733434',
        ],
        [
            'id' => 3,
            'name' => 'Stephen Martin',
            'email' => 'stephen@gmail.com',
            'contact_number' => '+65-45646455',
        ],
        [
            'id' => 4,
            'name' => 'Marry Sing',
            'email' => 'marry@gmail.com',
            'contact_number' => '+65-45678678',
        ],
        [
            'id' => 5,
            'name' => 'Kristen Poland',
            'email' => 'kristen@gmail.com',
            'contact_number' => '+65-45678678',
        ]
    ];

    public static function users() {
        
        return self::$users;
    }

}
