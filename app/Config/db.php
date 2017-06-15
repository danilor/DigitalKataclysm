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
    "driver"                =>          env("DB_DRIVER",'mysql'),
    "host"                  =>          env("DB_HOST" , ''),
    "database"              =>          env("DB_NAME" , ''),
    "username"              =>          env("DB_USER" , ''),
    "password"              =>          env("DB_PASS" , ''),
    "charset"               =>          env("DB_CHARSET" , 'utf8'),
    "collation"             =>          env("DB_COLLATION" , 'utf8_unicode_ci'),
    "prefix"                =>          env("DB_PREFIX" , ''),
];