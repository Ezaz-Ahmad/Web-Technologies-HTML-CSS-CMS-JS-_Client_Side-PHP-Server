<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php get_page_clean_title(); ?> &lt; <?php get_site_name(); ?></title>
    <link href="<?php get_theme_url(); ?>/style.css" rel="stylesheet">
    <?php get_header(); ?>
</head>
<body class="<?php get_page_slug(); ?>">
<div class="navbar">
    <ul>
        <li><a href="<?php get_site_url(); ?>">Home</a></li>
        <li><a href="<?php get_site_url(); ?>about-us">About us</a></li>
        <li><a href="<?php get_site_url(); ?>policy">Privacy Policy</a></li>
        <li><a href="<?php get_site_url(); ?>terms">Terms & Conditions</a></li>
        <li><a href="<?php get_site_url(); ?>contact-us">Contact us</a></li>
        <li><a href="<?php get_site_url(); ?>registration-page">Registration</a></li>
        
         <!-- working with drop down menue with 2 catagory-->
        <li class="dropdown">
            <a href="#" >Game List</a>
            <div class="dropdown-content">
                <a href="template.xml" style="color: black;">template</a>
                <a href="Data File 1.xml" style="color: black;">Action Games</a>
                <a href="Data File 2.xml" style="color: black;">Raceing Games</a>
            
            </div>
        </li>
    </ul>
</div>

<?php
if(!defined('IN_GS')) { 
    die('you cannot load this page directly.'); 
}

function loadGamesFromXML($path) {
    $xml = simplexml_load_file($path);
    return $xml;
}

function displayGameInfo($xml) {
    echo "<h2>Category: " . $xml->category . "</h2>";
    
    foreach ($xml->game as $game) {
        echo "<h3>" . $game->name . "</h3>";
        echo "<p><strong>Description:</strong> " . $game->description . "</p>";
        echo "<p><strong>Subject:</strong> " . $game->subject . "</p>";
        echo "<p><strong>Grade Level:</strong> " . $game->gradeLevel . "</p>";
        
        echo "<p><strong>Search Tags:</strong> ";
        foreach ($game->searchTag as $tag) {
            echo $tag . ", ";
        }
        echo "</p>";

        if (isset($game->cost)) {
            echo "<p><strong>Cost:</strong> " . $game->cost . "</p>";
        }

        echo "<p><strong>Equipment:</strong> </p>";
        echo "<div class='equipmentSection'>";
       

       
        echo "</div>";  

        echo "<p><strong>Reviews:</strong></p>";
        foreach ($game->review as $review) {
            echo "<p>Score: " . $review['score'] . " - " . $review . "</p>";
        }

        echo "<p><strong>Images:</strong></p>";
        foreach ($game->imageFilename as $image) {
            echo "<img src='" . $image . "' alt='" . $game->name . "'><br>";
        }

        echo "<p><a href='" . $game->url . "'>Visit Game's Website</a></p><hr>";
    }
}

$xmlpath = GSDATAPAGESPATH . "/Games/" . $_GET["category"] . ".xml";
$xmlData = loadGamesFromXML($xmlpath);
displayGameInfo($xmlData);
?>


<footer>
<p>© 2023 by Ezaz Ahmad. Email:c3412618@uon.edu.au</p>
<a href="http://www.newcastle.edu.au">Visit University of Newcastle</a>
</footer>

<script>
   // Setting  cookie
   function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Getting a cookie value
    function getCookie(name) {
        const value = "; " + document.cookie;
        const parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
        return null;
    }

    // Recording the current page visit
    function recordVisit(categoryName) {
        const now = new Date();
        const dateTimeString = now.toLocaleString();
        setCookie("lastVisitedCategory", `${categoryName}@@${dateTimeString}`, 7);
    }

    // Displaying the last visited category
    function displayLastVisit() {
        const cookieValue = getCookie("lastVisitedCategory");
        if (cookieValue) {
            const [category, dateTime] = cookieValue.split("@@");
            const message = `Last visited category: ${category} on ${dateTime}`;
            alert(message); 
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        
        displayLastVisit();

        var pageTitle = document.title;
        recordVisit(pageTitle);
    });

</script>

</body>
</html>
