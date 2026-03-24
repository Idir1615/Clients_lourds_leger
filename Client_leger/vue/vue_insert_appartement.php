<div class="container">
    <form method="post" enctype="multipart/form-data" class="form-with-image" style="display:flex; gap:20px;">
        <div class="form-fields" style="flex:1;">
            <h3 class="text-center mb-4"><?= ($appartement == null) ? "Ajouter un appartement" : "Modifier l'appartement" ?></h3>

            <div class="form-group">
                <input type="text" id="adresse" name="adresse" placeholder=" "
                    value="<?= ($appartement == null) ? '' : htmlspecialchars($appartement['adresse']) ?>" required>
                <label for="adresse">Adresse :</label>
            </div>

            <div class="form-group">
                <input type="number" id="surface" name="surface" placeholder=" "
                    value="<?= ($appartement == null) ? '' : htmlspecialchars($appartement['surface']) ?>" required>
                <label for="surface">Surface :</label>
            </div>

            <div class="form-group">
                <input type="text" id="designation" name="designation" placeholder=" "
                    value="<?= ($appartement == null) ? '' : htmlspecialchars($appartement['designation']) ?>" required>
                <label for="designation">Désignation :</label>
            </div>

            <div class="form-group">
                <select id="idproprio" name="idproprio" required>
                    <?php foreach($proprietaires as $p): ?>
                        <option value="<?= $p['idproprio'] ?>" 
                            <?= ($appartement && $appartement['idproprio'] == $p['idproprio']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($p['nom'] . " " . $p['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="idproprio">Propriétaire :</label>
            </div>

            <!-- image de l'appartement -->
            <div class="form-group mt-3">
                <input  type= "file" id="image" name="image[]" accept="image/*" multiple>
                <?php if($appartement && !empty($appartement['image'])): ?>
    <div class="mt-2 d-flex flex-wrap">
        <?php 
        $images = explode(',', $appartement['image']);
        foreach ($images as $img): 
        ?>
            <img src="<?= htmlspecialchars($img) ?>" 
                 alt="Appartement" 
                 style="width:100px; margin:5px; border:1px solid #ccc; padding:2px;">
        <?php endforeach; ?>
    </div>
<?php endif; ?>

            </div>

            <div class="d-flex mt-3">
                <button type="reset" class="btn btn-secondary me-2">Annuler</button>
                <button type="submit"
                    <?= ($appartement == null) ? 'name="Valider"' : 'name="Modifier"' ?>
                    class="btn btn-primary">
                    <?= ($appartement == null) ? 'Valider' : 'Modifier' ?>
                </button>
            </div>

            <?= ($appartement == null) ? '' : '<input type="hidden" name="idappart" value="' . $appartement['idappart'] . '">' ?>
        </div>
        
        <div class="form-image" style="width:250px; text-align:center;">
            <img src="images/design/appartement-.jpg" alt="Design site" style="width:100%; border:1px solid #ccc; padding:2px;">
        </div>
    </form>
</div>
