document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([-27.366788, -55.896030], 11); 
  
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(map);
 
  });
  