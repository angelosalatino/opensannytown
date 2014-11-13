<?php
   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function make_query( $query )
{
    $context = stream_context_create(['http' => [
        'method'  => 'POST',
        'header' => ['Content-Type: application/x-www-form-urlencoded'],
        'content' => 'data=' . urlencode($query),
    ]]);
        
    # please do not stress this service, this example is for demonstration purposes only.
    $endpoint = 'http://overpass-api.de/api/interpreter';
    libxml_set_streams_context($context);
    $start = microtime(true);
        
    $result = simplexml_load_file($endpoint);
    //printf("Query returned %2\$d node(s) and took %1\$.5f seconds.\n\n", microtime(true) - $start, count($result->node));
    
    return $result;
}

function create_osm_objects( $objects, $marker_color ,$marker_symbol )
{
    # Build GeoJSON feature collection array
    $geojson = array();
 
    # Loop through rows to build feature arrays
    foreach ($objects as $object) {
        $name = $object->xpath('tag[@k = "name"]');// + ['(unnamed)'];
        $coordinates = "[".$object['lon'].",".$object['lat']."]";
        $name = (string)$name[0]['v'];
        $feature = array(
            'type' => 'Feature', 
            'geometry' => array(
                'type' => 'Point',
                # Pass Longitude and Latitude Columns here
                'coordinates' => array((string)$object['lon'],(string)$object['lat'])
            ),
            # Pass other attribute columns here
            'properties' => array(
                'title' => $name,
                'description' => $object['Description'],
                'marker-color' => $marker_color,
                'marker-size' => "large",
                'marker-symbol' => $marker_symbol,
                )
            );
        # Add feature arrays to feature collection array
        array_push($geojson, $feature);
    }
    return $geojson;
}

function get_cafe( $geo_area )
{
    
    /**
     * OSM Overpass API with PHP SimpleXML / XPath
     *
     * PHP Version: 5.4 - Can be back-ported to 5.3 by using 5.3 Array-Syntax (not PHP 5.4's square brackets)
     */
         
    //
    // 1.) Query an OSM Overpass API Endpoint
    //    
    $query = 'node
      ["amenity"="cafe"]
      ('.$geo_area->latitude_south.','.$geo_area->longitude_west.','.$geo_area->latitude_north.','.$geo_area->longitude_east.');
    out;';
//    print($query);
//    echo "\n";
    $result = make_query($query);
//    print_r($result); 
//    echo "\n";
    //
    // 2.) Work with the XML Result
    //
        
    # get all school nodes with xpath
    $xpath = '//node[tag[@k = "amenity" and @v = "cafe"]]';
    $cafes = $result->xpath($xpath);
    
    $geoJson =  create_osm_objects($cafes,"#fc4353","cafe");
    
    return $geoJson;
//    printf("%d School(s) found:\n", count($cafes));
//    foreach ($cafes as $index => $cafe)
//    {
//        # Get the name of the school (if any), again with xpath
//        list($name) = $cafe->xpath('tag[@k = "name"]/@v') + ['(unnamed)'];
//        printf("#%02d: ID:%' -10s  [%s,%s]  %s\n", $index, $cafe['id'], $cafe['lat'], $cafe['lon'], $name);
//    }
}

function get_busstop( $geo_area )
{
   
    $query = 'node
      ["highway"="bus_stop"]
      ('.$geo_area->latitude_south.','.$geo_area->longitude_west.','.$geo_area->latitude_north.','.$geo_area->longitude_east.');
    out;';

    $result = make_query($query);


    # get all school nodes with xpath
    $xpath = '//node[tag[@k = "highway" and @v = "bus_stop"]]';
    $busstops = $result->xpath($xpath);
    
    $geoJson =  create_osm_objects($busstops,"#fa0","bus");
    
    return $geoJson;
}

function get_restaurants( $geo_area )
{
   
    $query = 'node
      ["amenity"="restaurant"]
      ('.$geo_area->latitude_south.','.$geo_area->longitude_west.','.$geo_area->latitude_north.','.$geo_area->longitude_east.');
    out;';
    $result = make_query($query);


    # get all school nodes with xpath
    $xpath = '//node[tag[@k = "amenity" and @v = "restaurant"]]';
    $restaurants = $result->xpath($xpath);
    
    $geoJson =  create_osm_objects($restaurants,"#0A910A","restaurant");
    
    return $geoJson;
}

function get_supermarkets( $geo_area )
{
   
    $query = 'node
      ["shop"="supermarket"]
      ('.$geo_area->latitude_south.','.$geo_area->longitude_west.','.$geo_area->latitude_north.','.$geo_area->longitude_east.');
    out;';
    $result = make_query($query);


    # get all school nodes with xpath
    $xpath = '//node[tag[@k = "shop" and @v = "supermarket"]]';
    $supermarkets = $result->xpath($xpath);
    
    $geoJson =  create_osm_objects($supermarkets,"#EBEB34","grocery");
    
    return $geoJson;
}

function parse_request( $request, $geo_area )
{
    switch ($request) {
        case "restaurants":
          $geoJson = get_restaurants( $geo_area );
          break;
        case "bars":
          $geoJson = get_cafe( $geo_area );
          break;
        case "bus_stop":
          $geoJson = get_busstop( $geo_area );
          break;
        case "supermarkets":
          $geoJson = get_supermarkets( $geo_area );
          break;
        default:
          $geoJson = get_cafe( $geo_area );
      }
      
      return $geoJson;
}

/**********************************************************************************
 * 
 * TEST CODE
 * 
 */


function print_sth()
{
    echo "IT SHOULD WORK";
}

?>


