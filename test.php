<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include("./phpfiles/initFunctions.php");
include("./phpfiles/functions.php");
$geographical_area = get_area_location();

$geoJson = get_restaurants( $geographical_area );
echo json_encode($geoJson,JSON_NUMERIC_CHECK);
?>