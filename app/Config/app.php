<?php
/**
|-----------------------------------------------------------------|
| MAIN APP CONFIGURATION FILE                                     |
|-----------------------------------------------------------------|
| This file will hold the basic APP configuration for this        |
| instance. Please BE CAREFUL changing this file since it can     |
| lead to an unusable APP.                                        |
|-----------------------------------------------------------------|
*/
return [
    /**
     * The APP KEY of the application. This will be used for encoding and encrypting options.
     */
    "app_key"               =>          env("KEY",''),

    /**
     * The APP URL.
     */
    "app_url"               =>          env("URL" , 'http://localhost/'),
];