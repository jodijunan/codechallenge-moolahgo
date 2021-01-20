<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

     /* In SQL, you can use

        CREATE TABLE OwnerDetails(
            ID int NOT NULL,
            Name varchar(MAX),
            Email varchar(320),
            Hp varchar(20),
            Referralcode varchar(6)
            CONSTRAINT PK_OwnerDetails PRIMARY KEY (ID)
        );

        then, to populate the table,
        INSERT INTO OwnerDetails Values ('Matthew','matthew@gmail.com','12345689', '6A2B3C');
        INSERT INTO OwnerDetails Values ('Damien','damien@gmail.com','456789', '51AC28');
        INSERT INTO OwnerDetails Values ('Jack','jack@gmail.com','234567', '13TYT1');
     */
    protected $owners = [
        [
            'name'=>'Matthew',
            'email'=>'matthew@gmail.com',
            'hp'=>'12345689',
            'referralcode'=>'6A2B3C'
        ],
        [
            'name'=>'Damien',
            'email'=>'damien@gmail.com',
            'hp'=>'456789',
            'referralcode'=>'51AC28'
        ],
        [
            'name'=>'Jack',
            'email'=>'jack@gmail.com',
            'hp'=>'234567',
            'referralcode'=>'13TYT1'
        ]
    ];

    public function getOwnerByReferralCode($referralcode)
    {
        //In SQL, assuming @referralcode is a SQL variable holding the referralcode, the command would be
        //SELECT * FROM OwnerDetails WHERE Referralcode = @referralcode

        foreach($this->owners as $owner)
        {
            if($owner['referralcode'] == $referralcode)
            {
                return $owner;
            }
        }
        return [];
    }
}
