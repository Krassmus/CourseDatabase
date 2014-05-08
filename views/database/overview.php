<canvas id="tableoverview" width="600" height="400px"></canvas>


<script>
    var sys = arbor.ParticleSystem(1000, 400,1);
    sys.parameters({gravity:true});
    sys.renderer = Renderer("#tableoverview");
    var nodes = {};
    <? foreach ($tables as $table) : ?>
    nodes['<?= htmlReady($table['name']) ?>'] = sys.addNode(
        '<?= htmlReady($table['name']) ?>',
        {
            'color':'#899AB9',
            'shape':'square',
            'label':'<?= htmlReady($table['name']) ?>',
            'link' :'<?= URLHelper::getURL("plugins.php/coursedatabase/database/table", array('database_id' => $database->getId(),'tablename' => $table['name'])) ?>'
        });
    <? endforeach ?>
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