<div class="container">
    <form method="post" class="form-with-image">
        <div class="form-fields">
            <h3 class="text-center mb-4">
                <?= ($location == null) ? "Ajout d'une location" : "Modification de la location" ?>
            </h3>

            <div class="form-group">
                <select id="idappart" name="idappart" required>
                    <?php foreach($appartements as $app): ?>
                        <option value="<?= $app['idappart'] ?>"
                            <?= ($location != null && $location['idappart'] == $app['idappart']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($app['designation'] . " - " . $app['adresse']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="idappart">Appartement :</label>
            </div>

            <div class="form-group">
                <select id="idclient" name="idclient" required>
                    <?php foreach($clients as $cli): ?>
                        <option value="<?= $cli['idclient'] ?>"
                            <?= ($location != null && $location['idclient'] == $cli['idclient']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cli['nom'] . " " . $cli['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="idclient">Client :</label>
            </div>

            <div class="form-group">
                <input type="date" id="dateDebut" name="dateDebut" 
                       value="<?= ($location == null) ? '' : $location['dateDebut'] ?>" required>
                <label for="dateDebut">Date de début :</label>
            </div>

            <div class="form-group">
                <input type="date" id="dateFin" name="dateFin" 
                       value="<?= ($location == null) ? '' : $location['dateFin'] ?>">
                <label for="dateFin">Date de fin :</label>
            </div>

            <div class="form-group">
                <textarea id="description" name="description" rows="4" placeholder="Ajouter une description..."><?= ($location == null) ? '' : $location['description'] ?></textarea>
                <label for="description">Description :</label>
            </div>

            <div class="d-flex">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" 
                        <?= ($location == null) ? 'name="Valider"' : 'name="Modifier"' ?> 
                        class="btn btn-primary">
                    <?= ($location == null) ? 'Valider' : 'Modifier' ?>
                </button>
            </div>

            <?php if ($location != null): ?>
                <input type="hidden" name="idlocation" value="<?= $location['idlocation'] ?>">
            <?php endif; ?>
        </div>

        <div class="form-image">
            <img src="images/design/surfing.jpg" alt="Ajout location" style="width:100%; border:1px solid #ccc; padding:2px;">
        </div>
    </form>
</div>
