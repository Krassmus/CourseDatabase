<?php

class CourseDB extends SimpleORMap {

    public function __construct($id = null) {
        $this->db_table = "coursedatabases";
        parent::__construct($id);
        $db = $this->getSqliteDB();
    }

    protected function getSqliteDB() {
        if ($this['dbtype'] === "sqlite") {
            $path = $GLOBALS['STUDIP_BASE_PATH']."/data/coursedb/".$this->getId().".sqlite";
            $db = new PDO("sqlite:".$path);
            return $db;
        }
    }


}