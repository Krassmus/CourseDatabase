<?php

require_once __DIR__."/models/CourseDB.class.php";

class CourseDatabase extends StudIPPlugin implements StandardPlugin {

    public function __construct() {
        parent::__construct();
    }

    function getTabNavigation($course_id) {
        if ($GLOBALS['perm']->have_studip_perm("tutor", $course_id)) {
            $tab = new Navigation(_("Data"), PluginEngine::getURL($this, array(), "manager/overview"));
            return array('coursedatabase' => $tab);
        } else {
            return null;
        }
    }

    function getInfoTemplate($course_id) {
        return null;
    }

    function getIconNavigation($course_id, $last_visit, $user_id) {
        return null;
    }

    function getNotificationObjects($course_id, $since, $user_id) {
        return array();
    }

    function getMetadata() {
        return "Bietet die Möglichkeit, Datenbanken in dieser Veranstaltung zu verwalten.";
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