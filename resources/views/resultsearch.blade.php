@extends('layout',['title'=>'Resultat recherche', 'active_link'=>'expedition'])

@push('styles')
{{-- Leaflet library --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
<style>
  form a:hover{
    text-decoration: underline;
  }
  .info-item div{
    font-size: 14px;
  }
  header,footer{
    background-color: #0F67B1!important;;
  }
</style>
@endpush
@push("scripts")
<script>
  // ======== Map view initialization
  const map = L.map("map");
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", { 
      maxZoom: 19, 
      attribution: '© <a href = "https://www.openstreetmap.org/copyright"> OpenStreetMap </a> contributors'
    }
  ).addTo(map);
  map.setView([-41.3058, 174.82082], 5);

  // ====== Leaflet drawers init
  var drawnItems = new L.FeatureGroup();
  map.addLayer(drawnItems);
  map.on(L.Draw.Event.CREATED, function (event) {
    var layer = event.layer;
    drawnItems.addLayer(layer);
  });

  // ======== Example custom icon with png and simple color
  var okayIcon = L.icon({
    iconUrl: @json(asset('assets/img/location_okay.png')),
    shadowUrl: @json(asset('assets/img/location_okay.png')),
    iconSize:     [30, 30], // size of the icon
    shadowSize:   [10, 10], // size of the shadow
    iconAnchor:   [0, 0], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
  });
  var redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });

  // ======== Example with one Markers
  // let myMarker = L.marker([48.858, 2.29]).addTo(map); 
  // myMarker.bindPopup("Tour Effeil, paris").openPopup();

  // ======= Example with Multiple markers
  let allMarkers = [];
  var planes = [
		[true,46.9167,7.4667,"Point N°1: Entrepot en suisse"],
		[false,49.0068908,2.571082,"Point N°2: Aeroport Paris charle de gaules"],
		[false,3.72256,11.55330,"Point N°3: Aeroport de Nsimalen"]
	];
  for (var i = 0; i < planes.length; i++) {
    marker =  planes[i][0] == true 
      ? new L.marker([planes[i][1],planes[i][2]]).addTo(map) 
      : new L.marker([planes[i][1],planes[i][2]], {icon: redIcon}).addTo(map);
    allMarkers.push(marker);
    marker.bindPopup(planes[i][3]).openPopup();
  }

  // ==== display the line between two markers
  var latlngs = [allMarkers[1].getLatLng(), allMarkers[2].getLatLng()];
  var polyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
</script>
@endpush


@section('content')

<main id="main">
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 mt-4">
          <div class="section-header">
              <h2>Description expedition</h2>
          </div>
          <div class="col-lg-4">
            <div class="info-item d-flex">
              <i class="bi bi-person-vcard flex-shrink-0"></i>
              <div>
                <h4>Expéditeur:</h4>
                <p> Mr San Jose, +237 6453893493</p>
              </div>
            </div>
            <div class="info-item d-flex">
              <i class="bi bi-person-vcard-fill flex-shrink-0"></i>
              <div>
                <h4>Destinataire</h4>
                <p>Mme Lucie Emilie, +33006453893493</p>
              </div>
            </div>
            <div class="info-item d-flex">
              <i class="bi bi-boxes flex-shrink-0"></i>
              <div>
                <h4>Packages: (02)</h4>
                <ul>
                  <li>Ordinateur HP</li>
                  <li>Mackbook 13PRO Ultra Slim</li>
                </ul>
              </div>
            </div>
            
          </div>
          <div class="col-lg-8">
            <div id="map" style="height: 400px"></div>
          </div>
        </div>
    </div>
  </section>
</main>

@endsection