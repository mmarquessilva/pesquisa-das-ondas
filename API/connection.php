<?php

class Banco
{
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        $dbNome = 'db_pesquisa';
        $dbHost = '52.179.136.89';
        $dbPort = '3306';
        $dbUsuario = 'usr_api';
        $dbSenha = 'bi2021ACAPI';
        $dbCharset = 'utf8mb4';
        if(null == self::$cont)
        {
            try
            {
                $dsn = "mysql:host=$dbHost;dbname=$dbNome;charset=$dbCharset;port=$dbPort";
                self::$cont =  new PDO($dsn, $dbUsuario, $dbSenha); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
    public static function AddIntegrationDataBase($data_a)
    {
        try {
            
            //$resultok = true;
            //try{
            //    $resultok = self::ApiPesquisa($data_a);
            //} catch (Exception $erro) {
                $resultok = false;
            //}
            
            if (!$resultok)
            {
                $pdo = self::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("set names utf8");
                $val = " VALUES('".$data_a[1]."', '".$data_a[2]."', '".$data_a[3]."', '".$data_a[4]."', '".$data_a[5]."', '".$data_a[6]."', '".$data_a[7]."', '".$data_a[8]."', '".$data_a[9]."', '".$data_a[10]."', '".$data_a[11]."', ".$data_a[12].", ".$data_a[13].", ".$data_a[14].", ".$data_a[15].", ".$data_a[16].", ".$data_a[17].", ".$data_a[18].", ".$data_a[19].", ".$data_a[20].", ".$data_a[21].", ".$data_a[22].", ".$data_a[23].", ".$data_a[24].", ".$data_a[25].", ".$data_a[26].", '".$data_a[27]."', '".$data_a[28]."')";
                
                
                
                $sql = "INSERT INTO pesquisas (cd_origem_pesquisa, nm_entrevistado, ds_email, ds_telefone, ds_cargo, ds_empresa, ds_mercado, ds_porte, ds_marca, ds_seg_marca, ds_rel_marca, vl_total_marca, vl_total_negocio, vl_total_comunicacao, vl_total_produto, vl_total_pessoa, vl_total_proposito, vl_produto_negocio_lucro, vl_produto_marca_conhecida, vl_produto_comunicacao_venda, vl_pessoa_marca_relevancia, vl_pessoa_negocio_cria_valor, vl_pessoa_cominucacao_conexao_emocional, vl_proposito_marca_proposito, vl_proposito_negocio_ecosistema, vl_proposito_comunicacao_engajamento, dt_evento, dt_criacao) ".$val;   
                $q = $pdo->prepare($sql);
                $pdo->exec($sql);
                //$q->execute($data_a);

                self::desconectar();
            }
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
    private function ApiPesquisa($data_arr){
        try{
            $api_url = "http://52.179.136.89:81/v1/pesquisas";

            $data_query = http_build_query($data_arr);
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

            return true;
        } catch (Exception $erro) {
            return false;
        }
    }
}
?>