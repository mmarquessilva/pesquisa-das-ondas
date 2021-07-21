<?php
namespace acwaves;
/**
 *
 */
class ReadJson
{
	private $object;

	function __construct(){
	}

	static public function getJson($json){
		$str = file_get_contents("json/$json.json");
		return json_decode($str);
	}

	static public function title(){
		$t = ReadJson::getJson('TITLE');
		return $t->title;
	}

	static public function subtitle(){
		$t = ReadJson::getJson('TITLE');
		return $t->subtitle;
	}

	static public function howto(){
		$t = ReadJson::getJson('TITLE');
		return $t->howto;
	}

	static public function waves(){
		$r = ReadJson::getJson('WAVE');
		return $r;
	}

	static public function onlyWave($id){
		$r = ReadJson::getJson('WAVE');
		foreach($r as $x){
			if($x->id == $id){
				return $x;
			}
		}
	}

	static public function wavesPoints(){
		$r = ReadJson::getJson('WAVE-POINTS');
		return $r;
	}

	static public function checkWavePoint($point){
		$r = ReadJson::getJson('WAVE-POINTS');
		foreach($r as $x){
			if($point >= $x->min && $point < $x->max){
				return $x;
			}

			if($x->max == 15 && $point >= 15){
				return $x;
			}

			if($x->min == 1 && $point < 1){
				return $x;
			}
		}
	}
	/*Final*/

	static public function finals(){
		$r = ReadJson::getJson('FINAL');
		return $r;
	}

	static public function onlyFinal($id){
		$r = ReadJson::getJson('FINAL');
		foreach($r as $x){
			if($x->id == $id){
				return $x;
			}
		}
	}

	static public function finalsPoints(){
		$r = ReadJson::getJson('FINAL-POINTS');
		return $r;
	}

	static public function checkFinalPoint($point){
		$r = ReadJson::getJson('FINAL-POINTS');
		foreach($r as $x){
			if($point >= $x->min && $point < $x->max){
				return $x;
			}

			if($x->max == 15 && $point == 15){
				return $x;
			}

			if($point > $x->max && $x->max == 15){
				return $x;
			}

			if($x->min == 1 && $point < 1){
				return $x;
			}
		}
	}

	/*Finals*/

	static public function zones(){
		$r = ReadJson::getJson('ZONE');
		return $r;
	}

	static public function onlyZone($id){
		$r = ReadJson::getJson('ZONE');
		foreach($r as $x){
			if($x->id == $id){
				return $x;
			}
		}
	}

	static public function zonesPoints(){
		$r = ReadJson::getJson('ZONE-POINTS');
		return $r;
	}

	static public function checkZonePoint($point){
		$r = ReadJson::getJson('ZONE-POINTS');
		foreach($r as $x){
			if($point >= $x->min && $point < $x->max){
				return $x;
			}

			if($x->max == 15 && $point >= 15){
				return $x;
			}

			if($x->min == 1 && $point < 1){
				return $x;
			}
		}
	}


	static public function questions(){
		$r = ReadJson::getJson('QUESTION');
		return $r;
	}

	static public function onlyQuestion($zone,$wave){
		$r = ReadJson::getJson('QUESTION');
		foreach($r as $x){
			if($x->zone == $zone && $x->wave == $wave){
				return $x;
			}
		}
	}


	static public function resultsWaves(){
		$r = ReadJson::getJson('RESULTS-WAVE');
		return $r;
	}

	static public function onlyResultsWaves($grade1,$grade2,$grade3){
		$r = ReadJson::getJson('RESULTS-WAVE');
		foreach($r as $x){
			if(strtoupper($x->grade1) == strtoupper($grade1) && strtoupper($x->grade2) == strtoupper($grade2) && strtoupper($x->grade3) == strtoupper($grade3)){
				return $x;
			}
		}
	}

	static public function onlyResultsWavesArray($grades){
		list($grades1,$grades2,$grades3) = array_values($grades);
		return ReadJson::onlyResultsWaves($grades1,$grades2,$grades3);
	}

	static public function resultsZones(){
		$r = ReadJson::getJson('RESULTS-ZONE');
		return $r;
	}

	static public function onlyResultsZones($grade1,$grade2,$grade3){
		$r = ReadJson::getJson('RESULTS-ZONE');
		foreach($r as $x){
			if(strtoupper($x->grade1) == strtoupper($grade1) && strtoupper($x->grade2) == strtoupper($grade2) && strtoupper($x->grade3) == strtoupper($grade3)){
				return $x;
			}
		}
	}

	static public function onlyResultsZonesArray($grades){
		list($grades1,$grades2,$grades3) = array_values($grades);
		return ReadJson::onlyResultsZones($grades1,$grades2,$grades3);
	}

	/*Finals*/
	static public function resultsFinals(){
		$r = ReadJson::getJson('RESULTS-FINAL');
		return $r;
	}

	static public function onlyResultsFinals($zone,$wave,$grade){
		$r = ReadJson::getJson('RESULTS-FINAL');
		foreach($r as $x){
			if(strtoupper($x->zone) == strtoupper($zone) && strtoupper($x->wave) == strtoupper($wave) && strtoupper($x->grade) == strtoupper($grade)){
				return $x;
			}
		}
	}

	/*Finals*/
	static public function resultsFinalsException(){
		$r = ReadJson::getJson('RESULTS-EXCEPTION');
		return $r;
	}

	static public function onlyResultsFinalsException($final,$poor,$medium,$high){
		$r = ReadJson::getJson('RESULTS-EXCEPTION');
		foreach($r as $x){
			if(strtoupper($x->final) == strtoupper($final) && strtoupper($x->poor) == strtoupper($poor) && strtoupper($x->medium) == strtoupper($medium) && strtoupper($x->high) == strtoupper($high)){
				return $x;
			}
		}
	}
}
