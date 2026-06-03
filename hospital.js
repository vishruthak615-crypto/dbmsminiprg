function loadHospitals() {
  const lat = parseFloat(localStorage.getItem("latitude"));
  const lon = parseFloat(localStorage.getItem("longitude"));

  const location = new google.maps.LatLng(lat, lon);

  const map = new google.maps.Map(document.getElementById("map"), {
    center: location,
    zoom: 14
  });

  const request = {
    location: location,
    radius: 5000,
    type: ['hospital']
  };

  const service = new google.maps.places.PlacesService(map);

  service.nearbySearch(request, function(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {

      let output = "";

      results.forEach(place => {
        output += `${place.name} ⭐ ${place.rating || "N/A"}\n`;
      });

      document.getElementById("hospitalList").innerText = output;
    }
  });
}

window.onload = loadHospitals;
function openRoute(destLat, destLon) {
  const userLat = localStorage.getItem("latitude");
  const userLon = localStorage.getItem("longitude");

  if (!userLat || !userLon) {
    alert("User location not found!");
    return;
  }

  const url = `https://www.google.com/maps/dir/${userLat},${userLon}/${destLat},${destLon}`;

  window.open(url, "_blank");
}