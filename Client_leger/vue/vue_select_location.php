<h3 class="text-center mb-4">Liste des Locations</h3>
<form method="post" class="container mt-3 p-4 border rounded shadow" style="max-width: 600px;">
    <div class="input-group mb-3">
        <input type="text" name="filtre" class="form-control" placeholder="Filtrer par description...">
        <button type="submit" name="Filtrer" class="btn btn-primary">Filtrer</button>
    </div>
</form>

<div class="container mt-3">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Location</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Description</th>
                <th>Appartement</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($leslocations)) {
                foreach ($leslocations as $uneLocation) {
                    echo "<tr>";
                    echo "<td>".$uneLocation['idlocation']."</td>"; 
                    echo "<td>".$uneLocation['dateDebut']."</td>"; 
                    echo "<td>".$uneLocation['dateFin']."</td>"; 
                    echo "<td>".$uneLocation['description']."</td>";

                    // Appartement
            $app = $unControleur->selectWhere_appartement($uneLocation['idappart']);
            if ($app) {
                echo "<td>".$app['designation']." - ".$app['adresse']."</td>";
            } else {
                echo "<td>N/A</td>";
            }

            // Client
            $cli = $unControleur->selectWhere_Client($uneLocation['idclient']);
            if ($cli) {
                echo "<td>".$cli['nom']." ".$cli['prenom']."</td>";
            } else {
                echo "<td>N/A</td>";
            }

                    // Actions supprimer / éditer
                    echo "<td>"; 
                    echo "<a href='index.php?page=5&action=sup&idlocation=".$uneLocation['idlocation']."' 
                            onclick=\"return confirm('Voulez-vous vraiment supprimer cette location ?');\" 
                            class='btn btn-danger btn-sm me-1'>
                            <i class='bi bi-trash'></i>
                            </a>";

                    echo "<a href='index.php?page=5&action=edit&idlocation=".$uneLocation['idlocation']."' 
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
