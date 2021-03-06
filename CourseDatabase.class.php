<?php

require_once __DIR__."/models/CourseDB.class.php";

class CourseDatabase extends StudIPPlugin implements StandardPlugin {

    public function __construct() {
        parent::__construct();
    }

    function getTabNavigation($course_id) {
        $databases = CourseDB::findMine($_SESSION['SessionSeminar']);
        if (count($databases) || $GLOBALS['perm']->have_studip_perm("tutor", $course_id)) {
            $tab = new Navigation(_("Datenbanken"), PluginEngine::getURL($this, array(), "manager/overview"));
            $tab->setImage($this->getPluginURL()."/assets/database_white.svg");
            return array('coursedatabase' => $tab);
        } else {
            return null;
        }
    }

    function getInfoTemplate($course_id) {
        return null;
    }

    function getIconNavigation($course_id, $last_visit, $user_id) {
        $databases = CourseDB::findMine($course_id);
        if (count($databases) || $GLOBALS['perm']->have_studip_perm("tutor", $course_id)) {
            $tab = new Navigation(_("Datenbanken"), PluginEngine::getURL($this, array(), "manager/overview"));
            $tab->setImage($this->getPluginURL()."/assets/database_grey.png", array('title' => _("Datenbanken")));
            return $tab;
        } else {
            return null;
        }
        return null;
    }

    function getNotificationObjects($course_id, $since, $user_id) {
        return array();
    }

    /**
     * This method dispatches and displays all actions. It uses the template
     * method design pattern, so you may want to implement the methods #route
     * and/or #display to adapt to your needs.
     *
     * @param  string  the part of the dispatch path, that were not consumed yet
     *
     * @return void
     */
    public function perform($unconsumed_path) {
        if(!$unconsumed_path) {
            header("Location: " . PluginEngine::getUrl($this), 302);
            return false;
        }
        $trails_root = $this->getPluginPath();
        $dispatcher = new Trails_Dispatcher($trails_root, null, 'show');
        $dispatcher->current_plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }
}