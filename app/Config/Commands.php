<?php

namespace Config;

use CodeIgniter\CLI\CLIConfig;

class Commands extends CLIConfig
{
    public $commands = [
        'db:create' => \App\Commands\CreateDatabase::class,
    ];
}
