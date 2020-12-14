document.documentElement.setAttribute("lang", "en");
document.documentElement.removeAttribute("class");

// axe.run( function(err, results) {
//   console.log( results.violations );
// } );




let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 10,
  });
  infoWindow = new google.maps.InfoWindow();
  const locationButton = document.createElement("button");
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
        // //   infoWindow.setPosition(pos);
          infoWindow.open(map);
          map.setCenter(pos);
        var marker = new google.maps.Marker({
            position: pos,
            map: map,});
            var coordinates=(marker.getPosition().lng()).toString()+','+(marker.getPosition().lat()).toString();
            $('#coordinates').attr('value',coordinates);

            map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            marker.setMap(null);
            // Create a new InfoWindow.
            marker = new google.maps.Marker({
            position: mapsMouseEvent.latLng,
            map: map,});

            // console.log(marker.getPosition().lat())  ;
            // console.log(marker.getPosition().lng())  ;
            coordinates=(marker.getPosition().lng()).toString()+','+(marker.getPosition().lat()).toString();
            $('#coordinates').attr('value',coordinates);
            // $('#lat').attr('value',marker.getPosition().lat());

        });
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }


}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}


         //today dishes carousel

         $('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 4;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}

        next.children(':first-child').clone().appendTo($(this));
      }
});
