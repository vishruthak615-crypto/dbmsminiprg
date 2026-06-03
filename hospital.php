<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Nearby Hospitals | Tourist Medicare Assist</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#0f766e,#14b8a6,#99f6e4);
    padding:30px;
    overflow-x:hidden;
}

/* Floating Icons */

.icon{
    position:fixed;
    font-size:35px;
    opacity:.15;
    animation:float 8s infinite ease-in-out;
}

.icon:nth-child(1){top:10%;left:5%;}
.icon:nth-child(2){top:20%;right:8%;}
.icon:nth-child(3){bottom:15%;left:10%;}
.icon:nth-child(4){bottom:10%;right:5%;}

@keyframes float{
    50%{
        transform:translateY(-20px);
    }
}

/* Back Button */

.back-btn{
    display:inline-block;
    text-decoration:none;
    background:white;
    color:#0f766e;
    padding:12px 20px;
    border-radius:12px;
    font-weight:600;
    margin-bottom:20px;
}

/* Emergency Banner */

.emergency-banner{
    background:#ef4444;
    color:white;
    text-align:center;
    padding:15px;
    border-radius:15px;
    margin-bottom:25px;
    font-weight:600;
    animation:blink 1.5s infinite;
}

@keyframes blink{
    50%{
        opacity:.7;
    }
}

/* Header */

.header{
    text-align:center;
    color:white;
    margin-bottom:30px;
}

.header h1{
    font-size:3rem;
}

.header p{
    margin-top:10px;
    opacity:.9;
}

/* Search Box */

.search-box{
    max-width:900px;
    margin:auto;
    margin-bottom:25px;
}

.search-box input{
    width:100%;
    padding:15px;
    border:none;
    border-radius:15px;
    font-size:16px;
}

/* Hospital Cards */

.container{
    max-width:1200px;
    margin:auto;
}

.hospital-card{
    background:rgba(255,255,255,.95);
    border-radius:25px;
    padding:25px;
    margin-bottom:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    transition:.4s;
}

.hospital-card:hover{
    transform:translateY(-8px);
}

.hospital-card h2{
    color:#0f766e;
    margin-bottom:15px;
}

.info{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:10px;
}

.info p{
    padding:8px 0;
}

.btn{
    margin-top:20px;
    background:#0f766e;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:12px;
    cursor:pointer;
    font-size:15px;
}

.btn:hover{
    background:#115e59;
}

/* Footer */

.footer{
    text-align:center;
    margin-top:30px;
    color:white;
    font-weight:500;
}

@media(max-width:768px){

.header h1{
    font-size:2rem;
}

}

</style>
</head>

<body>

<div class="icon">🏥</div>
<div class="icon">🚑</div>
<div class="icon">💊</div>
<div class="icon">❤️</div>

<a href="home.html" class="back-btn">← Back to Home</a>

<div class="emergency-banner">
🚨 Need Immediate Help? Call 108 or Press the SOS Button 🚨
</div>

<div class="header">
<h1>🏥 Nearby Hospitals</h1>
<p>Find trusted healthcare facilities near your location</p>
</div>

<div class="search-box">
<input type="text" id="searchInput" placeholder="Search hospitals...">
</div>

<div class="container">




<?php
include 'db.php';

$sql = "SELECT * FROM hospitals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
        {
?>
        
<div class="hospital-card">

    <h2>🏥 <?php echo $row['hospital_name']; ?></h2>

    <div class="info">
        <p>📍 Distance: <?php echo $row['distance']; ?></p>
        <p>👨‍⚕️ Doctor: <?php echo $row['doctor_name']; ?></p>
        <p>🩺 Specialization: <?php echo $row['specialization']; ?></p>
        <p>💰 Estimated Cost: <?php echo $row['estimated_cost']; ?></p>
        <p>⏱️ Waiting Time: <?php echo $row['waiting_time']; ?></p>
        <p>⭐ Rating: <?php echo $row['rating']; ?> / 5</p>
        <p>🚑 Ambulance Available: <?php echo $row['ambulance_available']; ?></p>
        <p>☎️ Helpdesk: <?php echo $row['helpdesk']; ?></p>
        <p>🚨 Emergency: <?php echo $row['emergency_number']; ?></p>
    </div>

    <button class="btn">View Route</button>

</div>

<?php
    }
} else {
    echo "No hospitals found";
}
?>

<hr/>





<div class="hospital-card">

<h2>Manipal Hospital</h2>

<div class="info">
<p>📍 Distance: 2.4 km</p>
<p>👩‍⚕️ Doctor: Dr. Priya Sharma</p>
<p>🩺 Specialization: Cardiology</p>
<p>💰 Estimated Cost: ₹700 - ₹1200</p>
<p>⏱️ Waiting Time: 20 Minutes</p>
<p>⭐ Rating: 4.7 / 5</p>
<p>🚑 Ambulance Available: Yes</p>
<p>☎️ Helpdesk: +91 80 6789 1234</p>
<p>🚨 Emergency: 108</p>
</div>

<button class="btn">View Route</button>

</div>

<div class="hospital-card">

<h2>🏥 City Medical Center</h2>

<div class="info">
<p>📍 Distance: 3.1 km</p>
<p>👨‍⚕️ Doctor: Dr. Arjun Rao</p>
<p>🩺 Specialization: General Medicine</p>
<p>💰 Estimated Cost: ₹400 - ₹800</p>
<p>⏱️ Waiting Time: 10 Minutes</p>
<p>⭐ Rating: 4.6 / 5</p>
<p>🚑 Ambulance Available: Yes</p>
<p>☎️ Helpdesk: +91 80 9876 5432</p>
<p>🚨 Emergency: 108</p>
</div>

<button class="btn">View Route</button>

</div>

<div class="hospital-card">

<h2>🏥 Tourist Emergency Care</h2>

<div class="info">
<p>📍 Distance: 4.5 km</p>
<p>👩‍⚕️ Doctor: Dr. Meera Nair</p>
<p>🩺 Specialization: Trauma Care</p>
<p>💰 Estimated Cost: ₹600 - ₹1500</p>
<p>⏱️ Waiting Time: 5 Minutes</p>
<p>⭐ Rating: 4.9 / 5</p>
<p>🚑 Ambulance Available: Yes</p>
<p>☎️ Helpdesk: +91 80 1122 3344</p>
<p>🚨 Emergency: 108</p>
</div>

<button onclick="openRoute(12.9716, 77.5946)">
  View Route
</button>

</div>

</div>

<div class="footer">
Tourist Medicare Assist • Healthcare Support for Travelers 🌍
</div>

<script>

const searchInput = document.getElementById("searchInput");

searchInput.addEventListener("keyup", function(){

let filter = searchInput.value.toLowerCase();

let cards = document.querySelectorAll(".hospital-card");

cards.forEach(card=>{

let text = card.innerText.toLowerCase();

if(text.includes(filter)){
card.style.display="block";
}else{
card.style.display="none";
}

});

});

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
<script src="hospital.js"></script>
<div id="map" style="height:300px;"></div>
<pre id="hospitalList"></pre>

</body>
</html>