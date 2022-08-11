<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs MyOnlineMeal</title>
   <?php include('css.php'); ?>
   <link rel="stylesheet" href="./css/headercolors.css">

</head>
<body>
<?php include'partials/_nav.php'?>

<section class="contact" id="contact">

    <div class="title">
        <h2 class="titleText"><span>C</span>ontact Us</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
    </div>

    <div class="contactForm">
        <h3>Send Message</h3>

        <form action="#">

            <div class="inputBox">
                <input type="text" placeholder="Name">
            </div>
            
            <div class="inputBox">
                <input type="text" placeholder="Email">
            </div>
            
            <div class="inputBox">
                <textarea name="Message" placeholder="Message"></textarea>
            </div>
            
            <div class="inputBox">
                <input type="submit" class="btn-sm" value="Send">
            </div>
            
        </form>

    </div>
    <?php include 'search-modal.php'; ?>     

</section>

<script src="js/ajaxScripts.js"></script>
</body>
</html>
