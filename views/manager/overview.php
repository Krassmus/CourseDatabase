<table class="default">
    <caption><?= _("Datenbanken") ?></caption>
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
            <td><a href="<?= URLHelper::getLink("plugins.php/coursedatabase/database/overview", array('database_id' => $database->getId())) ?>"><?= htmlReady($database['name']) ?></a></td>
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
                <? if ($GLOBALS['perm']->have_studip_perm("tutor", Context::get()->id)) : ?>
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

<?

if ($GLOBALS['perm']->have_studip_perm("tutor", Context::get()->id)) {
    $actions = new ActionsWidget();
    $actions->addLink(
        _("Neue Datenbank anlegen"),
        PluginEngine::getURL($plugin, [], "manager/edit"),
        Icon::create("add", "clickable"),
        ['data-dialog' => 1]
    );
    Sidebar::Get()->addWidget($actions);
}
