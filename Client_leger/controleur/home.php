<?php
// $unControleur est déjà disponible depuis index.php, pas besoin de le recréer

// message de bienvenue
if (isset($_SESSION['prenom'], $_SESSION['nom'])) {
    echo "<p class='home-welcome'>Bienvenue, " . 
        htmlspecialchars($_SESSION['prenom']) . " " . 
        htmlspecialchars($_SESSION['nom']) . " !</p>";
} else {
    echo "<p class='home-welcome'>Bienvenue, invité !</p>";
}

// récupérer les appartements
$lesAppartements = $unControleur->selectAll_appartements();

// décoder et normaliser les images
$lesAppartements = array_map(function($a){
    $a['images'] = [];
    if (!empty($a['image'])) {
        $decoded = json_decode($a['image'], true);
        if (is_array($decoded)) {
            $a['images'] = $decoded;
        } else {
            $a['images'] = array_map('trim', explode(',', $a['image']));
        }
    }
    return $a;
}, $lesAppartements);
?>

<div class="home-container">

  <!-- filtre -->
  <section class="home-hero">
    <div class="home-hero-content">
      <h1 class="home-title">Trouvez votre prochain destination!!!</h1>
    
      <form class="home-search" onsubmit="event.preventDefault(); applyFilters();">
        <input id="q" placeholder="Ville, quartier ou mot-clé" />
        <select id="type">
          <option value="">Tous types</option>
          <option value="studio">Studio</option>
          <option value="1">1 chambre</option>
          <option value="2">2 chambres</option>
        </select>
        <button type="submit" class="btn home-btn">Rechercher</button>
      </form>
    </div>
  </section>

  <!-- liste d'appartement -->
  <section id="listings" class="home-listings">
    <div class="home-list-header">
      <h2>Appartements disponibles</h2>
      <span class="muted" id="resultCount"><?= count($lesAppartements) ?> résultats</span>
    </div>

    <div class="home-grid" id="cards"
      data-apartments='<?= json_encode($lesAppartements, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>'>
    </div>

    <div class="home-center">
      <button class="outline home-btn" id="loadMoreBtn">Charger plus</button>
    </div>
  </section>

  <!-- contact -->
  <section id="contact" class="home-contact">
    <div class="home-contact-card">
      <h3>Contactez-nous</h3>
      <p class="muted">Envoyez-nous un message et nous répondrons sous 24h.</p>
      <form class="home-contact-form no-global-style" onsubmit="event.preventDefault();alert('Message envoyé — exemple');">
        <div class="home-form-row">
          <input type="text" placeholder="Nom" required>
          <input type="email" placeholder="Email" required>
        </div>
        <div class="home-form-row">
          <input type="text" placeholder="Téléphone (optionnel)">
          <input type="text" placeholder="Objet">
        </div>
        <textarea placeholder="Message" rows="5" required></textarea>
        <button type="submit" class="btn home-btn">Envoyer</button>
      </form>
    </div>
  </section>

</div>

<!-- modal -->
<div id="modal" class="modal" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="modal-card">
    <div class="modal-header">
      <strong id="modalTitle">Titre</strong>
      <button class="outline" aria-label="Fermer la fenêtre" onclick="closeModal()">Fermer</button>
    </div>
    <div class="modal-body" id="modalBody"></div>
  </div>
</div>

<script src="js/home.js" defer></script>
