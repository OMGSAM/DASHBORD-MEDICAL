<?php include 'server/server.php' ?>
<?php
 

 $users = [
    ['id' => 1, 'name' => 'Samir', 'latitude' => '31.629472', 'longitude' => '-8.001564'],
    ['id' => 2, 'name' => 'Nadia', 'latitude' => '34.020882', 'longitude' => '-6.841650'],
    ['id' => 3, 'name' => 'Karim', 'latitude' => '33.589886', 'longitude' => '-7.603869'],
];

// Transformer en JSON pour JS
$users_json = json_encode($users);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Carte utilisateurs</title>
  <style>
    #map { height: 600px; width: 100%; }
  </style>
</head>
<body>

<h3>Carte avec plusieurs utilisateurs</h3>
<div id="map"></div>

<!-- Charger API Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=TA_CLE_API"></script>

<script>
  const users = <?= $users_json ?>;
  
  function initMap() {
    // Centre carte sur premier utilisateur ou position par défaut
    const center = users.length > 0 ? { lat: parseFloat(users[0].latitude), lng: parseFloat(users[0].longitude) } : { lat: 31.629472, lng: -8.001564 };

    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: center,
    });

    // Ajouter un marqueur pour chaque utilisateur
    users.forEach(user => {
      const marker = new google.maps.Marker({
        position: { lat: parseFloat(user.latitude), lng: parseFloat(user.longitude) },
        map: map,
        title: user.name,
      });

      // Optionnel : infobulle au clic sur marqueur
      const infowindow = new google.maps.InfoWindow({
        content: `<strong>${user.name}</strong><br>Lat: ${user.latitude}, Lng: ${user.longitude}`
      });

      marker.addListener('click', () => {
        infowindow.open(map, marker);
      });
    });
  }

  window.onload = initMap;
</script>

</body>
</html>
