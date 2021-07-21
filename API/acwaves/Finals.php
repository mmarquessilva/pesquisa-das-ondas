<?php
namespace acwaves;

/**
 *
 */
class Finals
{
	public $id;
	public $name;
	public $desc;

	function __construct($id = '',$name = '', $desc = ''){
		$this->id = $id;
		$this->name = $name;
		$this->desc = $desc;
	}

	public function _setByArray($array){
		$this->id = $array[1];
		$this->name = $array[2];
		$this->desc = $array[3];
	}
}
