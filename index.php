<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    include("./phpfiles/initFunctions.php");
    include("./phpfiles/functions.php");
    include("./phpfiles/feature_osm.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>OpenSannyTown</title>
        
        <!-- Code from MAPBOX -->
        <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.4/mapbox.css' rel='stylesheet' />
        
        
        <!-- Code from TEMPLATE -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.dropotron.min.js"></script>
        <script src="js/jquery.scrollgress.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        
        
        <!-- My code -->
        <link rel="stylesheet" href="./styles/CascadeStyleSheet_1.css" />
        
    </head>
    <body class="landing">
        
        <!-- Header -->
        <header id="header" class="alt">
            <h1><a href="index.php">Open Sannitown</a> We are Data</h1>
            <nav id="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <a href="" class="icon fa-angle-down">Show</a>
                        <ul>
                            <li><a href="index.php?id_request=restaurants">Restaurant & Pizzeria</a></li>
                            <li><a href="index.php?id_request=cafes">Bar</a></li>
                            <li><a href="index.php?id_request=supermarkets">Supermarkets</a></li>
                            <li><a href="index.php?id_request=bus_stops">Bus Stop</a></li>
                            <li>
                                <a href="">Submenu</a>
                                <ul>
                                    <li><a href="#">Option One</a></li>
                                    <li><a href="#">Option Two</a></li>
                                    <li><a href="#">Option Three</a></li>
                                    <li><a href="#">Option Four</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--<li><a href="#" class="button">Sign Up</a></li>-->
                </ul>
            </nav>
        </header>
        
        <!-- Banner -->
        <section id="banner">
            <h2>Open Sannitown</h2>
            <p>We are Data.</p>
            <!--<ul class="actions">
                    <li><a href="#" class="button special">Sign Up</a></li>
                    <li><a href="#" class="button">Learn More</a></li>
            </ul>-->
        </section>
        
        <!-- Main -->
        <section id="main" class="container">
            
            <section class="box special map-container">
                <section id="map">
                    <script>
                        
                        <?php 
                        session_start();
                        $position = get_location(); 
                        $geographical_area = get_area_location();
                        if(!isset($_SESSION["data_properties"])){get_amenity_data();}
                        ?>
                            
                            function initmap() {
                                
                                <?php
                                if(isset($_GET['id_request']))
                                {
                                    echo "var geoJson = ". json_encode(parse_request($_GET['id_request'], $geographical_area));
                                }                             
                                else
                                {
                                   echo "var geoJson = ". json_encode(parse_request('default_request', $geographical_area));  
                                }                                
                                ?>;
                                
                                L.mapbox.accessToken = 'pk.eyJ1IjoiYW5nZWxvc2FsYXRpbm8iLCJhIjoiNWRuRUZiVSJ9.oGXR_Mp6PKxf9HcVeArsLw';
                                var map = L.mapbox.map('map', 'angelosalatino.k69477ai')
                                        .setView(new L.LatLng(<?php print($position->latitude); ?>,<?php print($position->longitude); ?>),16)
                                        .featureLayer.setGeoJSON(geoJson);
                                
                            }

                
                            initmap();
                    </script>
                </section>
                <!--<header class="major">
                        <h2>Introducing the ultimate mobile app
                        <br />
                        for doing stuff with your phone</h2>
                        <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc ornare<br />
                        adipiscing nunc adipiscing. Condimentum turpis massa.</p>
                </header>
                <span class="image featured"><img src="images/pic01.jpg" alt="" /></span>-->
            </section>
            <!--<section class="box special features">
                <div class="features-row">
                    <section>
                        <span class="icon major fa-bolt accent2"></span>
                        <h3>Magna etiam</h3>
                        <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                    </section>
                    <section>
                        <span class="icon major fa-area-chart accent3"></span>
                        <h3>Ipsum dolor</h3>
                        <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                    </section>
                </div>
                <div class="features-row">
                    <section>
                        <span class="icon major fa-cloud accent4"></span>
                        <h3>Sed feugiat</h3>
                        <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                    </section>
                    <section>
                        <span class="icon major fa-lock accent5"></span>
                        <h3>Enim phasellus</h3>
                        <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                    </section>
                </div>
            </section>-->
            
            <!--<div class="row">
                <div class="6u 12u(2)">
                    
                    <section class="box special">
                        <span class="image featured"><img src="images/pic02.jpg" alt="" /></span>
                        <h3>Sed lorem adipiscing</h3>
                        <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
                    </section>
                    
                </div>
                <div class="6u 12u(2)">
                    
                    <section class="box special">
                        <span class="image featured"><img src="images/pic03.jpg" alt="" /></span>
                        <h3>Accumsan integer</h3>
                        <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
                    </section>
                    
                </div>
            </div>-->
            
        </section>
        
        <!-- CTA -->
        <section id="cta">
            
            <!--<h2>Sign up for beta access</h2>
            <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc.</p>
            
            <form>
                <div class="row uniform 50%">
                    <div class="8u 12u(3)">
                        <input type="email" name="email" id="email" placeholder="Email Address" />
                    </div>
                    <div class="4u 12u(3)">
                        <input type="submit" value="Sign Up" class="fit" />
                    </div>
                </div>
            </form>-->
            
        </section>
        
        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
            </ul>
            <ul class="copyright">
                <li><a href="./destroySession.php">Destroy Session</a></li>
                <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>
        
    </body>
</html>
