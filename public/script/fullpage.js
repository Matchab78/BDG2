// script.js

let isScrolling = false;  // Bloquer le défilement pendant l'animation
let lastScrollTime = 0;  // Stocke l'heure du dernier événement
const scrollThreshold = 300; // Seuil du temps entre chaque événement de scroll (en ms)
const sections = document.querySelectorAll('section');  // Toutes les sections de la page

let currentIndex = 0;  // Index de la section actuelle

// Fonction pour défiler vers la section donnée
function scrollToSection(index) {
    if (index >= 0 && index < sections.length) {
        // Défilement vers la section, avec l'option smooth pour un défilement fluide
        sections[index].scrollIntoView({
            behavior: 'smooth',  // Défilement fluide
            block: 'start',
        });
    }
}

// Gestion du défilement avec la molette
window.addEventListener('wheel', function (e) {
    // Si une animation est en cours, on ignore l'événement
    if (isScrolling) return;

    const currentTime = Date.now(); // Temps actuel

    // Si le temps entre deux événements est trop court, on ignore l'événement
    if (currentTime - lastScrollTime < scrollThreshold) return;

    // Marquer le dernier temps de scroll
    lastScrollTime = currentTime;

    // Empêcher le défilement vertical standard
    e.preventDefault();

    // Déterminer la direction du défilement (vers le bas ou vers le haut)
    if (e.deltaY > 0) {
        // Si on descend, passer à la section suivante
        if (currentIndex < sections.length - 1) {
            currentIndex++;
        }
    } else {
        // Si on monte, revenir à la section précédente
        if (currentIndex > 0) {
            currentIndex--;
        }
    }

    // Effectuer le défilement vers la section suivante ou précédente
    scrollToSection(currentIndex);

    // Activer l'animation et empêcher un autre défilement pendant celle-ci
    isScrolling = true;

    // Réinitialiser l'état d'animation après 1 seconde (durée de l'animation)
    setTimeout(() => {
        isScrolling = false;
    }, 1000);  // 1 seconde pour garantir une animation fluide
});
