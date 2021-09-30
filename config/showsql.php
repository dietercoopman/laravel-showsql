<?php

return [
    'to' => [

        /*
        |--------------------------------------------------------------------------
        | Laravel Telescope
        |--------------------------------------------------------------------------
        |
        | If this telescope value is set to true all showSql logs will be sent to telescope
        | https://laravel.com/docs/8.x/telescope
        |
        */

        'telescope' => false,

        /*
        |--------------------------------------------------------------------------
        | Laravel Ray
        |--------------------------------------------------------------------------
        |
        | If this ray value is set to true all showSql logs will be sent to ray
        | https://spatie.be/docs/ray
        |
        */

        'ray' => true,

        /*
        |--------------------------------------------------------------------------
        | Itsgoingd Clockwork
        |--------------------------------------------------------------------------
        |
        | If this clockwork value is set to true all showSql logs will be sent to clockwork
        | https://github.com/itsgoingd/clockwork
        |
        */

        'clockwork' => true,

        /*
        |--------------------------------------------------------------------------
        | Laravel Debugbar
        |--------------------------------------------------------------------------
        |
        | If this debugbar value is set to true all showSql logs will be sent to debugbar
        | https://github.com/barryvdh/laravel-debugbar
        |
        */

        'debugbar' => true,

        /*
       |--------------------------------------------------------------------------
       | Laravel Log
       |--------------------------------------------------------------------------
       |
       | If this log value is set to true all showSql logs will be sent to laravel log file
       | this file can be found in your storage/logs/laravel.log
       |
       */

        'log' => false,

        /*
      |--------------------------------------------------------------------------
      | Browser Log
      |--------------------------------------------------------------------------
      |
      | If this log value is set to true all showSql logs will be sent to your browser
      |
      */

        'browser' => false,


    ]
];
