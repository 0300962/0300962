<?php
/**
 * Created by PhpStorm.
 * User: 0300962
 * Date: 15-Mar-18
 * Time: 1:35 PM
 */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href = "CSS/front-page.css" type="text/css">
</head>
<body>

    <script>
        //Changes the banner image in response to navbar tab interaction
        function changer(img) {
            if (img === 'about') {
                document.getElementById("banner").src = "img/about_banner.jpg";
                document.getElementById("banner").alt = "Stock photo of someone working";
            } else if (img === 'projects'){
                document.getElementById("banner").src = "img/projects_banner.jpg";
                document.getElementById("banner").alt = "Stock photo of someone writing on a whiteboard";
            } else {
                document.getElementById("banner").src = "img/profile_banner.jpg";
                document.getElementById("banner").alt = "Stock photo of two people taking a photo together";
            }
        }
    </script>

    <div class="imgcontainer">
        <div id="images">
            <img id="banner" src="img/about_banner.jpg" alt="Banner image">
        </div>
    </div>

    <div class="container">
        <div id="columns">
        <h3>Welcome!</h3>
            <p>Labour For Change is a non-policital platform to match good causes in need of specific skills, with people
                wanting to use their skills to help others.  Registered Causes can create new projects, specifying their
                requirements along with deadlines, background information, and so on.  Registered Helpers can view details
                of the current requirements, accept a project, and communicate with the project creator (a registered
                Cause) to discuss how best they can assist.</p>
            <p>Charities benefit by accessing a diverse talent pool to tackle projects such as website design, photography,
                logo/campaign development, event planning, and so on.  The helpers benefit by getting a good repository of
                meaningful projects they can undertake to improve their skills, portfolios and academic projects all while
                helping others.  It is believed that people will be more inclined to volunteer their time for charities if
                they are able to do so on their own terms.
            </p>
        <h3>Testimonials</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                eu fugiat nulla pariatur.</p>
        </div>
        <div id="social">
            <iframe frameborder="0" scrolling="no" height="274" width="345" allowtransparency="true" marginwidth="0" marginheight="0" src="https://ssltools.forexprostools.com/technical_summary.php?pairs=2,6,11,8833,8849,27&curr-name-color=%230059B0&fields=1h,1d&force_lang=51"></iframe><br /><div style="width:345px;"><span style="float:left"><span style="font-size: 11px;color: #333333;text-decoration: none;">This Technical Analysis is powered by <a href="https://uk.investing.com/" rel="nofollow" target="_blank" style="font-size: 11px;color: #06529D; font-weight: bold;" class="underline_link">Investing.com UK</a></span></span></div>
        </div>
    </div>
</body>
</html>