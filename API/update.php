<?php
session_start();

function my_autoloader($class) {
    $class = str_replace("\\", "/", $class);
    require_once "$class.php";
}
spl_autoload_register('my_autoloader');

use acwaves\Process;
use acwaves\Update;
use acwaves\Upload;

use acwaves\Question;
use acwaves\ResultWave;
use acwaves\ResultZone;
use acwaves\ResultFinal;
use acwaves\ResultException;
use acwaves\Title;
use acwaves\Wave;
use acwaves\WavePoints;
use acwaves\Zone;
use acwaves\ZonePoints;
use acwaves\Finals;
use acwaves\FinalPoints;

$setting_key = "ACWAVES";
$setting_user = "acwavesadm";
$setting_pass = "A123Wave";


$key = (isset($_GET['key']) ? $_GET['key'] : '' );
$p_key = (isset($_POST['key']) ? $_POST['key'] : '' );
$p_hp = (isset($_POST['hp']) ? $_POST['hp'] : 'not-empty' );

$key_auth = false;

if($key == $setting_key){
	$key_auth = true;
}else{
	if($p_key == $setting_key && empty($p_hp) && !isset($_SESSION['logged'])){
		// Exec Login
		$username = (isset($_POST['username']) ? $_POST['username'] : '' );
		$password = (isset($_POST['password']) ? $_POST['password'] : '' );

		if($username == $setting_user && $setting_pass == $password){
			$_SESSION['logged'] = TRUE;
		}
	}
}

if(!isset($_SESSION['logged']) && !$key_auth) {
	session_destroy();
	die('Not Authrorized');
}

if(!isset($_SESSION['logged']) && $key_auth) {
	session_destroy();
	include('templates/update_login.html');
	exit();
}

if($_SESSION['logged'] !== TRUE && $key_auth) {
	session_destroy();
	include('templates/update_login.html');
	exit();
}

// Logado
$action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : '' );
switch ($action) {
	case 'update':

		$buffer = "<pre>Start Update</pre>";
		$upload = Upload::load();
		if($upload !== false){
			$buffer .= "<pre>Upload do Arquivo OK.</pre>";
			$data 	= Process::load("uploads/$upload");
			if($data == false){
				$buffer .= "<pre>Arquivo Inválido ou com Dados Inválidos</pre>";
			}else{

				if(count($data) == 0){
					$buffer .= "<pre>Arquivo Vazio</pre>";
				}else{
					$buffer	.= Update::load($data);
				}
			}
		}else{
			$buffer = "<pre>Erro ao Efetuar o Upload do Arquivo</pre>";
		}

		include('templates/update_result.php');

		break;
	default:
		include('templates/update_data.html');
		break;
}
