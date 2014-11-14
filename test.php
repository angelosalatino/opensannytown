<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include("./phpfiles/initFunctions.php");
include("./phpfiles/functions.php");
include("./phpfiles/feature_osm.php");
$geographical_area = get_area_location();


   $amenities = array( 
		   "cafe" => new amenity('//node[tag[@k = "amenity" and @v = "cafe"]]',"#fc4353","cafe"), 
		   "restaurants" => new amenity('//node[tag[@k = "amenity" and @v = "restaurant"]]',"#0A910A","restaurant"), 
		   "bus_stop" => new amenity('//node[tag[@k = "highway" and @v = "bus_stop"]]',"#fa0","bus")
		  );
   
   print_r($amenities);
$geoJson = get_busStop( $geographical_area );
echo json_encode($geoJson,JSON_NUMERIC_CHECK);
?>