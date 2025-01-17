function booktaxi(){
    const pickupAddress = document.getElementById('pickupLocation').value;
    const dropoffAddress = document.getElementById('dropoffLocation').value;
    const pickupDate = document.getElementById('pickupDate').value;
    const pickupTime = document.getElementById('pickupTime').value;

    if (pickupAddress&&dropoffAddress&&pickupDate&&pickupTime) {
        getCoordinates(pickupAddress,dropoffAddress,pickupDate,pickupTime);
    }else{
        alert("Please fill in all the fields.");
    }
}
function getCoordinates(pickupAddress,dropoffAddress,pickupDate,pickupTime){
    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({'address': pickupAddress}, function(pickupResults,pickupStatus){
        if(pickupStatus == 'OK'){
            const pickupLocation = pickupResults[0].geometry.location;

            geocoder.geocode({'address': dropoffAddress},function(dropoffResluts,dropoffStatus){
                if (dropoffStatus == 'OK') {
                    const dropoffLocation = dropoffResluts[0].geometry.location;

                }else{
                    alert('Could not find dropoff location: ' + dropoffStatus);
                }
            });
        }else {
            alert('Could not find pickup location: ' + pickupStatus);
        }
    });
}

function displyResults(pickupDate, pickupTime, pickupResults, dropoffResults){
    const pickupLatLang = pickupResults[0].geometry.location;
    const dropoffLatLang = dropoffResults[0].geometry.location;
    console.log(pickupLatLang+dropoffLatLang)

    document.getElementById('result').innerHTML= `
    <p><strong>Pickup Coordinates:</strong> ${pickupLatLng.lat()}, ${pickupLatLng.lng()}</p>
    <p><strong>Dropoff Coordinates:</strong> ${dropoffLatLng.lat()}, ${dropoffLatLng.lng()}</p>
    `;
}
