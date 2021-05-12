async function getFlights() {
    let url = 'http://localhost/flight_reservations/Flights/index';
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}
async function renderFlights() {
    let Flights = await getFlights();
    // console.log(Flights);
    role = localStorage.getItem('Role')
    let container = document.querySelector('.container');
    let collapse = document.querySelector('.navbar-nav');
    if (role == 'client') {
        let li = document.createElement('li')
        li.classList.add("nav-item");
        li.innerHTML = `<a class="nav-link" href="#">Passengers</a>`;
        collapse.appendChild(li)
    }
    let line = document.querySelector('.line');
    line.innerHTML = "";
    Flights.forEach(flight => {
        let tr = document.createElement('tr')
        tr.innerHTML = `<td>${flight.dateTimeDepart}</td>
                        <td>${flight.dateTimeArrive}</td>
                        <td>${flight.fromCountry}</td>
                        <td>${flight.toCountry}</td>
                        </td>
                        <td class="d-flex">
                            <form action="update" method="POST"><input type="hidden" name="id" value="${flight.id}"><button href="update" class="btn btn-primary">Reserve</button></form>
                        </td>`;
        line.appendChild(tr);
    });
}

renderFlights();