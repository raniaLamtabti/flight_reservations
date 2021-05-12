function login() {
    var username = document.querySelector("#username").value;
    var password = document.querySelector("#password").value;

    fetch('http://localhost/flight_reservations/Users/find', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            username,
            password,
        })
    }).then(response => response.json()).then((data) => {
        console.log(data.token);
        if (data.token) {
            localStorage.setItem('Token', data.token)
            localStorage.setItem('Id', data.user['id'])
            localStorage.setItem('Role', data.user['role'])
            window.location.href = "../../frontend/allFlights.html";
        } else {
            window.location.href = "../../frontend/index.html";
        }
    })
}


// window.location.href = `../../frontend/allFlights.html?id=${id}`;

// window.URLSearchParams