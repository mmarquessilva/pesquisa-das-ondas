<?php
namespace acwaves;
/**
 *
 */
class Question
{
	public $zone;
	public $wave;
	public $title;
	public $question;

	function __construct($zone = '',$wave = '',$title = '',$question = ''){
		$this->zone = $zone;
		$this->wave = $wave;
		$this->title = $title;
		$this->question = $question;
	}

	public function _setByArray($array){
		$this->zone = $array[1];
		$this->wave = $array[2];
		$this->title = $array[3];
		$this->question = $array[4];
	}
}
