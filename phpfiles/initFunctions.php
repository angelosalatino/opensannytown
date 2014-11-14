<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
     
/*!
 * This function reads the location coordinates from XML file (at the starting version, file name was XMLProperties.xml)
 */
function get_location()
{
    $xml = simplexml_load_file("./properties/XMLGeographicalProperties.xml");
        
    $result = $xml->xpath("/geographical_data/geographical_place");
    
//    print($result[0]->name);
//    print($result[0]->latitude);
//    print($result[0]->longitude);
    
    return $result[0];
}

/*!
 * This function reads the geographical area
 */
function get_area_location()
{
    $xml = simplexml_load_file("./properties/XMLGeographicalProperties.xml");
        
    $result = $xml->xpath("/geographical_data/geographical_area");
    
    return $result[0];
}

function get_amenity_data()
{
    $amenities = array();
    
    $xml = simplexml_load_file("./properties/XMLElementData.xml");
        
    $objects = $xml->xpath("/elements/element");
    
    # Loop through rows to build feature arrays
    foreach ($objects as $object) {
        $am=$object->attributes();
        $amenity = new Amenity((string)$am['queryXpath'],(string)$am['marker_color'],(string)$am['marker_symbol']);

        # Add feature arrays to feature collection array
        $amenities = array_merge($amenities, array((string)$am['name'] => $amenity));
    }
    
    $_SESSION["data_properties"] = serialize($amenities);
    //print_r($amenities);
    
//        echo $amenities['bus_stop']->xpath;
//        echo $amenities['restaurants']->marker_color;
//        echo $amenities['cafe']->marker_symbol;
    
//    foreach ($amenities as $object) {
//        echo $object->xpath;
//        echo $object->marker_color;
//        echo $object->marker_symbol;
//    }
    
//    $json = json_encode($xml);
//    echo $json;
//$array = json_decode($json,TRUE);
//    print_r($array);
    //print_r($result);
}
