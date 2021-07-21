<?php
namespace acwaves;

/**
 *
 */
class Process
{
	public $csv;

	function __construct($csv = ''){
		if (($handle = fopen($csv, "r")) !== FALSE) {
			$this->$csv = $handle;
		}
	}

	static public function load($csv){
		if (($handle = fopen($csv, "r")) !== FALSE) {
			return Process::start($handle);
		}else{
			return false;
		}
	}

	static public function start($handle){
		$list = array();
		$row = 0;
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if($row == 0){
      	$row++; continue; // ignore line one
      }
      $fields = count($data);

			$type = $data[0];
			switch ($type) {
				case 'TITLE':
					$n = new Title();
			    $n->_setByArray($data);
			    $list[$type] = $n;
					break;
				case 'ZONE':
					$n = new Zone();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'ZONE-POINTS':
					$n = new ZonePoints();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'WAVE':
					$n = new Wave();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'WAVE-POINTS':
					$n = new WavePoints();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'QUESTION':
					$n = new Question();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'RESULTS-ZONE':
					$n = new ResultZone();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'RESULTS-WAVE':
					$n = new ResultWave();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'FINAL':
					$n = new Finals();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'FINAL-POINTS':
					$n = new FinalPoints();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'RESULTS-FINAL':
					$n = new ResultFinal();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
				case 'RESULTS-EXCEPTION':
					$n = new ResultException();
			    $n->_setByArray($data);
			    $list[$type][] = $n;
					break;
			}
	    $row++;
		}
		return $list;
	}

}
