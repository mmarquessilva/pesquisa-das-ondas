<?php
namespace acwaves;
/**
 *
 */
class Wave
{
	public $id;
	public $number;
	public $name;
	public $desc;

	function __construct($id = '',$number = '',$name = '',$desc = ''){
		$this->id = $id;
		$this->number = $number;
		$this->name = $name;
		$this->desc = $desc;
	}

	public function _setByArray($array){
		$this->id = $array[1];
		$this->number = $array[2];
		$this->name = $array[3];
		$this->desc = $array[4];
	}
}
