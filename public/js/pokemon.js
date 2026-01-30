document.addEventListener("DOMContentLoaded", async function() {
    const pokeImg = document.getElementById('nav-poke-img');
    const starterIds = [1, 4, 7, 25];

    const storedPokemon = sessionStorage.getItem('sessionPokemonUrl');

    if (storedPokemon) {
        pokeImg.src = storedPokemon;
        pokeImg.style.display = 'block';
    } else {

        const randomIndex = Math.floor(Math.random() * starterIds.length);
        const randomId = starterIds[randomIndex];

        try {
            const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${randomId}`);
            const data = await response.json();
            const imageUrl = data.sprites.front_shiny;

            if (imageUrl) {
                pokeImg.src = imageUrl;
                pokeImg.style.display = 'block';

                sessionStorage.setItem('sessionPokemonUrl', imageUrl);
            }
        } catch (error) {
            console.error("Pokémon konnte nicht geladen werden", error);
        }
    }
});