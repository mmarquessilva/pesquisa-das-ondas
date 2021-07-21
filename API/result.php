<?php
require 'connection.php';
/**
 * RD Station - Integrações
 * addLeadConversionToRdstationCrm()
 * Envio de dados para a API de leads do RD Station
 *
 * Parâmetros:
 *     ($rdstation_token) - token da sua conta RD Station ( encontrado em https://www.rdstation.com.br/docs/api )
 *     ($identifier) - identificador da página ou evento ( por exemplo, 'pagina-contato' )
 *     ($data_array) - um Array com campos do formulário ( por exemplo, array('email' => 'teste@rdstation.com.br', 'nome' =>'Fulano') )
 */
function addLeadConversionToRdstationCrm( $rdstation_token, $identifier, $data_array ) {
  $api_url = "http://www.rdstation.com.br/api/1.2/conversions";

  try {
    if (empty($data_array["token_rdstation"]) && !empty($rdstation_token)) { $data_array["token_rdstation"] = $rdstation_token; }
    if (empty($data_array["identificador"]) && !empty($identifier)) { $data_array["identificador"] = $identifier; }
    unset($data_array["password"], $data_array["password_confirmation"], $data_array["senha"],
          $data_array["confirme_senha"], $data_array["captcha"], $data_array["_wpcf7"],
          $data_array["_wpcf7_version"], $data_array["_wpcf7_unit_tag"], $data_array["_wpnonce"],
          $data_array["_wpcf7_is_ajax_call"]);

    if ( !empty($data_array["token_rdstation"]) && !( empty($data_array["email"]) && empty($data_array["email_lead"]) ) ) {
      $data_query = http_build_query($data_array);
      if (in_array ('curl', get_loaded_extensions())) {
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_query);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);
        curl_close($ch);
      } else {
        $params = array('http' => array('method' => 'POST', 'content' => $data_query, 'ignore_errors' => true));
        $ctx = stream_context_create($params);
        $fp = @fopen($api_url, 'rb', false, $ctx);
      }
    }
  } catch (Exception $e) { }
}
  /*
		Function Name: gd_wp_getip
		Description: get user ip
	*/
	function gd_wp_getip(){
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

use acwaves\ReadJson;
use acwaves\Finals;

$zones = ReadJson::zones();
$waves = ReadJson::waves();

/*CALC RESULT */
$results = array();
$average = array();
$concat = '';
foreach($waves as $wave){
  foreach($zones as $zone){
    $response = $_POST["question_$zone->id"."_$wave->id"];
    $results['QUESTIONS']["q-$zone->id-$wave->id"] = $response;
    $results['POINTS'][] = $response;
    if(!empty($concat)){
      $concat .= " | ";
    }
    $concat .= "q_$wave->id"."_$zone->id".":$response";
    if(!isset($results['WAVE'][$wave->id])){
      $results['WAVE'][$wave->id]['TOTAL'] = 0;
      $results['WAVE'][$wave->id]['COUNT'] = 0;
    }
    $results['WAVE'][$wave->id]['QUESTION'][$zone->id] = $response;
    $results['WAVE'][$wave->id]['TOTAL'] = $results['WAVE'][$wave->id]['TOTAL'] + $response;
    $results['WAVE'][$wave->id]['COUNT'] ++;
    //$results['WAVE'][$wave->id]['AVERAGE'] =  ($results['WAVE'][$wave->id]['TOTAL'] / $results['WAVE'][$wave->id]['COUNT']);
    $results['WAVE'][$wave->id]['AVERAGE'] =  $results['WAVE'][$wave->id]['TOTAL'];
    $results['WAVE'][$wave->id]['RESPONSE'] = ReadJson::checkWavePoint($results['WAVE'][$wave->id]['AVERAGE'])->name;
    $results['WAVE']['RESPONSE'][$wave->id] = ReadJson::checkWavePoint($results['WAVE'][$wave->id]['AVERAGE'])->name;
    //$results['WAVE']['POINTS'][$wave->id] = round($results['WAVE'][$wave->id]['AVERAGE'],2);
    $results['WAVE']['POINTS'][$wave->id] = $results['WAVE'][$wave->id]['TOTAL'];

    if(!isset($results['ZONE'][$zone->id])){
      $results['ZONE'][$zone->id]['TOTAL'] = 0;
      $results['ZONE'][$zone->id]['COUNT'] = 0;
    }
    $results['ZONE'][$zone->id]['QUESTION'][$wave->id] = $response;
    $results['ZONE'][$zone->id]['TOTAL'] = $results['ZONE'][$zone->id]['TOTAL']+ $response;
    $results['ZONE'][$zone->id]['COUNT'] ++;
    //$results['ZONE'][$zone->id]['AVERAGE'] =  ($results['ZONE'][$zone->id]['TOTAL'] / $results['ZONE'][$zone->id]['COUNT']);
    $results['ZONE'][$zone->id]['AVERAGE'] =  $results['ZONE'][$zone->id]['TOTAL'];
    $results['ZONE'][$zone->id]['RESPONSE'] = ReadJson::checkZonePoint($results['ZONE'][$zone->id]['AVERAGE'])->name;
    $results['ZONE']['RESPONSE'][$zone->id] = ReadJson::checkZonePoint($results['ZONE'][$zone->id]['AVERAGE'])->name;
    //$results['ZONE']['POINTS'][$zone->id] = round($results['ZONE'][$zone->id]['AVERAGE'],2);
    $results['ZONE']['POINTS'][$zone->id] = $results['ZONE'][$zone->id]['TOTAL'];


    if($wave->id == 2){
      $response = $response + 0.1;
    }
    if($wave->id == 3){
      $response = $response + 0.2;
    }

    $results['FINAL'][$wave->id]['ZONE'][$zone->id] = $response;
    $results['FINAL'][ReadJson::checkFinalPoint($response)->name][$response] = ReadJson::onlyResultsFinals($zone->id,$wave->id,ReadJson::checkFinalPoint($response)->name)->response;
    if(isset($results['FINAL'][$wave->id]['RESULT'])){
      if($response > $results['FINAL'][$wave->id]['RESULT']['MAX']['RESPONSE']){
        $results['FINAL'][$wave->id]['RESULT']['MAX']['ZONE'] = $zone->id;
        $results['FINAL'][$wave->id]['RESULT']['MAX']['RESPONSE'] = $response;
        $results['FINAL'][$wave->id]['RESULT']['MAX']['GRADE'] = ReadJson::checkFinalPoint($response)->name;
        $results['FINAL'][$wave->id]['RESULT']['MAX']['MESSAGE'] = ReadJson::onlyResultsFinals($zone->id,$wave->id,ReadJson::checkFinalPoint($response)->name)->response;
      }

      if($response < $results['FINAL'][$wave->id]['RESULT']['MIN']['RESPONSE']){
        $results['FINAL'][$wave->id]['RESULT']['MIN']['ZONE'] = $zone->id;
        $results['FINAL'][$wave->id]['RESULT']['MIN']['RESPONSE'] = $response;
        $results['FINAL'][$wave->id]['RESULT']['MIN']['GRADE'] = ReadJson::checkFinalPoint($response)->name;
        $results['FINAL'][$wave->id]['RESULT']['MIN']['MESSAGE'] = ReadJson::onlyResultsFinals($zone->id,$wave->id,ReadJson::checkFinalPoint($response)->name)->response;
      }
    }else{
      $results['FINAL'][$wave->id]['RESULT']['MAX']['ZONE'] = $zone->id;
      $results['FINAL'][$wave->id]['RESULT']['MAX']['RESPONSE'] = $response;
      $results['FINAL'][$wave->id]['RESULT']['MAX']['GRADE'] = ReadJson::checkFinalPoint($response)->name;
      $results['FINAL'][$wave->id]['RESULT']['MAX']['MESSAGE'] = ReadJson::onlyResultsFinals($zone->id,$wave->id,ReadJson::checkFinalPoint($response)->name)->response;
      $results['FINAL'][$wave->id]['RESULT']['MIN']['ZONE'] = $zone->id;
      $results['FINAL'][$wave->id]['RESULT']['MIN']['RESPONSE'] = $response;
      $results['FINAL'][$wave->id]['RESULT']['MIN']['GRADE'] = ReadJson::checkFinalPoint($response)->name;
      $results['FINAL'][$wave->id]['RESULT']['MIN']['MESSAGE'] = ReadJson::onlyResultsFinals($zone->id,$wave->id,ReadJson::checkFinalPoint($response)->name)->response;
    }
  }
}

$finals = ReadJson::finals();
$result_finals = array();
foreach($finals as $rule){
  $_final = new Finals();
  $_final->id = $rule->id;
  $_final->name = $rule->name;
  $_final->desc = $rule->desc;

  if($rule->id == 1){
    //get DETRATOR
    $min = 0;
    foreach($results['FINAL'] as $wave){
      if(!isset($wave['RESULT'])){continue;}
      if($wave['RESULT']['MIN']['GRADE'] == 'Ruim'){
        if($min == 0){
          $min = $wave['RESULT']['MIN'];
        }else{
          if($wave['RESULT']['MIN']['RESPONSE'] < $min['RESPONSE']){
            $min = $wave['RESULT']['MIN'];
          }
        }
      }
    }
    if(isset($min['GRADE'])){
      $_final->result = $min['MESSAGE'];
    }else{
      if(isset($results['FINAL']['Médio'])){
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"TRUE","TRUE","FALSE")->response;
      }else{
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"TRUE","FALSE","FALSE")->response;
      }
    }
  }

  if($rule->id == 2){
    // GET Acelerador
    $min = 0;
    foreach($results['FINAL'] as $wave){
      if(!isset($wave['RESULT'])){continue;}
      if($wave['RESULT']['MIN']['GRADE'] == 'Médio'){
        if($min == 0){
          $min = $wave['RESULT']['MIN'];
        }else{
          if($wave['RESULT']['MIN']['RESPONSE'] < $min['RESPONSE']){
            $min = $wave['RESULT']['MIN'];
          }
        }
      }
    }
    if(isset($min['GRADE'])){
      $_final->result = $min['MESSAGE'];
    }else{
      if(isset($results['FINAL']['Médio'])){
        $f = array_shift($results['FINAL']['Médio']);
        $_final->result = $f;
      }
      if(!isset($results['FINAL']['Médio']) && isset($results['FINAL']['Ruim']) && isset($results['FINAL']['Bom'])){
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"TRUE","FALSE","TRUE")->response;
      }
      if(!isset($results['FINAL']['Médio']) && !isset($results['FINAL']['Ruim'])){
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"TRUE","FALSE","FALSE")->response;
      }
      if(!isset($results['FINAL']['Médio']) && !isset($results['FINAL']['Bom'])){
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"FALSE","FALSE","TRUE")->response;
      }

    }
  }


  if($rule->id == 3){
    // GET Impulsionador
    $max = 0;
    foreach($results['FINAL'] as $wave){
      if(!isset($wave['RESULT'])){continue;}
      if($wave['RESULT']['MAX']['GRADE'] == 'Bom'){
        if($max == 0){
          $max = $wave['RESULT']['MAX'];
        }else{
          if($wave['RESULT']['MAX']['RESPONSE'] < $max['RESPONSE']){
            $max = $wave['RESULT']['MAX'];
          }
        }
      }
    }
    if(isset($max['GRADE'])){
      $_final->result = $max['MESSAGE'];
    }else{
      if(!isset($results['FINAL']['Bom'])){
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"FALSE","TRUE","TRUE")->response;
      }
      if(!isset($results['FINAL']['Médio']) && !isset($results['FINAL']['Bom'])){
        $_final->result = ReadJson::onlyResultsFinalsException($rule->id,"FALSE","FALSE","TRUE")->response;
      }
    }
  }
  $result_finals[$rule->id] = $_final;
}

//var_dump($results);
$points = array_filter($results['POINTS']);
$points = round(array_sum($points)/count($points),2);
$wave =  ReadJson::onlyResultsWavesArray($results['WAVE']['RESPONSE'])->response;
$waveResult = array_values($results['WAVE']['POINTS']);
$zone = ReadJson::onlyResultsZonesArray($results['ZONE']['RESPONSE'])->response;
$zoneResult = array_values($results['ZONE']['POINTS']);

/* GET DATA FORM */
$nome = (isset($_REQUEST['txt_nome']) ? $_REQUEST['txt_nome'] : '');
$email = (isset($_REQUEST['txt_email']) ? $_REQUEST['txt_email'] : '');
$phone = (isset($_REQUEST['txt_phone']) ? $_REQUEST['txt_phone'] : '');
$cargo = (isset($_REQUEST['txt_cargo']) ? $_REQUEST['txt_cargo'] : '');
$cargo_o = (isset($_REQUEST['txt_cargo_other']) ? $_REQUEST['txt_cargo_other'] : '');
if(!empty($cargo_o) && mb_strtoupper($cargo) =="OUTRO"){
  $cargo = $cargo_o;
}
$atuacao = (isset($_REQUEST['txt_atuacao']) ? $_REQUEST['txt_atuacao'] : '');
$atuacao_o = (isset($_REQUEST['txt_atuacao_other']) ? $_REQUEST['txt_atuacao_other'] : '');
if(!empty($atuacao_o) && mb_strtoupper($atuacao) =="OUTRO"){
  $atuacao = $atuacao_o;
}
$empresa = (isset($_REQUEST['txt_empresa']) ? $_REQUEST['txt_empresa'] : '');
$marca = (isset($_REQUEST['txt_marca']) ? $_REQUEST['txt_marca'] : '');
$seg_marca = (isset($_REQUEST['txt_seg_marca']) ? $_REQUEST['txt_seg_marca'] : '');
$seg_marca_o = (isset($_REQUEST['txt_seg_marca_other']) ? $_REQUEST['txt_seg_marca_other'] : '');
if(!empty($seg_marca_o) && mb_strtoupper($seg_marca) =="OUTRO"){
  $seg_marca = $seg_marca_o;
}
$rel_marca = (isset($_REQUEST['txt_relacao_marca']) ? $_REQUEST['txt_relacao_marca'] : '');
$rel_marca_o = (isset($_REQUEST['txt_relacao_marca_other']) ? $_REQUEST['txt_relacao_marca_other'] : '');
if(!empty($rel_marca_o) && mb_strtoupper($rel_marca) =="OUTRO"){
  $rel_marca = $rel_marca_o;
}
$colaboradores = (isset($_REQUEST['txt_colaboradores']) ? $_REQUEST['txt_colaboradores'] : '');

$params = array(
  'txt_nome' => $nome,
  'txt_email' => $email,
  'txt_phone' => $phone,
  'txt_empresa' => $empresa,
  'txt_cargo' => $cargo,
  'txt_cargo_other' => $cargo_o,
  'txt_atuacao' => $atuacao,
  'txt_atuacao_other' => $atuacao_o,
  'txt_colaboradores' => $colaboradores
);

$params = http_build_query($params, '', '&amp;');

//* SAVE CSV*//
$csv_file = 'data/buffer.csv';
$date = date('d/m/Y H:i:s');
$ip = gd_wp_getip();
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$code = md5($email.$ip.$user_agent);

// add infos into csv file
$handle = fopen($csv_file, "a");
list($z1, $z2, $z3) = $zoneResult;
list($w1, $w2, $w3) = $waveResult;
$questionResult = array_values($results['QUESTIONS']);
list($z1w1,$z2w1,$z3w1,$z1w2,$z2w2,$z3w2,$z1w3,$z2w3,$z3w3) = $questionResult;
$line = array($nome,$email,$phone,$cargo,$empresa,$atuacao,$colaboradores,$marca,$seg_marca,$rel_marca,$z1,$z2,$z3,$w1,$w2,$w3,$z1w1,$z2w1,$z3w1,$z1w2,$z2w2,$z3w2,$z1w3,$z2w3,$z3w3,$date);
fputcsv($handle, $line);
fclose($handle);

$form_data_array = array('email'=>$email, 'nome'=>$nome, 'empresa'=>$empresa, 'cargo'=>$cargo);
addLeadConversionToRdstationCrm("e5c215ac8cc3c4f5eb06528dfa52232f", "OndasWave", $form_data_array);
$interno ='1'; /*interna */
$banco_data_array = array(null, $interno,$nome,$email,$phone,$cargo,$empresa,$atuacao,$colaboradores,$marca,$seg_marca,$rel_marca,$z1,$z2,$z3,$w1,$w2,$w3,$z1w1,$z2w1,$z3w1,$z1w2,$z2w2,$z3w2,$z1w3,$z2w3,$z3w3,date('y-m-d H:i:s'),date('y-m-d H:i:s'));
Banco::AddIntegrationDataBase($banco_data_array);
