<canvas id="tableoverview" width="600" height="400px"></canvas>


<script>

    var sys = arbor.ParticleSystem(1000, 400, 1);
    sys.parameters({gravity:true});
    sys.renderer = Renderer("#tableoverview");
    <?
    $nodes_data = array('nodes' => array(), 'edges' => array());
    foreach ($tables as $table) {
        $nodes_data['nodes'][$table['name']] = array(
            'color' => "#899AB9",
            'shape' => "square",
            'label' => $table['name'],
            'link' => URLHelper::getURL("plugins.php/coursedatabase/database/table", array('database_id' => $database->getId(),'tablename' => $table['name']))
        );
    }
    ?>
    sys.graft(<?= json_encode($nodes_data) ?>);


</script>


<?php
if (!class_exists("SidebarWidget")) {
    $infobox = array(
        array("kategorie" => _("Aktionen"),
            "eintrag" => array(
                array(
                    "icon" => "icons/16/black/add",
                    "text" => '<a href="?" onclick="return false; STUDIP.coursedatabase.new(); return false;">'._("Neue Tabelle").'</a>'
                )
            )
        )
    );
    $infobox = array(
        'picture' => Assets::image_path("sidebar/admin-sidebar.png"),
        'content' => $infobox
    );
}