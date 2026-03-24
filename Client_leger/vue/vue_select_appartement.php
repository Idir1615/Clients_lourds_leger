<h3 class="text-center mb-4">Liste des appartements</h3>

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
                <th>ID Appartement</th>
                <th>Adresse Appartement</th>
                <th>Surface</th>
                <th>Désignation</th>
                <th>ID Propriétaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($lesAppartements)){
                foreach($lesAppartements as $unAppartement){
                    echo "<tr>";
                    echo "<td>".$unAppartement['idappart']."</td>"; 
                    echo "<td>".$unAppartement['adresse']."</td>"; 
                    echo "<td>".$unAppartement['surface']."</td>"; 
                    echo "<td>".$unAppartement['designation']."</td>";
                    echo "<td>".$unAppartement['idproprio']."</td>";
                    echo "<td>"; 
                    echo "<a href='index.php?page=2&action=sup&idappart=".$unAppartement['idappart']."' 
                           onclick=\"return confirm('Voulez-vous vraiment supprimer cet appartement ?');\" 
                           class='btn btn-danger btn-sm me-1'>
                           <i class='bi bi-trash'></i>
                          </a>";
                    echo "<a href='index.php?page=2&action=edit&idappart=".$unAppartement['idappart']."' 
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
