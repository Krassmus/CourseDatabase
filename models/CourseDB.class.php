<?php

class CourseDB extends SimpleORMap {

    static public function findMine($course_id) {
        if ($GLOBALS['perm']->have_studip_perm("tutor", $course_id)) {
            return self::findBySQL("seminar_id = ? ORDER BY name ASC");
        } else {
            $statement = DBManager::get()->prepare("
                SELECT coursedatabases.*
                FROM coursedatabases
                  INNER JOIN statusgruppen ON (statusgruppen.range_id = coursedatabases.seminar_id)
                  INNER JOIN statusgruppe_user ON (statusgruppe_user.statusgruppe_id = statusgruppen.statusgruppe_id)
                WHERE statusgruppe_user.user_id = :me
                  AND coursedatabases.seminar_id = :course_id
                  AND (
                    coursedatabases.permission LIKE CONCAT('%', statusgruppen.statusgruppe_id,'%')
                    OR coursedatabases.permission = 'all'
                  )
                ORDER BY coursedatabases.name
            ");
            $statement->execute(array(
                'me' => $GLOBALS['user']->id,
                'course_id' => $course_id
            ));
            $databases = array();
            foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $db_data) {
                $database = new CourseDB();
                $database->setData($db_data);
                $database->setNew(false);
                $databases[] = $database;
            }
            return $databases;
        }
    }

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