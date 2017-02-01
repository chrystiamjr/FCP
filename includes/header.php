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
  <link href="<?php echo $project; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- MetisMenu CSS -->
  <link href="<?php echo $project; ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  <link href="<?php echo $project; ?>dist/css/sb-admin-2.css" rel="stylesheet" type="text/css">

  <!-- Morris Charts CSS -->
  <link href="<?php echo $project; ?>vendor/morrisjs/morris.css" rel="stylesheet" type="text/css">

  <!-- Custom Fonts -->
  <link href="<?php echo $project; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" />

  <style type="text/css">

    html, body {
      max-width: 100%;
      overflow-x: hidden;
    }

    @media screen and (min-width: 200px) {
      div.navbar-default.sidebar{
        margin-top: 0 !important;
      }
      div.pull-right.breadcumberbach{
        margin: -40 0 0 0 !important;
      }
      #ShowHide{
        display: none;
      }
      select,
      textarea,
      input {
        font-size: 16px;
      }
      .midlle-content {
        margin-top: 40 !important
      }
      .botao-fechar,
      .botao-alterar,
      .botao-cadastro,
      .botao-remover{
        padding: 6 30;
      }
    }

    @media screen and (min-width: 768px) {
      #ShowHide{
        display: none;
      }
      div.pull-right.breadcumberbach{
        margin: -40 0 0 0 !important;
      }
      select,
      textarea,
      input {
        font-size: 16px;
      }
      .midlle-content {
        margin-top: 40 !important
      }
      .botao-fechar,
      .botao-alterar,
      .botao-cadastro,
      .botao-remover{
        padding: 6 30;
      }
    }

    @media screen and (min-width: 992px) {
      div.navbar-default.sidebar{
        margin-top: 110px !important;
      }
      div.pull-right.breadcumberbach{
        margin: 0 !important;
      }
      #ShowHide{
        display: block;
      }
      .midlle-content {
        margin-top: 0 !important
      }
      .botao-fechar,
      .botao-alterar,
      .botao-cadastro,
      .botao-remover{
        padding: 6 100;
      }
    }

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
	
