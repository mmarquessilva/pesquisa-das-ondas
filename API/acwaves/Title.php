<?php
namespace acwaves;

/**
 *
 */
class Title
{
	public $title;
	public $howto;
	public $subtitle;

	function __construct($title = '',$howto = '', $subtitle = ''){
		$this->title = $title;
		$this->howto = $howto;
		$this->subtitle = $subtitle;
	}

	public function _setByArray($array){
		$this->title = $array[1];
		$this->howto = $array[2];
		$this->subtitle = $array[3];
	}
}
