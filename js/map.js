  // var map;
  // var arrMarkers = [];
  // var arrInfoWindows = [];

  // function mapInit(){
  //   var centerCoord = new google.maps.LatLng(54.001387537213866, -1.422128677368164); // GCC
  //   var mapOptions = {
  //     zoom: 10,
  //     center: centerCoord,
  //     mapTypeId: google.maps.MapTypeId.ROADMAP
  //   };
  //   map = new google.maps.Map(document.getElementById("map"), mapOptions);

  //   $.getJSON("http://goldsboroughcricketclub.co.uk/wp-content/themes/gcc/maps/map.json", {}, function(data){
  //     $.each(data.places, function(i, item){
  //       $("#markers").append('<li><a href="#" rel="' + i + '">' + item.title + '</a></li>');
  //       var marker = new google.maps.Marker({
  //         position: new google.maps.LatLng(item.lat, item.lng),
  //         map: map,
  //         title: item.title
  //       });
  //       arrMarkers[i] = marker;
  //       var infowindow = new google.maps.InfoWindow({
  //         content: "<h3>"+ item.title +"</h3><p>"+ item.description +"</p>"
  //       });
  //       arrInfoWindows[i] = infowindow;
  //       google.maps.event.addListener(marker, 'click', function() {
  //         infowindow.open(map, marker);
  //       });
  //     });
  //   });
  // }
  // $(function(){
  //   // initialize map (create markers, infowindows and list)
  //   mapInit();

  //   // "live" bind click event
  //   $("#markers a").live("click", function(){
  //     var i = $(this).attr("rel");
  //     // this next line closes all open infowindows before opening the selected one
  //     for(x=0; x < arrInfoWindows.length; x++){ arrInfoWindows[x].close(); }
  //       arrInfoWindows[i].open(map, arrMarkers[i]);
  //   });
  // });
