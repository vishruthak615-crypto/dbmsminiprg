function showTab(tabId){

let tabs=document.querySelectorAll('.tab');

tabs.forEach(tab=>{
tab.classList.remove('active');
});

document.getElementById(tabId).classList.add('active');

}
function callNumber(num) {
  window.location.href = "tel:" + num;
}
function updateNetworkStatus(){

const status =
document.getElementById("networkStatus");

status.innerHTML =
navigator.onLine ?
"🟢 Online" :
"🔴 Offline Mode";

}

updateNetworkStatus();

window.addEventListener("online", updateNetworkStatus);
window.addEventListener("offline", updateNetworkStatus);
function sendSOS(){

alert(
"🚨 SOS Activated\n\n" +
"Location Captured\n" +
"Nearest Hospital Notified\n" +
"Emergency Contact Alerted"
);

window.location.href="emergency.html";
window.onload = function(){

let lat = localStorage.getItem("latitude");
let lon = localStorage.getItem("longitude");

document.getElementById("userLocation").innerHTML =
"Latitude: " + lat +
"<br>Longitude: " + lon;

}
}
let lat = localStorage.getItem("latitude");
let lon = localStorage.getItem("longitude");

console.log(lat, lon);