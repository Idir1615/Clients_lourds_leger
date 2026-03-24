<div class="container">
    <form method="post" class="form-with-image">
        <div class="form-fields">
            <h2>Inscription</h2>

            <div class="form-group">
                <input type="text" id="nom" name="nom" placeholder=" " required>
                <label for="nom">Nom :</label>
            </div>

            <div class="form-group">
                <input type="text" id="prenom" name="prenom" placeholder=" " required>
                <label for="prenom">Prénom :</label>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email">Email :</label>
            </div>

            <div class="form-group">
                <input type="password" id="mdp" name="mdp" placeholder=" " required>
                <label for="mdp">Mot de passe :</label>
            </div>

            <div class="d-flex">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" name="inscrire" class="btn btn-primary">S’inscrire</button>
            </div>

            <p class="text-center mt-3">
                Déjà un compte ? <a href="index.php">Connectez-vous ici</a>
            </p>
        </div>

        <div class="form-image">
            <img src="images/design/singin.jpg" alt="Image inscription" style="width:100%; border:1px solid #ccc; padding:2px;">
        </div>
    </form>
</div>
