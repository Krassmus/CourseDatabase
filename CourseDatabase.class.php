<?php

require_once __DIR__."/models/CourseDB.class.php";

class CourseDatabase extends StudIPPlugin implements StandardPlugin {

    function getMetadata() {
        $metadata = parent::getMetadata();
        $metadata['description'] = "
Stellen Sie echte Datenbanken zur Verfügung, die mit einem granularen Rechtemanagement entweder nur für Sie als DozentIn, für alle Teilnehmer des Kurses oder einzelne Teilnehmergruppen freigegeben werden.

Damit können Noten erfasst werden, man kann statistische Daten zusammen tragen oder einfach einen Einsteigerkurs zum Thema relationale Datenbanken halten.
        ";
        $metadata['homepage'] = "https://github.com/Krassmus/CourseDatabase";
        return $metadata;
    }

    public function __construct() {
        parent::__construct();
    }

    function getTabNavigation($course_id) {
        $databases = CourseDB::findMine($course_id);
        if (count($databases) || $GLOBALS['perm']->have_studip_perm("tutor", $course_id)) {
            $tab = new Navigation(_("Data"), PluginEngine::getURL($this, array(), "manager/overview"));
            $tab->setImage(Icon::create($this->getPluginURL()."/assets/database_white.svg"));
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
            $tab = new Navigation(_("Data"), PluginEngine::getURL($this, array(), "manager/overview"));
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
}
