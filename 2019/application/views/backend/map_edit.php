<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Search Box</title>
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }
     .page td {
        padding:0!important; margin:0!important;
    }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;

      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        margin-top: 10px;
        background-color: #fff;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
        border-style: solid;
        border-width: 1px;
        border-color:#ffffff;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }


      .popup-bubble {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 100px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
      .popup-bubble-anchor {
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, 0);
        width: 0;
        height: 0;

        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }

      .popup-container {
        cursor: auto;
        height: 0;
        position: absolute;
        width: 300px;
      }
    </style>
  </head>
  <body>

<div id="content">
    <input type="hidden" id="company" name="company" value="<?php echo $company?>">
      <table  class="page"><tr>
      <td valign="top">
        <table  class="page">
       <tr><td><table class="page"><tr><td><b><?php echo $company?></b></td></tr></table></td></tr>
        </table>
      </td>
    </tr></table>
</div>



    <input id="pac-input" class="controls" type="text" placeholder="Search Company">
    <div id="map"></div>
    <script>
var l1 = <?php echo$lat_p?>;
var l2 = <?php echo$lng_p?>;

var cl1 = 0;
var cl2 = 0;

      var map;
      var markers = [];
var haightAshbury = {lat: l1, lng: l2};
      function initAutocomplete() {
         map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: l1, lng: l2},
          zoom: 6,
          mapTypeId: 'roadmap'
        });

  Popup = createPopupClass();
  popup = new Popup(
      new google.maps.LatLng(l1, l2),
      document.getElementById('content'));
  popup.setMap(map);
          google.maps.event.addListener(map,'click',function(event) {                
                var n_lat = event.latLng.lat();
                var n_lng=  event.latLng.lng();
                 window.opener.document.getElementById("get_lat").value =n_lat;
                 window.opener.document.getElementById("get_lng").value =n_lng;
 clearMarkers();
 addMarker(event.latLng);





var company = '<?php echo $company?>';
var txturl ="http://hatyaipremiumproperty.com/2019/Control/Maps?company="+company+"&lat="+n_lat+"&lng="+n_lng;               
window.opener.document.getElementById("tool_map_url").value =txturl;  
//load_page(n_lat,n_lng);   
            });

 addMarker(haightAshbury);



        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];

        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }


          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

      }



 // Adds a marker to the map and push to the array.
      function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }



function createPopupClass() {

  function Popup(position, content) {
    this.position = position;

    content.classList.add('popup-bubble');

    var bubbleAnchor = document.createElement('div');
    bubbleAnchor.classList.add('popup-bubble-anchor');
    bubbleAnchor.appendChild(content);

    this.containerDiv = document.createElement('div');
    this.containerDiv.classList.add('popup-container');
    this.containerDiv.appendChild(bubbleAnchor);

    google.maps.OverlayView.preventMapHitsAndGesturesFrom(this.containerDiv);
  }
 
  Popup.prototype = Object.create(google.maps.OverlayView.prototype);


  Popup.prototype.onAdd = function() {
    this.getPanes().floatPane.appendChild(this.containerDiv);
  };

  Popup.prototype.onRemove = function() {
    if (this.containerDiv.parentElement) {
      this.containerDiv.parentElement.removeChild(this.containerDiv);
    }
  };

  Popup.prototype.draw = function() {
    var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);

    var display =
        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
        'block' :
        'none';

    if (display === 'block') {
      this.containerDiv.style.left = divPosition.x + 'px';
      this.containerDiv.style.top = divPosition.y + 'px';
    }
    if (this.containerDiv.style.display !== display) {
      this.containerDiv.style.display = display;
    }
  };

  return Popup;
}
    </script>
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub8TKCTBfUq4F63OfE8Uu70WqUOT-0kg&callback=initAutocomplete&libraries=places"
  type="text/javascript"></script>
 
  </body>
</html>