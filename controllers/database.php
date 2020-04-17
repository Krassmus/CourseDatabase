<?php

class DatabaseController extends PluginController
{

    public function overview_action()
    {
        $this->database = new CourseDB(Request::option("database_id"));
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

    public function table_action()
    {
        $this->database = new CourseDB(Request::option("database_id"));
        echo Request::get("tablename");
    }

}
