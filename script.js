// Navigation
function goToHome() {
  window.location.href = "home.html";
}

function goToSOS() {
  window.location.href = "sos.html";
}

// Network status
function updateStatus() {
  const el = document.getElementById("networkStatus");
  if (el) {
    el.innerText = navigator.onLine ? "Online ✅" : "Offline ⚠️";
  }
}

window.addEventListener("online", updateStatus);
window.addEventListener("offline", updateStatus);
updateStatus();

// Location detection + save + redirect
function getLocation() {
  const loc = document.getElementById("locationText");

  if (!navigator.geolocation) {
    if (loc) loc.innerText = "Geolocation not supported";
    return;
  }

  navigator.geolocation.getCurrentPosition(
    function (position) {
      const lat = position.coords.latitude;
      const lon = position.coords.longitude;

      // Show location
      if (loc) {
        loc.innerText = `Lat: ${lat}, Lon: ${lon}`;
      }

      console.log("Location working:", lat, lon);

      // Save in localStorage
      localStorage.setItem("latitude", lat);
      localStorage.setItem("longitude", lon);

      // Redirect after 2 sec
      setTimeout(() => {
     window.location.href = "home.html";
      }, 2000);
    },

    function (error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          alert("Location access denied.");
          break;
        case error.POSITION_UNAVAILABLE:
          alert("Location unavailable.");
          break;
        case error.TIMEOUT:
          alert("Location request timed out.");
          break;
        default:
          alert("Unknown error.");
      }
    }
  );
}

// Hospital details
function showDetails(name) {
  const box = document.getElementById("detailsBox");
  const details = document.getElementById("hospitalDetails");

  if (box && details) {
    box.classList.remove("hidden");

    details.innerText =
      name +
      "\nDistance: 2 km\nTime: 10 mins\nCost: ₹500 approx\nRating: 4.2⭐";
  }
}

// Save user details
function saveUserDetails() {
  const name = document.getElementById("name").value;
  const blood = document.getElementById("blood").value;
  const contact = document.getElementById("contact").value;

  localStorage.setItem("name", name);
  localStorage.setItem("blood", blood);
  localStorage.setItem("contact", contact);
}

// Call function
getLocation();
function getAddress(lat, lon) {
  fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
    .then(res => res.json())
    .then(data => {
      const address = data.display_name;

      document.getElementById("locationName").innerText =
        "📍 " + address;
    })
    .catch(() => {
      document.getElementById("locationName").innerText =
        "Location name not found";
    });
    getAddress(lat, lon);
}