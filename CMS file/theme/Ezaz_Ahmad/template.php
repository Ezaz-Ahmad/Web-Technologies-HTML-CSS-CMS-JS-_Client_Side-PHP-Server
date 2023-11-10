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
        <li><a href="<?php get_site_url(); ?>games">Games</a></li>
        <li><a href="<?php get_site_url(); ?>registration-page">Registration</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" >Games List</a>
            <div class="dropdown-content">
            <a href="<?php get_site_url(); ?>games">template</a>
            <a href="<?php get_site_url(); ?>games">Action Games</a>
            <a href="<?php get_site_url(); ?>games">Raceing Games</a>
            </div>
        </li>
    </ul>
</div>

    
    <div class="main-content">
        <h1><?php get_page_title(); ?></h1>
        <?php get_page_content(); ?>
    </div>
    
    <footer>
<p>© 2023 by Ezaz Ahmad. Email:c3412618@uon.edu.au</p>
<a href="http://www.newcastle.edu.au">Visit University of Newcastle</a>
</footer>

<script>
   // Setting a cookie
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



       