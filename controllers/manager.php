<?php

require_once dirname(__file__)."/application.php";
require_once 'lib/contact.inc.php';

class ManagerController extends ApplicationController {

    public function overview_action() {
        Navigation::activateItem("/course/coursedatabase");

        $this->databases = CourseDB::findBySQL("seminar_id = ? ORDER BY name ASC", array($_SESSION['SessionSeminar']));
    }

    public function admin_action($database_id) {
        $this->database = new CourseDB($database_id);
        if ($this->database['seminar_id'] !== $_SESSION['SessionSeminar']) {
            throw new AccessDeniedException("Wrong course");
        }
        Navigation::activateItem("/course/coursedatabase");
    }
}