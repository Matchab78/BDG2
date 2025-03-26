document.addEventListener('DOMContentLoaded', () => {
    const searchBar = document.querySelector('.search-bar');
    const carsGrid = document.querySelector('.cars-grid');
    const cardTemplate = document.querySelector('.car-card');
    
    // Supprime le template original
    cardTemplate.remove();

    // Fonction pour créer une carte
    function createCarCard(carData) {
        const card = cardTemplate.cloneNode(true);
        
        // Mise à jour des données de la carte
        card.querySelector('h2').textContent = carData.name;
        card.querySelector('img').src = carData.image;
        card.querySelector('img').alt = carData.name;
        
        // Mise à jour des statistiques
        const bars = card.querySelectorAll('.bar');
        carData.stats.forEach((stat, index) => {
            if (bars[index]) {
                bars[index].style.width = stat.value + '%';
                bars[index].textContent = stat.value;
            }
        });
        
        return card;
    }

    // Fonction pour charger les voitures depuis la base de données
    async function loadCars() {
        try {
            // À remplacer par votre appel à la base de données
            const response = await fetch('/api/cars');
            const cars = await response.json();
            
            // Création des cartes pour chaque voiture
            cars.forEach(car => {
                const card = createCarCard(car);
                carsGrid.appendChild(card);
            });
        } catch (error) {
            console.error('Erreur lors du chargement des voitures:', error);
        }
    }

    // Fonction de recherche
    function filterCars(searchTerm) {
        const cards = document.querySelectorAll('.car-card');
        cards.forEach(card => {
            const carName = card.querySelector('h2').textContent.toLowerCase();
            if (carName.includes(searchTerm.toLowerCase())) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Écouteur d'événement pour la recherche
    searchBar.addEventListener('input', (e) => {
        filterCars(e.target.value);
    });

    // Chargement initial des voitures
    loadCars();
});