<?php
namespace acwaves;

/**
 *
 */
class Zone
{
	public $id;
	public $name;

	function __construct($id = '',$name = ''){
		$this->id = $id;
		$this->name = $name;
	}

	public function _setByArray($array){
		$this->id = $array[1];
		$this->name = $array[2];
	}
}
