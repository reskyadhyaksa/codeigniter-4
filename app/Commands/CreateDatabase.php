<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Config;

class CreateDatabase extends BaseCommand
{
    protected $group       = 'Database';
    protected $name        = 'db:create';
    protected $description = 'Creates a new database';

    public function run(array $params)
    {
        $dbConfig = Config::get('Database');

        // Get the database connection details
        $hostname = $dbConfig->default['hostname'];
        $username = $dbConfig->default['username'];
        $password = $dbConfig->default['password'];
        $database = $params[0] ?? CLI::prompt('Database name', null, 'required');

        // Create the connection to MySQL
        $mysqli = new \mysqli($hostname, $username, $password);

        // Check connection
        if ($mysqli->connect_error) {
            CLI::error("Connection failed: " . $mysqli->connect_error);
            return;
        }

        // Create the database
        $sql = "CREATE DATABASE IF NOT EXISTS `$database`";
        if ($mysqli->query($sql) === TRUE) {
            CLI::write("Database `$database` created successfully", 'green');
        } else {
            CLI::error("Error creating database: " . $mysqli->error);
        }

        // Close the connection
        $mysqli->close();
    }
}
