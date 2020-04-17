<?php

class ManagerController extends PluginController {

    public function overview_action()
    {
        Navigation::activateItem("/course/coursedatabase");
        Navigation::getItem("/course/coursedatabase")->setImage(Icon::create($this->plugin->getPluginURL()."/assets/database.svg"));
        if (Request::isPost() && $GLOBALS['perm']->have_studip_perm("tutor", Context::get()->id)) {
            $database = new CourseDB(Request::get("database_id") ?: null);
            $database['name'] = Request::get("name");
            $database['permission'] = in_array("all", Request::getArray("permission"))
                ? "all"
                : implode(" ", Request::getArray("permission"));
            $database['dbtype'] = "sqlite";
            $database['seminar_id'] = Context::get()->id;
            $database->store();
            PageLayout::postMessage(MessageBox::success(_("Daten gespeichert.")));
        }

        $this->databases = CourseDB::findMine(Context::get()->id);
    }

    public function admin_action($database_id) {
        $this->database = new CourseDB($database_id);
        if ($this->database['seminar_id'] !== Context::get()->id) {
            throw new AccessDeniedException("Wrong course");
        }
        Navigation::activateItem("/course/coursedatabase");
        Navigation::getItem("/course/coursedatabase")->setImage(Icon::create($this->plugin->getPluginURL()."/assets/database.svg"));
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/arbor.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/arbor-tween.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/graphics.js");
        PageLayout::addScript($this->plugin->getPluginURL()."/assets/renderer.js");

        $this->tables = $this->database->getTables();
    }

    public function edit_action($database_id = null) {
        $this->database = new CourseDB($database_id);
        if (!Context::get()->id || (!$this->database->isNew() && !$GLOBALS['perm']->have_studip_perm("tutor", Context::get()->id))) {
            throw new AccessDeniedException();
        }
        if (Request::isPost()) {
            $database = new CourseDB(Request::get("database_id") ?: null);
            $database['name'] = Request::get("name");
            $database['permission'] = in_array("all", Request::getArray("permission"))
                ? "all"
                : implode(" ", Request::getArray("permission"));
            $database['dbtype'] = "sqlite";
            $database['seminar_id'] = Context::get()->id;
            $database->store();
            PageLayout::postMessage(MessageBox::success(_("Daten gespeichert.")));
            $this->redirect("manager/overview");
        }
    }
}
