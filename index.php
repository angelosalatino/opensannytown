<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OpenSannyTown</title>
        
        <!-- Code from MAPBOX -->
        <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.css' rel='stylesheet' />
        
        <!-- My code -->
        <link rel="stylesheet" href="./styles/CascadeStyleSheet_1.css" />     
        
    </head>
    <body>
        <div id="map">
            <script>

                function initmap() {
                    L.mapbox.accessToken = 'pk.eyJ1IjoiYW5nZWxvc2FsYXRpbm8iLCJhIjoiNWRuRUZiVSJ9.oGXR_Mp6PKxf9HcVeArsLw';
                    var map = L.mapbox.map('map', 'examples.map-i86nkdio')
                            .setView(new L.LatLng(41.0002535,16.799486),15);
                }

                
                initmap();
            </script>
        </div>
    </body>
</html>
