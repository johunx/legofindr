<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    



    <link href="./stil2.css" media="screen" rel="stylesheet">
    <script src="javascript.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://use.typekit.net/dtt1muj.css">

    <title>Legofindr</title>
</head>

<body>


<?php

$currentpage = explode("/",$_SERVER['PHP_SELF'])[5];
    if($currentpage == 'startsida.php')
    echo '<div id="menu">
    <ul>
        <li><a class="active" href="startsida.php"><i class="fa fa-home" aria-hidden="true"></i><p class="pmeny"> Home</p></a></li>   
        <li><a href="omOss.php"><i class="fa fa-user" aria-hidden="true"></i><p class="pmeny"> About us</p></a></li>
        <li><a href="hjalp.php"><i class="fa fa-question" aria-hidden="true"></i><p class="pmeny"> Help</p></a></li>
    </ul>
    </div>';
    else if($currentpage == 'omOss.php'){
        echo '<div id="menu">
        <ul>
            <li><a href="startsida.php"><i class="fa fa-home" aria-hidden="true"></i><p class="pmeny"> Home</p></a></li>   
            <li><a class="active" href="omOss.php"><i class="fa fa-user" aria-hidden="true"></i><p class="pmeny"> About us</p></a></li>
            <li><a href="hjalp.php"><i class="fa fa-question" aria-hidden="true"></i><p class="pmeny"> Help</p></a></li>
        </ul>
        </div>';
    }
    else if($currentpage == 'hjalp.php'){
        echo '<div id="menu">
        <ul>
            <li><a href="startsida.php"><i class="fa fa-home" aria-hidden="true"></i><p class="pmeny"> Home</p></a></li>   
            <li><a href="omOss.php"><i class="fa fa-user" aria-hidden="true"></i><p class="pmeny"> About us</p></a></li>
            <li><a class="active" href="hjalp.php"><i class="fa fa-question" aria-hidden="true"></i><p class="pmeny"> Help</p></a></li>
        </ul>
        </div>';
    }
    else {
        echo '<div id="menu">
        <ul>
            <li><a href="startsida.php"><i class="fa fa-home" aria-hidden="true"></i><p class="pmeny"> Home</p></a></li>   
            <li><a href="omOss.php"><i class="fa fa-user" aria-hidden="true"></i><p class="pmeny"> About us</p></a></li>
            <li><a href="hjalp.php"><i class="fa fa-question" aria-hidden="true"></i><p class="pmeny"> Help</p></a></li>
        </ul>
        </div>';
    }



    ?>