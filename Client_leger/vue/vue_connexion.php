<div class="container">
    <form class="form-with-image" method="post">
        <div class="form-fields">
            <h2>Connexion</h2>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email"> Email :</label>
            </div>

            <div class="form-group">
                <input type="password" id="mdp" name="mdp" placeholder=" " required>
                <label for="mdp"> Mot de passe :</label>
            </div>

            <div class="d-flex">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" name="Connexion" class="btn btn-primary">Connexion</button>
            </div>

            <p class="text-center mt-3">
                Pas encore de compte ? <a href="index.php?page=inscription">Inscrivez-vous ici</a>
            </p>
        </div>

        <div class="form-image">
            <img src="images/design/singup.jpg" alt="Image dans le formulaire" style="width:100%; border:1px solid #ccc; padding:2px;">
        </div>
    </form>
</div>
