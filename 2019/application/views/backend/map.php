
<?php $pthc= base_url();?>            
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width:auto  ;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      /* The popup bubble styling. */
      .popup-bubble {
        /* Position the bubble centred-above its parent. */
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the bubble. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 100px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
      /* The parent of the bubble. A zero-height div at the top of the tip. */
      .popup-bubble-anchor {
        /* Position the div a fixed distance above the tip. */
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      /* This element draws the tip. */
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
      }
      /* JavaScript will position this div at the bottom of the popup tip. */
      .popup-container {
        cursor: auto;
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 300px;
      }
      .page td {
        padding:0; margin:0;
    }

    </style>
  </head>
  <body>
<?php

function strc($n){
  $txt = "";
  for($i=0;$i<$n;$i++){
     $txt = $txt."<td><img src='' style='width:10px;'></td>";
  }
  return  "<table class='page'><tr>".$txt."</tr></table>";
}
?>
<input type="hidden" id="get_lat">
<input type="hidden" id="get_lng">
    <div id="map"></div>
<div id="content">
      <table  class="page"><tr><td valign="top">
<!--      <img src="<?php echo$img_data?>" style="height:50px;">  -->
      </td>
      <td valign="top">
        <table  class="page">
       <tr><td><table class="page"><tr><td><b><?php echo $company?></b></td></tr></table></td></tr>
        </table>
      </td>
    </tr></table>
</div>


<script type="text/javascript">
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft
var top = (height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
} 
</script>



    <script>
var map, popup, Popup;
var l1 = <?php echo$lat_p?>;
var l2 = <?php echo$lng_p?>;

var cl1 = 0;
var cl2 = 0;
/** Initializes the map and the custom popup. */
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: l1, lng: l2},
    zoom: 15,
          zoomControl: true,
  mapTypeControl: false,
  scaleControl: true,
  streetViewControl: false,
  rotateControl: true,
  fullscreenControl: true
  });

  Popup = createPopupClass();
  popup = new Popup(
      new google.maps.LatLng(l1, l2),
      document.getElementById('content'));
  popup.setMap(map);



           google.maps.event.addListener(map,'click',function(event) {                
                var n_lat = event.latLng.lat();
                var n_lng=  event.latLng.lng();
                 document.getElementById('get_lat').value = n_lat;
                 document.getElementById('get_lng').value = n_lng;
                // PopupCenter('<?php echo base_url();?>Rentctrl/load_map','xtf','900','500');  
            });

}




/**
 * Returns the Popup class.
 *
 * Unfortunately, the Popup class can only be defined after
 * google.maps.OverlayView is defined, when the Maps API is loaded.
 * This function should be called by initMap.
 */
function createPopupClass() {
  /**
   * A customized popup on the map.
   * @param {!google.maps.LatLng} position
   * @param {!Element} content The bubble div.
   * @constructor
   * @extends {google.maps.OverlayView}
   */
  function Popup(position, content) {
    this.position = position;

    content.classList.add('popup-bubble');

    // This zero-height div is positioned at the bottom of the bubble.
    var bubbleAnchor = document.createElement('div');
    bubbleAnchor.classList.add('popup-bubble-anchor');
    bubbleAnchor.appendChild(content);

    // This zero-height div is positioned at the bottom of the tip.
    this.containerDiv = document.createElement('div');
    this.containerDiv.classList.add('popup-container');
    this.containerDiv.appendChild(bubbleAnchor);

    // Optionally stop clicks, etc., from bubbling up to the map.
    google.maps.OverlayView.preventMapHitsAndGesturesFrom(this.containerDiv);
  }
  // ES5 magic to extend google.maps.OverlayView.
  Popup.prototype = Object.create(google.maps.OverlayView.prototype);

  /** Called when the popup is added to the map. */
  Popup.prototype.onAdd = function() {
    this.getPanes().floatPane.appendChild(this.containerDiv);
  };

  /** Called when the popup is removed from the map. */
  Popup.prototype.onRemove = function() {
    if (this.containerDiv.parentElement) {
      this.containerDiv.parentElement.removeChild(this.containerDiv);
    }
  };

  /** Called each frame when the popup needs to draw itself. */
  Popup.prototype.draw = function() {
    var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);

    // Hide the popup when it is far out of view.
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
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub8TKCTBfUq4F63OfE8Uu70WqUOT-0kg&callback=initMap"
  type="text/javascript"></script>
    </body>    
</html>
