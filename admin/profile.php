<?php
$title = "My Profile";
include('tmp/header.html');
echo "<center>";
include('navbar.php');
include('database/helpdesk_queries.php');
$profile = new basequery();
$profile->getprofile();
include('tmp/footer_main.html');
?>