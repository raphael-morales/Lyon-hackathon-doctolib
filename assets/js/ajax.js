document.querySelector("#locations").addEventListener('click', requester);

function requester(event) {

// Get the link object you click in the DOM
    let locations = event.target;
// Send an HTTP request with fetch to the URI defined in the href
    fetch("https://priaid-symptom-checker-v1.p.rapidapi.com/diagnosis/specialisations?symptoms=%255B234%252C11%255D&gender=male&year_of_birth=1984&language=fr-fr", {
        "method": "GET",
        "headers": {
            "x-rapidapi-host": "priaid-symptom-checker-v1.p.rapidapi.com",
            "x-rapidapi-key": "40a66d47a4mshff1a14197f18c3bp1f4d02jsne12e77f2fa5b"
        }
    })
        .then(response => {
            console.log(response);
            locations.after('Hello');
        })
        .catch(err => {
            console.log(err);
        });

}
