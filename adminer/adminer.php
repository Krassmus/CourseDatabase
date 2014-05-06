<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    $plugins = array(
        // specify enabled plugins hereAdminerStudipLogin
        new AdminerFrames,
        new AdminerStudipLogin,
    );

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer-4.1.0-de.php";
