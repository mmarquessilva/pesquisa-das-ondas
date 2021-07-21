<?php
namespace acwaves;
/**
 *
 */
class ResultException
{
	public $final;
	public $poor;
	public $medium;
	public $high;
	public $response;

	function __construct($final = '',$poor = '',$medium = '',$high = '',$response = ''){
		$this->final = $final;
		$this->poor = $poor;
		$this->medium = $medium;
		$this->high = $high;
		$this->response = $response;
	}

	public function _setByArray($array){
		$this->final = $array[1];
		$this->poor = $array[2];
		$this->medium = $array[3];
		$this->high = $array[4];
		$this->response = $array[5];
	}
}
