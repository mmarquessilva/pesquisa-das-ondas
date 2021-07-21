<?php
namespace acwaves;

/**
 *
 */
class Upload
{
	function __construct(){}

	static public function load(){
		if(isset($_FILES['filetoupdate'])){

			$files = glob('uploads/*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file))
			    unlink($file); // delete file
			}

      		$ext = strtolower(substr($_FILES['filetoupdate']['name'],-4)); //Pegando extensão do arquivo
      		if($ext == ".csv"){
	      		$new_name = date("YmdHis") . ".csv"; //Definindo um novo nome para o arquivo
	      		$dir = 'uploads/'; //Diretório para uploads
	      		move_uploaded_file($_FILES['filetoupdate']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
	      		return $new_name;
      		}
   		}

   		return false;
	}
}
