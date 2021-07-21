<?php
namespace acwaves;
/**
 *
 */
class FinalPoints
{
	public $min;
	public $max;
	public $name;

	function __construct($min = '',$max = '',$name = ''){
		$this->min = $min;
		$this->max = $max;
		$this->name = $name;
	}

	public function _setByArray($array){
		$this->min = $array[1];
		$this->max = $array[2];
		$this->name = $array[3];
	}
}
