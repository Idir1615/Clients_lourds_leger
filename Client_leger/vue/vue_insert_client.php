<div class="container">
    <form method="post" class="form-with-image">
        <!-- Partie formulaire -->
        <div class="form-fields">
            <h3 class="text-center mb-4"><?= ($Client == null) ? "Ajout d'un client" : "Modification du client" ?></h3>

            <div class="form-group">
                <input type="text" id="nom" name="nom" placeholder=" " 
                       value="<?= ($Client == null) ? '' : $Client['nom'] ?>" required>
                <label for="nom">Nom de client :</label>
            </div>

            <div class="form-group">
                <input type="text" id="prenom" name="prenom" placeholder=" " 
                       value="<?= ($Client == null) ? '' : $Client['prenom'] ?>" required>
                <label for="prenom">Prénom de client :</label>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" " 
                       value="<?= ($Client == null) ? '' : $Client['email'] ?>" required>
                <label for="email">Email :</label>
            </div>

            <div class="form-group">
                <input type="text" id="adresse" name="adresse" placeholder=" " 
                       value="<?= ($Client == null) ? '' : $Client['adresse'] ?>" required>
                <label for="adresse">Adresse :</label>
            </div>

            <div class="d-flex">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" 
                        <?= ($Client == null) ? 'name="Valider"' : 'name="Modifier"' ?> 
                        class="btn btn-primary">
                    <?= ($Client == null) ? 'Valider' : 'Modifier' ?>
                </button>
            </div>

            <?php if ($Client != null): ?>
                <input type="hidden" name="idclient" value="<?= $Client['idclient'] ?>">
            <?php endif; ?>
        </div>

        <div class="form-image">
            <img src="images/design/client-.jpg" alt="Ajout client "  style="width:100%; border:1px solid #ccc; padding:2px;">
        </div>
    </form>
</div>
