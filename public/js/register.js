function register() {
    var username = document.querySelector("#username").value;
    var password = document.querySelector("#pass").value;
    var firstName = document.querySelector("#firstName").value;
    var lastName = document.querySelector("#lastName").value;
    var dateBirth = document.querySelector("#dob").value;
    var role = document.querySelector("#role").value;

    fetch('http://localhost/flight_reservations/Users/create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            username,
            password,
            firstName,
            lastName,
            dateBirth,
            role
        })
    }).then(response => response.json()).then((data) => window.location.href = "../../frontend/login.html")
}