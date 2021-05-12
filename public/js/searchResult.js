async function renderFlights() {
    var searchParams = new URLSearchParams(location.href);
    for (var value of searchParams.values()) {
        console.log(value);
        console.log('ok');
    }
    searchParams.forEach(function(arrayItem) {
        var x = arrayItem.prop1 + 2;
        console.log(x);
    });
    // let Flights = await getFlights();
    // console.log(Flights);
    // role = localStorage.getItem('Role')
    // let container = document.querySelector('.container');
    // let collapse = document.querySelector('.navbar-nav');
    // if (role == 'client') {
    //     let li = document.createElement('li')
    //     li.classList.add("nav-item");
    //     li.innerHTML = ` < a class = "nav-link"
    // href = "#" > Passengers < /a>`;
    //     collapse.appendChild(li)
    // }
    // Flights.forEach(flight => {
    //     let div = document.createElement('div')
    //     div.innerHTML = `<table class="table">
    //                         <thead>
    //                             <tr>
    //                                 <th scope="col">#</th>
    //                                 <th scope="col">Depart</th>
    //                                 <th scope="col">Land</th>
    //                                 <th scope="col">Origin</th>
    //                                 <th scope="col">Destination</th>
    //                                 <th scope="col">Options</th>
    //                             </tr>
    //                         </thead>
    //                         <tbody>
    //                             <tr>
    //                                 <th scope="row">${flight.id}</th>
    //                                 <td>${flight.dateTimeDepart}</td>
    //                                 <td>${flight.dateTimeArrive}</td>
    //                                 <td>${flight.fromCountry}</td>
    //                                 <td>${flight.toCountry}</td>
    //                                 </td>
    //                                 <td class="d-flex">
    //                                     <form action="update" method="POST"><input type="hidden" name="id" value="${flight.id}"><button href="update" class="btn btn-secondary">Edit</button></form>
    //                                     <form action="delete" method="POST"><input type="hidden" name="id" value="${flight.id}"><button href="delete" class="btn btn-danger">Delete</button></form>
    //                                 </td>
    //                             </tr>
    //                         </tbody>
    //                     </table>`;
    //     container.appendChild(div)
    // });
}

renderFlights();