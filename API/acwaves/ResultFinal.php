<?php
namespace acwaves;
/**
 *
 */
class ResultFinal
{
	public $zone;
	public $wave;
	public $grade;
	public $response;

	function __construct($zone = '',$wave = '',$grade = '',$response = ''){
		$this->zone = $zone;
		$this->wave = $wave;
		$this->grade = $grade;
		$this->response = $response;
	}

	public function _setByArray($array){
		$this->zone = $array[1];
		$this->wave = $array[2];
		$this->grade = $array[3];
		$this->response = $array[4];
	}
}
