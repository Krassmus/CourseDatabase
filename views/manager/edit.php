<form action="<?= PluginEngine::getLink($plugin, [], "manager/edit/".$database->getId()) ?>"
      class="default"
      method="post">

    <label>
        <?= _("Name") ?>
        <input type="text"
               name="name"
               value="<?= htmlReady($database['name']) ?>"
               required
               placeholder="<?= _("Name der Datenbank ...") ?>">
    </label>

    <div>
        <h2><?= _("Zugriff") ?></h2>
        <? foreach (Statusgruppen::findBySQL("range_id = ?", array(Context::get()->id)) as $statusgruppe) : ?>
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
    </div>

    <div data-dialog-button>
        <?= \Studip\Button::create(_("Speichern")) ?>
    </div>
</form>
