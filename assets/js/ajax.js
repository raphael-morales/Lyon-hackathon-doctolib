document.querySelector("#locations").addEventListener('click', requester);

function requester(event) {

// Get the link object you click in the DOM
    let locations = event.target;
    let link = watchlistIcon.dataset.href;
// Send an HTTP request with fetch to the URI defined in the href
    fetch(link)
        .then(function(res) {

            watchlistIcon.classList.remove('far'); // Remove the .far (empty heart) from classes in <i> element
            watchlistIcon.classList.add('fas'); // Add the .fas (full heart) from classes in <i> element
        });

}
