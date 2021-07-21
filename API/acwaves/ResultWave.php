<?php
namespace acwaves;
/**
 *
 */
class ResultWave
{
	public $grade1;
	public $grade2;
	public $grade3;
	public $response;

	function __construct($grade1 = '',$grade2 = '',$grade3 = '',$response = ''){
		$this->grade1 = $grade1;
		$this->grade2 = $grade2;
		$this->grade3 = $grade3;
		$this->response = $response;
	}

	public function _setByArray($array){
		$this->grade1 = $array[1];
		$this->grade2 = $array[2];
		$this->grade3 = $array[3];
		$this->response = $array[4];
	}
}
