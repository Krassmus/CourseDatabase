<h1><?= _("Datenbanken") ?></h1>

<table class="default">
    <thead>
        <tr>
            <th><?= _("Name") ?></th>
            <th><?= _("Typ") ?></th>
        </tr>
    </thead>
    <tbody>
        <? if (count($databases)) : ?>
        <? foreach ($databases as $database) : ?>
        <tr>
            <td><a href="<?= URLHelper::getLink("plugins.php/coursedatabase/manager/admin/".$database->getId()) ?>"><?= htmlReady($database['name']) ?></a></td>
            <td><?= htmlReady($database['dbtype']) ?></td>
        </tr>
        <? endforeach ?>
        <? else : ?>
        <tr>
            <td colspan="2" style="text-align: center;"><?= _("Keine Datenbanken vorhanden") ?></td>
        </tr>
        <? endif ?>
    </tbody>
</table>