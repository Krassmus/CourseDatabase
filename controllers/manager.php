<?php

require_once dirname(__file__)."/application.php";

class ManagerController extends ApplicationController {

    public function overview_action() {
        Navigation::activateItem("/course/coursedatabase");
        Navigation::getItem("/course/coursedatabase")->setImage($this->plugin->getPluginURL()."/assets/database.svg");
        if (Request::isPost() && $GLOBALS['perm']->have_studip_perm("tutor", $_SESSION['SessionSeminar'])) {
            $database = new CourseDB(Request::get("database_id") ?: null);
            $database['name'] = Request::get("name");
            $database['permission'] = in_array("all", Request::getArray("permission"))
                ? "all"
                : implode(" ", Request::getArray("permission"));
            $database['dbtype'] = "sqlite";
            $database['seminar_id'] = $_SESSION['SessionSeminar'];
            $database->store();
            PageLayout::postMessage(MessageBox::success(_("Daten gespeichert.")));
        }

        $this->databases = CourseDB::findMine($_SESSION['SessionSeminar']);
    }

    public function admin_action($database_id) {
        $this->database = new CourseDB($database_id);
        if ($this->database['seminar_id'] !== $_SESSION['SessionSeminar']) {
            throw new AccessDeniedException("Wrong course");
        }
        Navigation::activateItem("/course/coursedatabase");
        Navigation::getItem("/course/coursedatabase")->setImage($this->plugin->getPluginURL()."/assets/database.svg");
    }
}