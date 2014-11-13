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
    $xml = simplexml_load_file("./properties/XMLProperties.xml");
        
    $result = $xml->xpath("/data/geographical_place");
    
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
    $xml = simplexml_load_file("./properties/XMLProperties.xml");
        
    $result = $xml->xpath("/data/geographical_area");
    
    return $result[0];
}