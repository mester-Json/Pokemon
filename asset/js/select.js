let checkbox = document.querySelector('.poke-checkbox');
let label = document.querySelector('.poke-label');

// Ajoutez un écouteur d'événements pour le clic
checkbox.addEventListener('change', function () {
    if (this.checked) {
        // Ajoutez la classe 'animate' à l'étiquette lorsque la case à cocher est cochée
        label.classList.add('animate');
    } else {
        // Supprimez la classe 'animate' lorsque la case à cocher n'est pas cochée
        label.classList.remove('animate');
    }
});