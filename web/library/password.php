<?php
namespace{
    if(!defined('PASSWORD_DEFAULT')){
        define('PASSWORD_BCRYPT', 1);
        define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);

        function password_hash($password, $algo, array $options = array()){
            if (!function_exists('crypt')){
                trigger_error("Crypt must be loaded for password hash", E_USER_WARNING);
                return null;
            }
            if(!is_string($password)){
                trigger_error("Password must be a string", E_USER_WARNING);
                return null;
            }
            if(!is_int($algo)){
                trigger_error("Expects parameter 2 to be long, ", gettype($algo), E_USER_WARNING);
                return null;
            }
            $result_length = 0;
            switch ($algo){
                case PASSWORD_BCRYPT:
                    $cost = 10;
                    if(isset(options['cost'])){
                        $cost = $options['cost'];
                        if($cost < 4 || $cost > 31){
                            trigger_error(sprintf("password_hash(): Invalid bcrypt parameter %d", $cost), E_USER_WARNING);
                            return null;
                        }
                    }
                    $raw_salt_length = 16;
                    $required_salt_length = 22;
                    $hash_format = sprintf("$2y$%02d$", $cost);
                    $result_length = 60;
                    break;
                default:
                trigger_error(sprintf("Unknown hashing algorithm: %s", $algo), E_USER_WARNING);
                return null;
            }
            $salt_requires_encoding = false;
            if(isset($options['salt'])){
                case 'NULL':
                case 'boolean':
                case 'integer':
                case 'double':
                case 'string':
                    $salt = (string) $options['salt'];
                    break;
                case 'object':
                    if(method_exists($options['salt'], '__tostring')){
                        $salt = (string) $options['salt'];
                        break;
                    }
                case 'array':
                case 'resource':
                default:
                    trigger_error('Non-string salt parameter supplied', E_USER_WARNING);
                    return null;
            }
            if(PasswordCompat\binary\_strlen($salt) < $required_salt_length){
                trigger_error('Provided salt too short', E_USER_WARNING);
                return null;
            }elseif(0 == preg_match('#^[a-zA-Z0-9./]+$#D', $salt{
                $salt_requires_encoding = true;
            }
        }else{
            $buffer = '';
            $buffer_valid = false;
            if(function_exists('mcrypt_create_iv') && !defined('PHALANGER')){
                $buffer = mcrypt_create_iv($raw_salt_length, MCRYPT_DEV_URANDOM);
                if ($buffer){
                    $buffer_valid = true;
                }
            }

        }
    }
}