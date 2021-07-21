<?php
function my_autoloader($class) {
    $class = str_replace("\\", "/", $class);
    require_once "$class.php";
}
spl_autoload_register('my_autoloader');
require_once('result.php');
use acwaves\ReadJson;

?>

<div class="col-sm-10 gradient p-0 wow fadeInRight" data-wow-delay="0s" data-wow-duration=".3s">
  <div class="result-container result-desktop">
    <div class="row result-header">
      <div class="col-sm-12 col-md-6">
        <h1 class="title">RESULTADO PARA A MARCA <?php echo mb_strtoupper($marca); ?></h1>
        <h5>Este é o diagnóstico de acordo com as respostas oferecidas por você. Também enviamos um e-mail para você guardar e consultar sempre que quiser. E lembre-se que a gestão de valor deve ser contínua, então refaça o teste sempre que quiser acompanhar a evolução do branding da marca indicada para novos planos de ação.</h5>
      </div>
      <?php /*?>
      <div class="col-sm-12 col-md-6 flex-end">
        <span class="medium">MÉDIA<br /> GERAL</span>
        <span class="medium-value"><?php echo $points?></span>
      </div> */ ?>
    </div>
    <div class="row result-header pt-5 panel-result">
        <div class="col-sm-12 col-md-12">
            <h4>NOTA POR ONDAS</h4>
            <h5 class="ruim d-inline mr-3">0 a 5 RUIM</h5>
            <h5 class="medio d-inline mr-3">6 A 10 MÉDIO</h5>
            <h5 class="bom d-inline mr-3">11 A 15 BOM</h5>
        </div>
        <?php
          foreach($results['WAVE'] as $key => $_wave){
            if(!isset($_wave['TOTAL'])){continue;}
            $grd = "ruim";
            if($_wave['TOTAL'] > 5 ){
              $grd = "medio";
            }
            if($_wave['TOTAL'] > 10 ){
              $grd = "bom";
            }

        ?>
          <div class="col-sm-4 col-md-4 text-left box-resultado">
            <div class="text-center d-inline-block">
              <span class="big-number <?php echo $grd;?>"><?php echo (($_wave['TOTAL'] < 10) ? number_format(floatval($_wave['TOTAL']),"0") : $_wave['TOTAL'] );?></span>
              <h5>ONDA <?php echo $key;?></h5>
              <h5 class="wave"><?php echo ReadJson::onlyWave($key)->name ?></h5>
            </div>
          </div>
        <?php
          }
        ?>
    </div>
    <div class="row result-content">
      <?php /*
      <div class="col-sm-12 p-0">
        <h2 class="title">ALINHAMENTO  MARCA, NEGÓCIO E COMUNICAÇÃO</h2>
        <?php
          $pieces = explode(" * ", $zone);
          if(isset($pieces['0'])){
            echo "<h3 class=\"highlight\">".$pieces['0']."</h3>";
          }
          if(isset($pieces['1'])){
            echo "<p>".$pieces['1']."</p>";
          }
        ?>
      </div> */ ?>

      <div class="col-sm-12">
        <h2 class="title">PERFOMANCE NAS ONDAS</h2>
        <?php
          $pos = strpos($wave, "*");
          if($pos === false){
            echo "<h3 class=\"highlight\">".$wave."</h3>";
          }else{
            $pieces = explode(" * ", $wave);
            if(isset($pieces['0'])){
              echo "<h3 class=\"highlight\">".$pieces['0']."</h3>";
            }
            if(isset($pieces['1'])){
              echo "<p>".$pieces['1']."</p>";
            }
          }
        ?>
      </div>
    </div>

    <div class="row result-content">
      <div class="col-sm-12 col-md-12">
        <h2 class="newtitle pb-4">DECODIFICANDO O VALOR</h2>
      </div>
      <?php
        $order = array(3,1,2);

        uksort($result_finals, function($key1, $key2) use ($order) {
            return (array_search($key1, $order) > array_search($key2, $order));
        });

        foreach($result_finals as $end){
      ?>
        <div class="col-sm-12 col-md-4">
          <h2 class="newtitle pb-0 mb-0"><?php echo  $end->name;?></h2>
          <h5 class="newsubtitle mb-4"><?php echo  $end->desc;?></h5>
          <h3 class="newhighlight">
            <?php echo $end->result;?>
          </h3>
        </div>
      <?php
        }
      ?>
    </div>

    <div class="row result-footer">
      <div class="col-sm-12 col-md-7 pl-0 pt-4">
        <span class="svg-logo">
          <svg width="37" height="50" viewBox="0 0 37 50" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M27.2336 19.7837C24.8498 18.4875 21.1296 21.0117 18.1679 21.0117C15.17 21.0117 11.4498 18.4875 9.06602 19.8178C7.44069 20.7047 7.07951 22.8536 6.60997 24.9002C4.04556 22.2737 2.45634 18.7263 2.45634 14.8719C2.45634 6.65142 9.49944 0 18.1679 0C26.8363 0 33.8794 6.65142 33.8794 14.8378C33.8794 18.7263 32.2902 22.2396 29.7258 24.9002C29.2201 22.8195 28.8589 20.6706 27.2336 19.7837Z"
              fill="black" />
            <path
              d="M5.59866 27.8678C6.10432 27.0491 6.35715 25.9917 6.60998 24.8661C9.46334 27.7995 13.5808 29.6415 18.1679 29.6415C22.7188 29.6415 26.8363 27.7995 29.7258 24.8661C29.9786 25.9576 30.2314 26.9809 30.7371 27.7995C32.1096 30.119 36.3716 31.8586 36.3716 34.6897C36.3716 37.4867 32.1096 39.2605 30.7371 41.5117C29.2924 43.8653 29.7619 48.2313 27.2697 49.5957C24.8498 50.926 21.1296 48.4019 18.1679 48.4019C15.2062 48.4019 11.486 50.926 9.10215 49.6299C6.60998 48.2655 7.07952 43.9335 5.63478 41.5799C4.22616 39.2946 -0.0358162 37.555 0.000301361 34.7238C-0.0358162 31.8927 4.19004 30.119 5.59866 27.8678Z"
              fill="black" />
          </svg>
        </span>
        <p>Entre em contato conosco para trabalharmos<br/>as <strong>3 Ondas de Branding</strong> da sua Empresa.</p>
      </div>

      <div class="col-sm-12 col-md-5 pr-0 flex-end  pt-4">
        <a class="button button--white" href="http://www.anacouto.com.br/contato/" target="_blank">Entre em contato
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- RESTART BUTTON -->
<div class=" button--large background--black v-middle wow fadeInRight col-btn-restart" data-wow-delay="0.5s" data-wow-duration=".3s">
  <a href="index.html?<?php echo $params?>">RECOMEÇAR
    <i class="fas fa-arrow-right"></i>
  </a>
</div>
<!-- //RESTART BUTTON -->
<?php
require_once('sendmail.php');
