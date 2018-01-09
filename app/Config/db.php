<?php
/**
|-----------------------------------------------------------------|
| MAIN DATABASE CONFIGURATION FILE                                |
|-----------------------------------------------------------------|
| This file will hold the basic DB configuration for this         |
| instance. Please BE CAREFUL changing this file since it can     |
| lead to an unusable APP.                                        |
|-----------------------------------------------------------------|
*/
return [
    "driver"                =>          f_env("DB_DRIVER",'mysql'),
    "host"                  =>          f_env("DB_HOST" , ''),
    "database"              =>          f_env("DB_NAME" , ''),
    "username"              =>          f_env("DB_USER" , ''),
    "password"              =>          f_env("DB_PASS" , ''),
    "charset"               =>          f_env("DB_CHARSET" , 'utf8'),
    "collation"             =>          f_env("DB_COLLATION" , 'utf8_unicode_ci'),
    "prefix"                =>          f_env("DB_PREFIX" , ''),
];