<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Helper;

use Illuminate\Http\Request;

class GeneralHelper
{
    const ENCRYPT = 'encrypt';
    const DECRYPT = 'decrypt';

    private static $iv;
    private static $key;
    private static $token;

    public static function dec_enc($action, $string)
    {
        if ($string === null) {
            return null;
        }
        error_reporting(-1);
        $request = Request::createFromGlobals();
        $jwt = '';
        foreach ($request->header() as $name => $values) {
            if (strtolower($name) == 'authorization') {
                $token = explode('Bearer ', $values[0]);
                if (isset($token[1])) {
                    $jwt = $token[1];
                }
            }
        }
        self::setIv(substr($jwt, 0, 16));
        self::setKey(substr($jwt, -32));
        self::setToken(self::getIv() . self::generateToken(md5(uniqid('', true)) . md5(microtime(true))) . self::getKey());
        $output = false;
        $encrypt_method = "AES-256-CBC";
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, self::getKey(), 0, self::getIv());
        } else {
            if ($action == 'decrypt') {
                $output = openssl_decrypt($string, $encrypt_method, self::getKey(), 0, self::getIv());
            }
        }

        return $output;
    }

    /**
     * @return mixed
     */
    public static function getIv()
    {
        return self::$iv;
    }

    /**
     * @param mixed $iv
     */
    public static function setIv($iv): void
    {
        self::$iv = $iv;
    }

    private static function generateToken($data)
    {
        $cypherMethod = 'AES-256-CBC';
        $key = random_bytes(32);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypherMethod));
        return $encryptedData = openssl_encrypt($data, $cypherMethod, $key, $options = 0, $iv);
    }

    /**
     * @return mixed
     */
    public static function getKey()
    {
        return self::$key;
    }

    /**
     * @param mixed $key
     */
    public static function setKey($key): void
    {
        self::$key = $key;
    }

    /**
     * @return mixed
     */
    public static function getToken()
    {
        return self::$token;
    }

    /**
     * @param mixed $token
     */
    public static function setToken($token): void
    {
        self::$token = $token;
    }
}
