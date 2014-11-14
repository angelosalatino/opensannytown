<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class amenity
{
    public $xpath;
    public $marker_color;
    public $marker_symbol;
    
    function __construct( $xpath_t,$marker_color_t,$marker_symbol_t)
    {
        $this->xpath=$xpath_t;
        $this->marker_color=$marker_color_t;
        $this->marker_symbol=$marker_symbol_t;
    }
}

$amenities = array( 
		   "cafe" => new amenity('//node[tag[@k = "amenity" and @v = "cafe"]]',"#fc4353","cafe"), 
		   "restaurants" => new amenity('//node[tag[@k = "amenity" and @v = "restaurant"]]',"#0A910A","restaurant"), 
		   "bus_stop" => new amenity('//node[tag[@k = "highway" and @v = "bus_stop"]]',"#fa0","bus")
		  );



//function create_osm_objects()
//{
//    # Build GeoJSON feature collection array
//    $geojson = array(
//       'type'      => 'FeatureCollection',
//       'features'  => array()
//    );
// 
//    # Loop through rows to build feature arrays
//    while($row = mysql_fetch_assoc($dbquery)) {
//        $feature = array(
//            'id' => $row['partnership_id'],
//            'type' => 'Feature', 
//            'geometry' => array(
//                'type' => 'Point',
//                # Pass Longitude and Latitude Columns here
//                'coordinates' => array($row['longitude'], $row['latitude'])
//            ),
//            # Pass other attribute columns here
//            'properties' => array(
//                'name' => $row['Name'],
//                'description' => $row['Description'],
//                'sector' => $row['Sector'],
//                'country' => $row['Country'],
//                'status' => $row['Status'],
//                'start_date' => $row['Start Date'],
//                'end_date' => $row['End Date'],
//                'total_invest' => $row['Total Lifetime Investment'],
//                'usg_invest' => $row['USG Investment'],
//                'non_usg_invest' => $row['Non-USG Investment']
//                )
//            );
//        # Add feature arrays to feature collection array
//        array_push($geojson['features'], $feature);
//    }
//}