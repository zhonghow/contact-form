<?php

class Database
{
    public function __construct()
    {
        return new PDO(
            'mysql:host=devkinsta_db;dbname=contact_form', // instruction: change the host to devkinsta_db and insert your own database name
            'root',
            'qQs06NBbdQOEMav6' // instruction: change this to your database password
        );
    }
}
