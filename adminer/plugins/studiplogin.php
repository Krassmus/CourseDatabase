<?php

class AdminerStudipLogin {
    protected $db;
    protected $username;
    protected $database;
    protected $password;

    function database() {
        // should be used everywhere instead of DB
        return $_REQUEST['db'];
    }

    /*function credentials() {
        // server, username and password for connecting to database
        $this->fetchVars();
        return array(
            $this->server,
            $this->username,
            $this->password
        );
    }

    protected function fetchVars() {
        if (true || file_exists(dirname(__file__)."/../config.php")) {
            //include dirname(__file__)."/../config.php";
            $this->server = "localhost";
            $this->username = "root";
            $this->database = "studip";
            $this->password = "";
        }
    }*/

}