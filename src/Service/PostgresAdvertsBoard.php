<?php

namespace App\Service;

class PostgresAdvertsBoard extends PHPAdventBoardDatabase
{
    protected string $dsn = "pgsql:host=adverts-postgres;dbname=adverts-board";
    protected string $user = "postgres";
    protected string $pass = "secret";

}