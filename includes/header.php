<?php

header('Content-Type: text/html; charset=utf8');

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

include "uriFormater.php";

?>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FCP</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?= $project; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- MetisMenu CSS -->
  <link href="<?= $project; ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link href="<?= $project; ?>dist/css/sb-admin-2.css" rel="stylesheet" type="text/css">
  <!-- Morris Charts CSS -->
  <link href="<?= $project; ?>vendor/morrisjs/morris.css" rel="stylesheet" type="text/css">
  <!-- Custom Fonts -->
  <link href="<?= $project; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap FileInput -->
  <link href="<?= $project; ?>vendor/bootstrap-fileinput/css/fileinput.min.css"  media="all" rel="stylesheet" type="text/css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" />

  <link media="all" rel="stylesheet" type="text/css" href="<?= $project; ?>dist/css/style.css">

</head>