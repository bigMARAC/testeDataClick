<?php
include_once('.env');

// Utilizando a biblioteca "vlucas/phpdotenv" instalada atravez do Composer
include_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

class MyUserClass
{
    public function getUserList()
    {
        $dbconn = new DatabaseConnection(getenv('HOST'), getenv('USER'), getenv('PASS'));
        return $dbconn->query('select name from user sort by name');
    }
}
