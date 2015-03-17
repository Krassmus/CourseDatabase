<h1><?= _("Datenbanken") ?></h1>

<table class="default">
    <thead>
        <tr>
            <th><?= _("Name") ?></th>
            <th><?= _("Typ") ?></th>
            <th><?= _("Zugriff") ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? if (count($databases)) : ?>
        <? foreach ($databases as $database) : ?>
        <tr id="db_<?= $database->getId() ?>" data-attributes="<?= htmlReady(json_encode(studip_utf8encode($database->toArray()))) ?>">
            <td><a href="<?= URLHelper::getLink("plugins.php/coursedatabase/manager/admin/".$database->getId()) ?>"><?= htmlReady($database['name']) ?></a></td>
            <td><?= htmlReady($database['dbtype']) ?></td>
            <td>
                <? if ($database['permission'] === "all") {
                    echo _("freigegeben");
                } elseif(!trim($database['permission'])) {
                    echo _("versteckt");
                } else {
                    foreach (explode(" ", $database['permission']) as $key => $statusgruppe_id) {
                        if ($key > 0) {
                            echo ", ";
                        }
                        echo htmlReady(Statusgruppen::find($statusgruppe_id)->name);
                    }
                }
                ?>
            </td>
            <td>
                <? if ($GLOBALS['perm']->have_studip_perm("tutor", $_SESSION['SessionSeminar'])) : ?>
                    <a href="" onClick="STUDIP.coursedatabase.edit('<?= $database->getId() ?>'); return false;"><?= Assets::img("icons/20/blue/edit") ?></a>
                <? endif ?>
            </td>
        </tr>
        <? endforeach ?>
        <? else : ?>
        <tr>
            <td colspan="3" style="text-align: center;"><?= _("Keine Datenbanken vorhanden") ?></td>
        </tr>
        <? endif ?>
    </tbody>
</table>

<div id="edit_database_window_title" style="display: none"><?= _("Datenbank bearbeiten") ?></div>
<div id="new_database_window_title" style="display: none"><?= _("Datenbank erstellen") ?></div>
<div id="edit_database_window" style="display: none">
    <form action="?" method="post">
    <input type="hidden" id="database_database_id" name="database_id" value="">
    <table class="default">
        <tbody>
            <tr>
                <td><label for="database_name"><strong><?= _("Name") ?></strong></label></td>
                <td><input type="text" id="database_name" name="name" required placeholder="<?= _("Name der Datenbank ...") ?>"></td>
            </tr>
            <tr>
                <td><strong><?= _("Zugriff") ?></strong></td>
                <td>
                    <? foreach (Statusgruppen::findBySQL("range_id = ?", array($_SESSION["SessionSeminar"])) as $statusgruppe) : ?>
                        <div>
                            <label>
                                <input type="checkbox" name="permission[]" value="<?= $statusgruppe->getId() ?>">
                                <?= htmlReady($statusgruppe['name']) ?>
                            </label>
                        </div>
                    <? endforeach ?>
                    <div>
                        <label>
                            <input type="checkbox" name="permission[]" value="all">
                            <?= _("Für alle") ?>
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit"><?= _("abschicken") ?></button>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>

<script>
    STUDIP.coursedatabase = {
        new: function () {
            jQuery("#database_database_id").val('');
            jQuery("#database_name").val('');
            jQuery("#edit_database_window input[type=checkbox]").removeAttr("checked");
            jQuery('#edit_database_window').dialog({
                'title': jQuery('#new_database_window_title').text(),
                modal:true,
                show:'fade',
                hide:'fade'
            });
        },
        edit: function (id) {
            var data = jQuery("#db_" + id).data("attributes");
            jQuery("#database_database_id").val(id);
            jQuery("#database_name").val(data.name);
            jQuery("#edit_database_window input[type=checkbox]").removeAttr("checked");
            if (data.permission === "all") {
                jQuery("#edit_database_window input[type=checkbox][value=all]").attr("checked", "checked");
            }
            if (data.permission.length > 0) {
                jQuery.each(data.permission.split(" "), function (index, statusgruppe_id) {
                    jQuery("#edit_database_window input[type=checkbox][value=" + statusgruppe_id + "]").attr("checked", "checked");
                });
            }
            jQuery('#edit_database_window').dialog({
                'title': jQuery('#edit_database_window_title').text(),
                modal:true,
                show:'fade',
                hide:'fade'
            });
        }
    };
</script>

<?
if (!class_exists("SidebarWidget")) {
    $infobox = array(
        array("kategorie" => _("Aktionen"),
            "eintrag" => array(
                $GLOBALS['perm']->have_studip_perm("tutor", $_SESSION['SessionSeminar'])
                ? array(
                    "icon" => "icons/16/black/add",
                    "text" => '<a href="?" onclick="STUDIP.coursedatabase.new(); return false;">'._("Neue Datenbank anlegen").'</a>'
                )
                : array(
                    "icon" => "icons/16/black/info",
                    "text" => _("Wählen Sie die Datenbank aus.")
                )
            )
        )
    );
    $infobox = array(
        'picture' => Assets::image_path("sidebar/admin-sidebar.png"),
        'content' => $infobox
    );
} else {
    $sidebar = Sidebar::get();
    $sidebar->setImage(Assets::image_path("sidebar/admin-sidebar.png"));
    if ($GLOBALS['perm']->have_studip_perm("tutor", $_SESSION['SessionSeminar'])) {
        $aktionen = new ActionsWidget();
        $aktionen->addLink(
            _("Neue Datenbank anlegen"),
            "?",
            "icons/16/black/add",
            array('onclick' => "STUDIP.coursedatabase.new(); return false;")
        );
        $sidebar->addWidget($aktionen);
    }

    Helpbar::Get()->addPlainText(_("Datenbanken in Stud.IP"), _("Mit CourseDatabase kann das Wesen von Datenbanken am Beispiel einer SQLite-Datenbank gezeigt, erkundet und ein erster Umgang damit eingeübt werden. Echte Datenbanken stehen zur Verfügung, die mit einem granularen Rechtemanagement entweder nur den Lehrenden, für alle Teilnehmenden des Kurses oder einzelne Teilnehmendengruppen freigegeben werden. Damit lassen sich Noten erfassen, statistische Daten zusammentragen oder Einführungskurse zum Thema relationale Datenbanken abhalten."));
}