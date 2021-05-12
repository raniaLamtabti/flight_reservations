function findFlight() {
    var fromCountry = document.querySelector("#fromCountry").value;
    var toCountry = document.querySelector("#toCountry").value;
    var dateTimeDepart = document.querySelector("#dateDepart").value;
    var dateTimeArrive = document.querySelector("#dateArrive").value;
    fetch('http://localhost/flight_reservations/Flights/find', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            fromCountry,
            toCountry,
            dateTimeDepart,
            dateTimeArrive,
        })
    }).then(response => response.json()).then((data) => {
        let line = document.querySelector('.line');
        line.innerHTML = "";
        data.flights.forEach(flight => {
            let tr = document.createElement('tr')
            tr.innerHTML = `<td>${flight.dateTimeDepart}</td>
                            <td>${flight.dateTimeArrive}</td>
                            <td>${flight.fromCountry}</td>
                            <td>${flight.toCountry}</td>
                            </td>
                            <td class="d-flex">
                                <form action="update" method="POST"><input type="hidden" name="id" value="${flight.id}"><button href="update" class="btn btn-primary">Reserve</button></form>
                            </td>`;
            line.appendChild(tr)
        })
        if (data.flightsRout.length > 0) {
            let tr = document.createElement('tr')
            tr.innerHTML = `<th>Retour</th>`
            line.appendChild(tr)
            data.flightsRout.forEach(flight => {
                let tr = document.createElement('tr')
                tr.innerHTML = `<td>${flight.dateTimeDepart}</td>
                                <td>${flight.dateTimeArrive}</td>
                                <td>${flight.fromCountry}</td>
                                <td>${flight.toCountry}</td>
                                </td>
                                <td class="d-flex">
                                    <form action="update" method="POST"><input type="hidden" name="id" value="${flight.id}"><button href="update" class="btn btn-primary">Reserve</button></form>
                                </td>`;
                line.appendChild(tr)
            })
        }
    })
}