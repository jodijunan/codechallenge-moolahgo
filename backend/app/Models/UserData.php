<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Models;

class UserData
{
    /**
     * How to generate users data ?
     * Run this code below
     *
     *
        $faker = \Faker\Factory::create();
        for ($i=10; $i < 20; $i++) {
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $first = substr(str_shuffle($permitted_chars), 0, 3);
            $second = substr(str_shuffle($permitted_chars), 0, 3);
            $promoCodeBulkPurchase = $first . $second;
            $users[] = [
            'user_id' => $i,
            'given_name' => $faker->name,
            'surname' => $faker->firstName,
            'fullname' => $faker->firstName . ' ' . $faker->lastName,
            'title' => $faker->title,
            'referral_code' => $promoCodeBulkPurchase,
            'register_by' => 'EMAIL',
            'email' => $faker->email,
            'phone_number' => $faker->phoneNumber,
            ];
        }
     */
    public function __invoke()
    {
        return [
            [
                "user_id" => 1,
                "given_name" => "Danny Abernathy MD",
                "surname" => "Brandt",
                "fullname" => "Titus Orn",
                "title" => "Ms.",
                "referral_code" => "QRLUK0",
                "register_by" => "EMAIL",
                "email" => "helga.rolfson@mraz.biz",
                "phone_number" => "1-506-402-8149 x19798",
            ],
            [
                "user_id" => 2,
                "given_name" => "Ebony Kuphal",
                "surname" => "Toney",
                "fullname" => "Sarina Frami",
                "title" => "Prof.",
                "referral_code" => "FG4Z8X",
                "register_by" => "EMAIL",
                "email" => "sibyl47@jerde.com",
                "phone_number" => "1-290-218-6222",
            ],
            [
                "user_id" => 3,
                "given_name" => "Anne Orn",
                "surname" => "Freddie",
                "fullname" => "Justyn O'Connell",
                "title" => "Prof.",
                "referral_code" => "15W07M",
                "register_by" => "EMAIL",
                "email" => "vfunk@hotmail.com",
                "phone_number" => "1-887-567-4038",
            ],
            [
                "user_id" => 4,
                "given_name" => "Mariano Bernier PhD",
                "surname" => "Marion",
                "fullname" => "Erica Reinger",
                "title" => "Dr.",
                "referral_code" => "5B98JF",
                "register_by" => "EMAIL",
                "email" => "gleason.dino@hotmail.com",
                "phone_number" => "1-419-972-1736 x2603",
            ],
            [
                "user_id" => 5,
                "given_name" => "Dylan Grimes",
                "surname" => "August",
                "fullname" => "Zoie Thiel",
                "title" => "Dr.",
                "referral_code" => "IPDPW5",
                "register_by" => "EMAIL",
                "email" => "trantow.justen@hotmail.com",
                "phone_number" => "283-378-3331",
            ],
            [
                "user_id" => 6,
                "given_name" => "Jena Funk",
                "surname" => "Therese",
                "fullname" => "Anthony Tillman",
                "title" => "Prof.",
                "referral_code" => "WQDCOH",
                "register_by" => "EMAIL",
                "email" => "pkoss@hotmail.com",
                "phone_number" => "(819) 775-5950 x257",
            ],
            [
                "user_id" => 7,
                "given_name" => "Grace Hirthe",
                "surname" => "Alda",
                "fullname" => "Yolanda Greenfelder",
                "title" => "Prof.",
                "referral_code" => "DAFO6D",
                "register_by" => "EMAIL",
                "email" => "angus76@legros.com",
                "phone_number" => "430.548.4763",
            ],
            [
                "user_id" => 8,
                "given_name" => "Dr. Moises Bauch I",
                "surname" => "Dashawn",
                "fullname" => "Helen Heaney",
                "title" => "Dr.",
                "referral_code" => "U8MH7T",
                "register_by" => "EMAIL",
                "email" => "mitchel.little@yahoo.com",
                "phone_number" => "(631) 700-2872",
            ],
            [
                "user_id" => 9,
                "given_name" => "Prof. Pierre McGlynn DVM",
                "surname" => "Estella",
                "fullname" => "Addison Kilback",
                "title" => "Mr.",
                "referral_code" => "867UPE",
                "register_by" => "EMAIL",
                "email" => "kgaylord@gmail.com",
                "phone_number" => "965-330-4477 x29211",
            ],
            [
                "user_id" => 10,
                "given_name" => "Uriah Marks V",
                "surname" => "Kiera",
                "fullname" => "Morgan Heaney",
                "title" => "Prof.",
                "referral_code" => "LCAA4J",
                "register_by" => "EMAIL",
                "email" => "xborer@hotmail.com",
                "phone_number" => "572.871.9820 x3599",
            ],
            [
                "user_id" => 11,
                "given_name" => "Carlos Witting",
                "surname" => "Winifred",
                "fullname" => "Anne Wilkinson",
                "title" => "Dr.",
                "referral_code" => "NULI72",
                "register_by" => "EMAIL",
                "email" => "lavern.beier@gmail.com",
                "phone_number" => "(760) 648-7250 x520",
            ],
            [
                "user_id" => 12,
                "given_name" => "Anastasia Boehm",
                "surname" => "Mariana",
                "fullname" => "Freda Hessel",
                "title" => "Dr.",
                "referral_code" => "AZNBRH",
                "register_by" => "EMAIL",
                "email" => "gerlach.bonita@paucek.com",
                "phone_number" => "929-458-8636",
            ],
            [
                "user_id" => 13,
                "given_name" => "Emerald Ratke",
                "surname" => "Rowland",
                "fullname" => "Kris Koch",
                "title" => "Mr.",
                "referral_code" => "BHOC2U",
                "register_by" => "EMAIL",
                "email" => "joyce48@yahoo.com",
                "phone_number" => "813-319-7924",
            ],
            [
                "user_id" => 14,
                "given_name" => "Mr. Rhett Schaden DVM",
                "surname" => "Chelsea",
                "fullname" => "Keegan Predovic",
                "title" => "Mr.",
                "referral_code" => "D78REO",
                "register_by" => "EMAIL",
                "email" => "bwest@gmail.com",
                "phone_number" => "1-526-529-6418 x5462",
            ],
            [
                "user_id" => 15,
                "given_name" => "Leora Beatty Sr.",
                "surname" => "Alycia",
                "fullname" => "Reinhold Dooley",
                "title" => "Mr.",
                "referral_code" => "OV73SY",
                "register_by" => "EMAIL",
                "email" => "emard.meggie@schmitt.net",
                "phone_number" => "(521) 229-8161",
            ],
            [
                "user_id" => 16,
                "given_name" => "Grace Larkin",
                "surname" => "Ignatius",
                "fullname" => "Alivia Cummings",
                "title" => "Miss",
                "referral_code" => "WKGMVQ",
                "register_by" => "EMAIL",
                "email" => "qsimonis@bernier.com",
                "phone_number" => "(838) 938-6070",
            ],
            [
                "user_id" => 17,
                "given_name" => "Dr. Oda Moen II",
                "surname" => "Autumn",
                "fullname" => "Emerald Barrows",
                "title" => "Prof.",
                "referral_code" => "UAHBXQ",
                "register_by" => "EMAIL",
                "email" => "blanca.mcclure@will.com",
                "phone_number" => "427-607-1817",
            ],
            [
                "user_id" => 18,
                "given_name" => "Jaydon Kovacek I",
                "surname" => "Adele",
                "fullname" => "Aliya Toy",
                "title" => "Dr.",
                "referral_code" => "LWNWHZ",
                "register_by" => "EMAIL",
                "email" => "wilkinson.amparo@runte.com",
                "phone_number" => "513-601-4785",
            ],
            [
                "user_id" => 19,
                "given_name" => "Jalon Dickinson",
                "surname" => "Ara",
                "fullname" => "Maiya Mueller",
                "title" => "Prof.",
                "referral_code" => "2SB4PU",
                "register_by" => "EMAIL",
                "email" => "felix.von@yahoo.com",
                "phone_number" => "682-217-9195",
            ],
        ];
    }
}

