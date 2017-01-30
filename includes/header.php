<?php

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

include "uriFormater.php";

?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FCP</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo $project; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?php echo $project; ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo $project; ?>dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="<?php echo $project; ?>vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php echo $project; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="<?php echo $project; ?>css/jquery.datetimepicker.min.css">

  <style type="text/css">
    input#submit{
      color: #333;
      background:none;
      border:none;
      margin: 0;
      padding: 0;

      /*font-size:1em;*/
      /*padding-left: 20px;
      padding-right: 100px;*/
    }

    td{
      word-break:break-all;
      width: 100px !important;
      font-size: 14;
    }
    th{
      width: 100px !important;
      font-size: 14;
    }
    /*input#submit:hover{
      background-color: #f5f5f5;
    }*/
  </style>

</head>
