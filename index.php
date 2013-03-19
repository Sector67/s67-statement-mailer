<?php


$PAGE_ENRICHMENT = '
<script src="http://malsup.github.com/jquery.form.js"></script>';

$PAGE_TITLE = 'Sector Invoice Mailer Wizard';


require_once('header.php');

?>

<link rel="stylesheet" type="text/css" href="css/style.css">

<style type="text/css">
  
</style>

<div id="wrapper">
  <div class="loading-indicator hidden">
    <img class="loading-gif" src="img/loading.gif">
  </div>
  <form enctype="multipart/form-data" action="upload_handler.php" class="clear" id="csvform">
    <label>Csv File: </label><input type="file" name="csvfile" id="file" value=""><br />
  </form><button id="submit">Submit</button>
</div>