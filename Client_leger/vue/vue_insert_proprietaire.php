<div class="container">
    <form method="post" class="form-with-image">
        <div class="form-fields">
            <h3 class="text-center mb-4">
                <?= ($Proprietaire == null) ? "Ajout d'un propriétaire" : "Modifier le propriétaire" ?>
            </h3>

            <div class="form-group">
                <input type="text" id="nom" name="nom" placeholder=" "
                    value="<?= ($Proprietaire == null) ? '' : htmlspecialchars($Proprietaire['nom']) ?>" required>
                <label for="nom">Nom du propriétaire :</label>
            </div>

            <div class="form-group">
                <input type="text" id="prenom" name="prenom" placeholder=" "
                    value="<?= ($Proprietaire == null) ? '' : htmlspecialchars($Proprietaire['prenom']) ?>" required>
                <label for="prenom">Prénom du propriétaire :</label>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" "
                    value="<?= ($Proprietaire == null) ? '' : htmlspecialchars($Proprietaire['email']) ?>" required>
                <label for="email">Email :</label>
            </div>

            <div class="form-group">
                <input type="text" id="adresse" name="adresse" placeholder=" "
                    value="<?= ($Proprietaire == null) ? '' : htmlspecialchars($Proprietaire['adresse']) ?>" required>
                <label for="adresse">Adresse :</label>
            </div>

            <div class="d-flex">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit"
                    <?= ($Proprietaire == null) ? 'name="Valider"' : 'name="Modifier"' ?>
                    class="btn btn-primary">
                    <?= ($Proprietaire == null) ? 'Valider' : 'Modifier' ?>
                </button>
            </div>

            <!-- Input caché pour l'édition -->
            <?= ($Proprietaire == null) ? '' : '<input type="hidden" name="idproprio" value="' . $Proprietaire['idproprio'] . '">' ?>
        </div>

        <div class="form-image">
            <img src="images/design/proprietaire-.jpg" alt="Ajout propriétaire">
        </div>
    </form>
</div>
