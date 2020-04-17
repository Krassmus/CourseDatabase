<?php
class InitPlugin extends Migration
{
	function up(){
	    DBManager::get()->exec(
            "CREATE TABLE IF NOT EXISTS `coursedatabases` (
                  `database_id` varchar(32) NOT NULL,
                  `seminar_id` varchar(32) NOT NULL,
                  `name` varchar(64) NOT NULL,
                  `dbtype` varchar(64) NOT NULL,
                  `permission` text NOT NULL,
                  `mkdate` bigint(20) NOT NULL,
                  `chdate` bigint(20) NOT NULL,
                  PRIMARY KEY (`database_id`),
                  UNIQUE KEY `uniquename` (`seminar_id`,`name`)
            )");

        $path = $GLOBALS['STUDIP_BASE_PATH']."/data/coursedb";
        mkdir($path);
	}
}
