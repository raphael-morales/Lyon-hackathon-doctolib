const axios = require('axios').default;

function fetchPokemonJSON() {
    // Feel free to download this HTML and edit it, to use another Pokemon ID
    const pokemonId = 1;
    const url = `https://pokeapi.co/api/v2/pokemon/${pokemonId}`;
    axios.get(url)
        .then(function(response) {
            return response.data; // response.data instead of response.json() with fetch
        })
        .then(function(pokemon) {
            console.log('data decoded from JSON:', pokemon);

            // Build a block of HTML
            const pokemonHtml = `
        <p><strong>${pokemon.name}</strong></p>
        <img src="${pokemon.sprites.front_shiny}" />
      `;
            document.querySelector('#pokemon').innerHTML = pokemonHtml;
        });
}

fetchPokemonJSON();
