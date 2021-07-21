<?php
namespace acwaves;

/**
 *
 */
class Update
{
	function __construct(){}

	static public function load($handle){
		$files = glob('json/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}

		$types = array();
		$buffer = "";
		if(is_array($handle)){
			foreach($handle as $type => $objects){

				$fp = fopen("json/$type.json", 'w');
				$types[] = $type;
				if(is_array($objects)){
					$c = count($objects);
				}else{
					$c = 1;
				}

				fwrite($fp, json_encode($objects));
				fclose($fp);

				$buffer .= "<pre>$type	::	$c	::	Arquivo Gerado com Sucesso	::	$type.json</pre>";
			}
		}

		$fp = fopen("json/type.json", 'w');
		fwrite($fp, json_encode($types));
		fclose($fp);
		$c = count($types);

		$buffer .= "<pre>Tipos	::	$c	::	Arquivo Gerado com Sucesso	::	type.json</pre>";

		$buffer .= "<pre>Fim do Processamento</pre>";
		return $buffer;
	}
}
