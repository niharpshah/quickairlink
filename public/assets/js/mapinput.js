
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
    mapTypeControl: false,
    center: { lat: -36.8536, lng: 174.7864 },
    // -36.8536535441665, 174.7864472790554
    zoom: 12,
    });
new AutocompleteDirectionsHandler(map);
}

class AutocompleteDirectionsHandler {
map;
originPlaceId;
destinationPlaceId;
travelMode;
directionsService;
directionsRenderer;
constructor(map) {
  this.map = map;
  this.originPlaceId = "";
  this.destinationPlaceId = "";
  this.travelMode = google.maps.TravelMode.DRIVING;
  this.directionsService = new google.maps.DirectionsService();
  this.directionsRenderer = new google.maps.DirectionsRenderer();
  this.directionsRenderer.setMap(map);

  const originInput = document.getElementById("pickupLocation");
  const destinationInput = document.getElementById("dropoffLocation");
  const options = {
    types: ['(cities)'],
    componentRestrictions: { country: "nz" },
  }
//   const modeSelector = document.getElementById("mode-selector");
  // Specify just the place data fields that you need.
  const originAutocomplete = new google.maps.places.Autocomplete(
    originInput,
    { fields: ["place_id"] },
    options,
  );
  // Specify just the place data fields that you need.
  const destinationAutocomplete = new google.maps.places.Autocomplete(
    destinationInput,
    { fields: ["place_id"] },
    options,
  );

  this.setupPlaceChangedListener(originAutocomplete, "ORIG");
  this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
}
setupClickListener(id, mode) {
  const radioButton = document.getElementById(id);

  radioButton.addEventListener("click", () => {
    this.travelMode = mode;
    this.route();
  });
}
setupPlaceChangedListener(autocomplete, mode) {
  autocomplete.bindTo("bounds", this.map);
  autocomplete.addListener("place_changed", () => {
    const place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert("Please select an option from the dropdown list.");
      return;
    }

    if (mode === "ORIG") {
      this.originPlaceId = place.place_id;
    } else {
      this.destinationPlaceId = place.place_id;
    }

    this.route();
  });
}
route() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }

  const me = this;

  this.directionsService.route(
    {
      origin: { placeId: this.originPlaceId },
      destination: { placeId: this.destinationPlaceId },
      travelMode: this.travelMode,
    },
    (response, status) => {
      if (status === "OK") {
        me.directionsRenderer.setDirections(response);
        var resultSpan = document.getElementById('distanceInKM')
        resultSpan.innerHTML = (response.routes[0].legs[0].distance.value / 1000).toFixed(2) + 'KM';
        var distance = Math.round(response.routes[0].legs[0].distance.value / 1000,2)
        var baseRate = 4
        var ratePerKm = 2.8
        var totalPrice = baseRate + (ratePerKm * distance)
        console.log(response);
        var calculateSpan = document.getElementById("calculate")
        calculateSpan.innerHTML = '$' + (Math.round(totalPrice * 100) / 100).toFixed(2)
        document.getElementById("calculated").value = (Math.round(totalPrice * 100) / 100).toFixed(2)
        document.getElementById("dInKM").value = (response.routes[0].legs[0].distance.value / 1000).toFixed(2)
        resultSpan.style.display = "block"
        calculateSpan.style.display = "block"
        // START ADDRESS LOCATION
        var plocation = document.getElementById('result')
        plocation.innerHTML = response.routes[0].legs[0].start_location.lat() + ' | ' + response.routes[0].legs[0].start_location.lng();
        plocation.style.display = "block"
        document.getElementById("pLatitude").value = response.routes[0].legs[0].start_location.lat()
        document.getElementById("pLongitude").value = response.routes[0].legs[0].start_location.lng()
        // END ADDRESS LOCATION
        var elocation = document.getElementById('result2')
        elocation.innerHTML = response.routes[0].legs[0].end_location.lat() + ' | ' + response.routes[0].legs[0].end_location.lng();
        elocation.style.display = "block"
        document.getElementById("dLatitude").value = response.routes[0].legs[0].end_location.lat()
        document.getElementById("dLongitude").value = response.routes[0].legs[0].end_location.lng()
        console.log(response)
      } else {
        window.alert("Directions request failed due to " + status);
      }
    },
  );
}

// calculatePrice($distanceInKm){
//     // Convert distance in KM
//     $distance = $distanceInKm / 1000;
//     // define the prices
//     $baseRate = 4;
//     $ratePerKm = 2;
//  // Calculate the price
//     $totalPrice = $baseRate + ($ratePerKm * $distance);
//     return $totalPrice;
//     console.log($totalPrice);

//     document.getElementById('calculate').value = $totalPrice;
// }

// sendVariable(){
//     fetch('/send-value',{
//         method: 'POST',
//         headers: {
//             'content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//         body: JSON.stringify({value: plocation})
//     })
//     .then(response =>response.json())
//     .then(data =>{
//         console.log('Response from server:',data);
//     }).catch(error=>{
//         console.error('Error:',error);
//     });
// }

}
window.initMap = initMap;
