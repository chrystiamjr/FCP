<?php
  $project = explode('/', $_SERVER['REQUEST_URI'])[1] . '/'; // GET PROJECT NAME Place after .'/'.
  $project = '/'.$project;
  $projectDir = "C:/xampp/htdocs".$project; // GET PROJECT NAME Place after .'/'.

//   // Define variáveis globais para HOST
// if ($_SERVER['HTTP_HOST'] == 'localhost') {
//   $project = explode('/', $_SERVER['REQUEST_URI'])[1] . '/';
//   define('projectName', $project);
//   define('publicDir', '/'.$project.'public/');
//   $project = "C:/xampp/htdocs/".$project; // GET PROJECT NAME Place after .'/'.
//   define('HOST', $project);
// } else {
//   $project = $_SERVER['HTTP_HOST'] . '/';
//   define('projectName', $project);
//   define('publicDir', $project.'public/');
//   define('HOST', $project);
// }


function formatarImagem($img) {
  return ((substr($img,0,15) == "C:/xampp/htdocs") ? substr($img,15) : $img);
}

function formatarImgExt($txt){
	$text = explode("/",$txt);
	return $text[count($text)-1]; // retorna o ultimo elemento do array
}

function formatarImgText($txt){
	$text = explode("/",$txt);
	$text = $text[count($text)-1]; // retorna o ultimo elemento do array
  $text = explode(".",$text);
  return $text[0];
}

function uploadImg($imgText, $file){
  $project = explode('/', $_SERVER['REQUEST_URI'])[1] . '/'; // GET PROJECT NAME Place after .'/'.
  $project = '/'.$project;
  $projectDir = "C:/xampp/htdocs".$project; // GET PROJECT NAME Place after .'/'.

  // Validação de campos e envio de imagem!
  // $uploadFile = null;
  if($imgText != "" && !empty($file['name']))
  {
    $imgDir = $projectDir.'uploads/';
    $uploadFile = $imgDir . basename($imgText.'.png');
    // die($file['tmp_name']);
    if (!move_uploaded_file($file['tmp_name'], $uploadFile))
    {
      die("Arquivo não enviado!\nConsulte o técnico");
    } else 
    {
      return $uploadFile;
    }
  } else {
    
  }
}

function verificaValor($val){
  $varFloat = floatval($val);
  if (strlen($val) === strlen($varFloat))
  {
    return 'R$ '.number_format($varFloat, 2, '.', ',');
  } else
  {
    return $val;
  }
}

function formatarDescricao($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}