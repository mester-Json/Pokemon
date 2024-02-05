document.getElementById('pokemonForm').addEventListener('submit', function (e) {
    var selectedPokemons = document.querySelectorAll('input[type="checkbox"]:checked');
    if (selectedPokemons.length !== 2) {
        alert('Veuillez sélectionner exactement deux Pokémon');
        e.preventDefault();
    }
});