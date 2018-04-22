<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 22-Apr-18
 * Time: 11:51 AM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/about-page.css" type="text/css">
</head>
<body>
    <div class="container">
        <div id="img1">
            <img src="img/contact.jpg" alt="Overhead photo of hands on a typewriter"/>
        </div>
        <div id="txt1">
            <h3>Contact</h3>
            <p>This site was developed as an academic project by Brendan Campbell, studying CMM-007 Intranet Systems Development
                as part of an MSc in IT and Network Management at teh Robert Gordon University.  If you have any comments
                or questions or want to report something you've seen on this site, please get in touch using the links at the bottom of any page.</p>
            <p>Development would not have been possible without excessive amounts of coffee from my kitchen, which you can explore here below:</p>
        </div>

    </div>
    <div class="container">

        <div id="vrview">
            <!-- Loads the VRView api and creates an iframe to hold the content -->
            <script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
            <!-- Once the api is loaded, creates the view window and loads the image from Imgur. -->
            <script>
                window.addEventListener('load', onVrViewLoad);
                var vrView;
                function onVrViewLoad() {
                    vrView = new VRView.Player('#vrview', {
                        height: '400px',
                        width: '1000px',
                        image: 'https://i.imgur.com/Jl0ycz5.jpg',
                        is_stereo: false
                    });
                }
            </script>
        </div>
    </div>
</body>
</html>