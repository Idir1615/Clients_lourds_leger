<h3 class="text-center mb-4">Liste des proprietaires</h3>

<form method="post" class="container mt-3 p-4 border rounded shadow" style="max-width: 600px;">
    <div class="input-group mb-3">
        <input type="text" name="filtre" class="form-control" placeholder="Filtrer par...">
        <button type="submit" name="Filtrer" class="btn btn-primary">Filtrer</button>
    </div>
</form>

<div class="container mt-3">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Proprietaires</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($lesProprietaires)){
                foreach($lesProprietaires as $unProprietaire){
                    echo "<tr>";
                    echo "<td>".$unProprietaire['idproprio']."</td>"; 
                    echo "<td>".$unProprietaire['nom']."</td>"; 
                    echo "<td>".$unProprietaire['prenom']."</td>"; 
                    echo "<td>".$unProprietaire['email']."</td>";
                    echo "<td>".$unProprietaire['adresse']."</td>";
                    echo "<td>"; 
                    echo "<a href='index.php?page=3&action=sup&idproprio=".$unProprietaire['idproprio']."' 
                           onclick=\"return confirm('Voulez-vous vraiment supprimer cet Proprietaire ?');\" 
                           class='btn btn-danger btn-sm me-1'>
                           <i class='bi bi-trash'></i>
                          </a>";
                    echo "<a href='index.php?page=3&action=edit&idproprio=".$unProprietaire['idproprio']."' 
                           class='btn btn-warning btn-sm'>
                           <i class='bi bi-pencil'></i>
                          </a>";
                    echo "</td>";
                    echo "</tr>"; 
                }
            }
            ?>
        </tbody>
    </table>
</div>
