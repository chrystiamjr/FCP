<?php
  $project = explode('/', $_SERVER['REQUEST_URI'])[1] . '/'; // GET PROJECT NAME Place after .'/'.
  $project = '/'.$project;
  if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $projectDir = "C:/xampp/htdocs".$project; // GET PROJECT NAME Place after .'/'.
  } else {
    $projectDir = $project;
  }

function formatarURL($url, $projectName){
  $server = ( ( ( count(explode('/', $url)) ) > 1 ) ? explode('/', $url) : explode('\\',$url) );
  if($server[4] == $projectName){
    $serverFinal = substr($url,0,29);
    return $serverFinal.$projectName.'/uploads/';

  } elseif($server[3] == $projectName) {
    $serverFinal = substr($url,0,16);
    return $serverFinal.$projectName.'\uploads\\';

  }
}

function formatarImagem($img) {

  $url = explode('/', $img);
  $server = $url[1].'/'.$url[3];

  if(substr($img,0,15) == "C:/xampp/htdocs"){
    return substr($img,15);
  } elseif ($server == "home/public_html"){
    return '/'.$url[4].'/'.$url[5].'/'.$url[6];
  }
  // return ((substr($img,0,15) == "C:/xampp/htdocs") ? substr($img,15) : $img);
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
  $project = explode('/', $_SERVER['REQUEST_URI'])[1];

  if($imgText != "" && !empty($file['name']))
  {
    $imgDir = formatarURL(getcwd(),$project);
    $uploadFile = $imgDir . basename($imgText.'.png');
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