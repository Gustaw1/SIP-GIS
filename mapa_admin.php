<?php
session_start();
if(!isset($_SESSION['zalogowany'])){
    $_SESSION['komunikat'] =
     "Nie jestes zalogowany!";
    header('Location: login.php');
    exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html>
<head>
    <title>Projekt SIP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <!-- The gmaps script -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&amp;sensor=false"></script>
    <!-- OpenLayers base script -->
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script type="text/javascript">

        var lon_center = 18.6342379;
        var lat_center = 54.3467815;
       
        var map;
        var mercator = new OpenLayers.Projection("EPSG:900913");
        var geographic = new OpenLayers.Projection("EPSG:4326");
        var markers;
        var numClicks = 0;

        function init() {
            //==================swiat==============================================//
            var options = {
                projection: mercator,
                displayProjection: geographic,
                units: "m",
                maxResolution: 156543.0339,
                maxExtent: new OpenLayers.Bounds(-20037508.34, -20037508.34,
                                                     20037508.34, 20037508.34)
            };
            map = new OpenLayers.Map('map', options);

            var osm = new OpenLayers.Layer.OSM();

            var gmap = new OpenLayers.Layer.Google("Google", { sphericalMercator: true });

            markers = new OpenLayers.Layer.Markers("points");

            map.addLayers([osm, gmap]);

            map.addLayer(markers);

            directionsService = new google.maps.DirectionsService();

            map.addControl(new OpenLayers.Control.LayerSwitcher());
            map.addControl(new OpenLayers.Control.MousePosition());

            map.setCenter(new OpenLayers.LonLat(18.6342379, 54.3467815).transform(
                        geographic, mercator), 12);


            //dodanie obslugi klikniecia

            var click = new OpenLayers.Control.Click();
            map.addControl(click);
            click.activate();

            //==========================koniec swiata======================================//

            //======pobieranie danych z bazy MySQL==========//
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "data.php";
            var asynchronous = true;
            ajax.open(method, url, asynchronous);
            ajax.send();

            var lon = new Array();
            var lat = new Array();

            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                    var data = JSON.parse(this.responseText)
                    var html = "";

                    for (var a = 0; a < data.length; a++) {
                        var id = data[a].id;
                        var x = data[a].x;
                        var y = data[a].y;
                        var brand = data[a].siec;
                        var price = data[a].cena;
                        //===========pobrane dane====================//

                        //punkty
                        var feature = new OpenLayers.Feature(
                            markers,
                            new OpenLayers.LonLat(x, y).transform(
                            geographic, mercator));

                        feature.closeBox = true;
                        feature.popupClass = OpenLayers.Popup.FramedCloud;
                        feature.data.popupContentHTML =
                            //===========formularz edycji danych====================//
                            '<form action="edytuj.php" method="post">' +
                            '<table><tr><td>Siec</td><td>' +
                            '<input type="text" id="siec" name="siec" value="' + brand + '"/>\n' +
                            '<br /></td><tr><td>Longitude</td><td>' +
                            '<input type="text" id="x" name="x" value="' + x + '"/>\n' +
                            '<br /></td><tr><td>Latitude</td><td>' +
                            '<input type="text" id="y" name="y" value="' + y + '"/>\n' +
                            '<br /></td><tr><td>Cena paliwa Pb95</td><td>' +
                            '<input type="text" id="cena" name="cena" value="' + price + '"/>\n' +
                            '<br /></td></tr></table>' +
                            '<input type="hidden" id="id" name="id" value="' + id + '">' +
                            '<input type="submit" id="edytuj" value="Edytuj" />\n' +
                            '</form>'+
                            '<form method="post" action="usun.php">'+
                            '<input type="hidden" id="id" name="id" value="' + id + '">'+
                            '<input type="submit" id="usun" value="Usun" />'+
                            '</form>';

                        feature.data.overflow = "auto";

                        var marker = feature.createMarker();

                        //popup
                        var markerClick = function (evt) {
                            if (this.popup == null) {
                                this.popup = this.createPopup(this.closeBox);
                                map.addPopup(this.popup);
                                this.popup.show();
                            } else {
                                this.popup.toggle();
                            }
                            currentPopup = this.popup;
                            OpenLayers.Event.stop(evt);
                        };

                        marker.events.register("mousedown", feature, markerClick);

                        markers.addMarker(marker);
                        }
                }
            }
      }
          //====================dodawanie punktow na mapie=====================//
            function addMarker(lonlat, lonlat_data) {
            var feature = new OpenLayers.Feature(markers, lonlat);
            feature.closeBox = true;
            feature.popupClass = OpenLayers.Popup.FramedCloud;
            feature.data.popupContentHTML =

                            '\t<form action="dodaj.php" method="post">\n' +
                            '<table><tr><td>Siec</td><td>' +
                            '<input type="text" id="siec" name="siec" value="n/d"/>\n' +
                            '<br /></td><tr><td>Longitude</td><td>' +
                            '<input type="text" id="x" name="x" value="' + lonlat_data.lon + '"/>\n' +
                            '<br /></td><tr><td>Latitude</td><td>' +
                            '<input type="text" id="y" name="y" value="' + lonlat_data.lat + '"/>\n' +
                            '<br /></td><tr><td>Cena paliwa Pb95</td><td>' +
                            '<input type="text" id="cena" name="cena" value="0"/>' +
                            '<br /></td></tr></table>' +
                            '\t\t<input type="submit" id="dodaj" value="Dodaj" />\n' +
                            '\t</form>';

            feature.data.overflow = "auto";

            var marker = feature.createMarker();

                //====================popup z edycja danych=====================//
            var markerClick = function (evt) {
                if (this.popup == null) {
                    this.popup = this.createPopup(this.closeBox);
                    map.addPopup(this.popup);
                    this.popup.show();
                } else {
                    this.popup.toggle();
                }
                currentPopup = this.popup;
                OpenLayers.Event.stop(evt);
            };
            marker.events.register("mousedown", feature, markerClick);
            
            markers.addMarker(marker);
        }

        //====================Obsluga klikniecia=====================//
        OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {
            defaultHandlerOptions: {
                'single': true,
                'double': false,
                'pixelTolerance': 0,
                'stopSingle': false,
                'stopDouble': false
            },
            initialize: function (options) {
                this.handlerOptions = OpenLayers.Util.extend(
                {}, this.defaultHandlerOptions
                );
                OpenLayers.Control.prototype.initialize.apply(
                this, arguments
                );
                this.handler = new OpenLayers.Handler.Click(
                this, {
                    'click': this.trigger
                }, this.handlerOptions
                );
            },
            trigger: function (e) {
                var lonlat = map.getLonLatFromViewPortPx(e.xy);
                var lonlat_data = map.getLonLatFromViewPortPx(e.xy).transform(mercator, geographic);;
                lonlat.transform(mercator, geographic);
                numClicks++;

                addMarker(new OpenLayers.LonLat(lonlat.lon, lonlat.lat).transform(geographic, mercator), new OpenLayers.LonLat(lonlat_data.lon, lonlat_data.lat));
            }
        });
    </script>

</head>
<body onload="init()">
    <div id="map"></div>
</body>
</html>
