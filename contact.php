<?php
include("menubar.php");


?>


<html>

<head>
    <title>E wed</title>
    <link rel="stylesheet" href="footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body style="background-color:#def9fb">

    <section id="content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-logo">
                        <br><br>
                        <h3>E Wed Matrimony</h3><br>
                        <p style="text-align: justify">Trusted by the different communities all over the world, E Wed Matrimony continues to be the most reliable and reputable online E Wed matrimonial platform.Chavara Matrimony is established under the prestigious E Wed Family Welfare Centre, which is a proud division of the E Wed Cultural Centre located in Kochi. As one of the leading Kerala matrimony websites, we strongly strive to find your perfect soul mate - who can bring out the best in each other. Inspired by human values and principles, we help families get highly compatible and supportive in-laws. Entering into our 25th year of expertise in the online matchmaking space and with 2 lakh+ remarkable testimonies, E Wed Matrimony is the best match finder for your life!</p>
                        <p>Our firm commitment towards building and maintaining strong customer relationship has resulted in our position as Kerala’s largest offline and online matrimonial service provider. We are always alive to the consumer needs and forever focused on paying heed to the customer responses to delight them with greater user experience and enhanced engagement. Our team of professionals are given extensive training and unparalleled support from the management to value add to each of our customers. Customer satisfaction is sacrosanct and sacrament for us.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">


                    <!-- Form itself -->
                    <form name="sentMessage" id="contactForm" action="feedback.php" method="post">
                        <br>
                        <h3>Contact me</h3>
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname"  required/>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required  />
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <textarea rows="10" cols="100" class="form-control" placeholder="Message" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <div id="success"> </div> <!-- For success/fail messages -->
                        <input type="submit" class="btn btn-primary pull-right" value="Send" style="margin-left: 40%;" /><br><br>
                    </form>
                </div>
                <div class="col-md-6">
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <div style="overflow:hidden;height:500px;width:600px;">
                        <div id="gmap_canvas" style="height:500px;width:600px;"></div>
                        <style>
                            #gmap_canvas img {
                                max-width: none !important;
                                background: none !important
                            }
                        </style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a>
                    </div>
                    <script type="text/javascript">
                        function init_map() {
                            var myOptions = {
                                zoom: 14,
                                center: new google.maps.LatLng(40.805478, -73.96522499999998),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(40.805478, -73.96522499999998)
                            });
                            infowindow = new google.maps.InfoWindow({
                                content: "<b>The Breslin</b><br/>2880 Broadway<br/> New York"
                            });
                            google.maps.event.addListener(marker, "click", function() {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);
                    </script>
                </div>
            </div>
        </div>

    </section>

    <img src="s_images/index_main2.png" style="width:100%;" />

    <div class="menu2">
        <ul>
            <li><a href="index.php">HELP
                    <ol>
                        <li>FAQ
                        <li>
                    </ol>
                    <ol>
                        <li>Contact Us
                        <li>
                    </ol>
                    <ol>
                        <li>Report Misuse
                        <li>
                    </ol>
                    <ol>
                        <li>Feedback
                        <li>
                    </ol>
                    <ol>
                        <li>Sitemap
                        <li>
                    </ol>
                    <ol>
                        <li>Careers
                        <li>
                    </ol>
                </a></li>

            <li><a href="index.php">MATRIMONY SERVICE
                    <ol>
                        <li>Free Membership Service
                        <li>
                    </ol>
                    <ol>
                        <li>Paid Membership Service
                        <li>
                    </ol>
                    <ol>
                        <li>Digital Magazine
                        <li>
                    </ol>
                    <ol>
                        <li>Wedding Photos
                        <li>
                    </ol>
                    <ol>
                        <li>Celestial Matrimony
                        <li>
                    </ol>
                    <ol>
                        <li>Advertise With Us
                        <li>
                    </ol>
                </a></li>

            <li><a href="SERVICE">OTHER SERVICE
                    <ol>
                        <li>Matrimony Blog
                        <li>
                    </ol>
                    <ol>
                        <li>Android App
                        <li>
                    </ol>
                    <ol>
                        <li>Specific Matrimony App
                        <li>
                    </ol>
                    <ol>
                        <li>E-Brocher
                        <li>
                    </ol>
                    <ol>
                        <li>Testimony
                        <li>
                    </ol>
                    <ol>
                        <li>Photo Gallary
                        <li>
                    </ol>
                </a></li>

            <li><a href="contact.php">CONTACT US
                    <ol>
                        <li>Team Welfare center
                        <li>
                    </ol>
                    <ol>
                        <li>2nd Floor,Cultural Center
                        <li>
                    </ol>
                    <ol>
                        <li>Near somewhere
                        <li>
                    </ol>
                    <ol>
                        <li>Unknow Cross Road</li>
                    </ol>
                    <ol>
                        <li>Cochin - 123123
                        <li>
                    </ol>
                    <ol>
                        <li>Kerala, India
                        <li>
                    </ol>
                </a></li>

            <li><a href="about.php">ABOUT US
                    <ol>
                        <li>About us
                        <li>
                    </ol>
                    <ol>
                        <li>Press Release
                        <li>
                    </ol>
                    <ol>
                        <li>Team Details
                        <li>
                    </ol>
                    <ol>
                        <li>Terms of Use
                        <li>
                    </ol>
                    <ol>
                        <li>Privacy Policy
                        <li>
                    </ol>
                    <ol>
                        <li>Director's Message</li>
                    </ol>
                </a></li>


        </ul>
    </div>

</body>

</html>