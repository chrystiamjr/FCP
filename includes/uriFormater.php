<?php
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
  $project = explode('/', $_SERVER['REQUEST_URI'])[1] . '/'; // GET PROJECT NAME Place after .'/'.
  $project = '/'.$project;
} else {
  $project = $_SERVER['HTTP_HOST'] . '/';
}