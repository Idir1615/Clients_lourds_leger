//  Initialisation et Données
const cardsContainer = document.getElementById('cards');
let apartments = [];

try {
  apartments = JSON.parse(cardsContainer.dataset.apartments || "[]");
} catch (e) {
  console.error("Erreur parsing JSON appartements:", e);
  apartments = [];
}

const modal = document.getElementById('modal');
const modalTitle = document.getElementById('modalTitle');
const modalBody = document.getElementById('modalBody');
const loadMoreBtn = document.getElementById('loadMoreBtn');

let itemsPerPage = 6;
let currentPage = 1;
let filteredApartments = apartments;

//  Attachement de l'événement CLICK au bouton "Charger plus"
if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', loadMore);
}

//  Gestion Image par Défaut
function getFirstImage(a) {
  if (!a.images || !Array.isArray(a.images) || a.images.length === 0) {
    return 'images/biens/appart-placeholder.jpg';
  }
  return a.images[0].trim() || 'images/biens/appart-placeholder.jpg';
}

//  Rendu des Cartes (Liste)
function renderCards(list) {
  cardsContainer.innerHTML = '';

  if (!list || list.length === 0) {
    cardsContainer.innerHTML = `<p class="muted" style="padding:12px;text-align:center">Aucun appartement trouvé.</p>`;
    return;
  }

  list.forEach(a => {
    const div = document.createElement('article');
    div.className = 'card fade-in';
    div.innerHTML = `
      <img src="${getFirstImage(a)}" alt="${a.designation}" loading="lazy" />
      <div class="card-body">
        <div class="title-row">
          <div>
            <div class="title">${a.designation}</div>
            <div class="meta">${a.adresse} • ${a.surface} m²</div>
          </div>
        </div>
        <div class="card-actions">
          <button class="outline" onclick="openModal(${a.idappart})">Détails</button>
        </div>
      </div>
    `;
    cardsContainer.appendChild(div);
  });
}

//  Affichage Initial
renderCards(apartments.slice(0, itemsPerPage));

//  Pagination : Charger Plus
function loadMore() {
  currentPage++;
  const visible = filteredApartments.slice(0, currentPage * itemsPerPage);
  renderCards(visible);

  if (visible.length >= filteredApartments.length && loadMoreBtn) {
    loadMoreBtn.style.display = 'none';
  } else if (loadMoreBtn) {
    loadMoreBtn.style.display = '';
  }
}

//  Modale : Ouverture et Affichage Multi-Images
function openModal(id) {
  // Vérification de connexion : redirige vers la page de connexion si non connecté
  if (!isLoggedIn) {
    window.location.href = 'index.php?page=connexion';
    return;
  }

  const a = apartments.find(x => x.idappart === id);
  if (!a) return;

  const imagesArray = Array.isArray(a.images) ? a.images : [];

  modalTitle.textContent = a.designation;
  let imagesHtml = '';

  if (imagesArray.length > 0) {
    imagesHtml += '<div class="modal-gallery">';
    imagesArray.forEach((src, index) => {
      src = src.trim() || 'images/biens/appart-placeholder.jpg';
      imagesHtml += `<img src="${src}" alt="${a.designation} - image ${index + 1}" />`;
    });
    imagesHtml += '</div>';
  } else {
    imagesHtml += `<img src="images/biens/appart-placeholder.jpg" 
                        alt="${a.designation}" 
                        style="width:100%;height:250px;object-fit:cover;border-bottom:1px solid #f1f5f9" />`;
  }

  modalBody.innerHTML = `
      ${imagesHtml}
      <div>
          <p><strong>Adresse :</strong> ${a.adresse}</p>
          <p><strong>Surface :</strong> ${a.surface} m²</p>
          <p><strong>ID Propriétaire :</strong> ${a.idproprio}</p>
      </div>
  `;

  modal.classList.add('open');
  modal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}

//  Modale : Fermeture
function closeModal() {
  modal.classList.remove('open');
  modal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

modal.addEventListener('click', (e) => {
  if (e.target === modal) closeModal();
});
window.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
});

//  Logique des Filtres
function applyFilters() {
  const q = document.getElementById('q').value.trim().toLowerCase();
  const type = document.getElementById('type').value;

  filteredApartments = apartments.filter(a => {
    const text = ((a.designation || '') + ' ' + (a.adresse || '')).toLowerCase();
    const matchQ = !q || text.includes(q);
    const surface = parseFloat(a.surface) || 0;

    let matchType = true;
    if (type === 'studio') matchType = surface <= 30;
    else if (type === '1') matchType = surface > 30 && surface <= 60;
    else if (type === '2') matchType = surface > 60;

    return matchQ && matchType;
  });

  currentPage = 1;
  renderCards(filteredApartments.slice(0, itemsPerPage));

  const countSpan = document.querySelector('.home-list-header .muted');
  if (countSpan) countSpan.textContent = `${filteredApartments.length} résultats`;

  if (filteredApartments.length > itemsPerPage && loadMoreBtn) {
    loadMoreBtn.style.display = '';
  } else if (loadMoreBtn) {
    loadMoreBtn.style.display = 'none';
  }
}

//  Navigation
function scrollToSection(id) {
  document.getElementById(id)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
