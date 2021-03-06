<?php

function my_autoloader($class) {
    $class = str_replace("\\", "/", $class);
    require_once "$class.php";
}
spl_autoload_register('my_autoloader');

use acwaves\ReadJson;

$params = array(
  'txt_nome' => '',
  'txt_email' => '',
  'txt_phone' => '',
  'txt_empresa' => '',
  'txt_cargo' => '',
  'txt_cargo_other' => '',
  'txt_atuacao' => '',
  'txt_atuacao_other' => '',
  'txt_colaboradores' => ''
);

foreach ($params as $key => $value) {
  $value = (isset($_REQUEST[$key]) ? $_REQUEST[$key] : '');
  $params[$key] = $value;
}
?>
<div class="container-fluid">
  <div class="row">
    <!-- SIDEBAR -->
    <div class="col-sm-3 gradient p-0 col-sidebar">
      <h1 class="highlight"><?php echo str_replace(' ','<br/>',ReadJson::title());?></h1>
      <h3 class="subhighlight" style="display:none;"><?php echo ReadJson::subtitle();?></h1>

      <div class="sidebar">
        <span class="title background--red-gradient border-radius-bottom  wow fadeInLeft" data-wow-delay=".5s"><?php echo ReadJson::onlyZone(1)->name?></span>
        <span class="title background--blue-gradient border-radius-bottom wow fadeInLeft" data-wow-delay="1s"><?php echo ReadJson::onlyZone(2)->name?></span>
        <span class="title background--green-gradient border-radius-bottom wow fadeInLeft" data-wow-delay="1.5s"><?php echo ReadJson::onlyZone(3)->name?></span>
      </div>
    </div>
    <!-- //SIDEBAR -->
    <!-- INTRODUCTION -->
    <div class="col-sm-9 page-intro col-intro">
      <div class="icon-title">
        <svg width="37" height="50" viewBox="0 0 37 50" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M27.2336 19.7837C24.8498 18.4875 21.1296 21.0117 18.1679 21.0117C15.17 21.0117 11.4498 18.4875 9.06602 19.8178C7.44069 20.7047 7.07951 22.8536 6.60997 24.9002C4.04556 22.2737 2.45634 18.7263 2.45634 14.8719C2.45634 6.65142 9.49944 0 18.1679 0C26.8363 0 33.8794 6.65142 33.8794 14.8378C33.8794 18.7263 32.2902 22.2396 29.7258 24.9002C29.2201 22.8195 28.8589 20.6706 27.2336 19.7837Z"
            fill="black" />
          <path
            d="M5.59866 27.8678C6.10432 27.0491 6.35715 25.9917 6.60998 24.8661C9.46334 27.7995 13.5808 29.6415 18.1679 29.6415C22.7188 29.6415 26.8363 27.7995 29.7258 24.8661C29.9786 25.9576 30.2314 26.9809 30.7371 27.7995C32.1096 30.119 36.3716 31.8586 36.3716 34.6897C36.3716 37.4867 32.1096 39.2605 30.7371 41.5117C29.2924 43.8653 29.7619 48.2313 27.2697 49.5957C24.8498 50.926 21.1296 48.4019 18.1679 48.4019C15.2062 48.4019 11.486 50.926 9.10215 49.6299C6.60998 48.2655 7.07952 43.9335 5.63478 41.5799C4.22616 39.2946 -0.0358162 37.555 0.000301361 34.7238C-0.0358162 31.8927 4.19004 30.119 5.59866 27.8678Z"
            fill="black" />
        </svg>
      </div>
      <div class="introduction wow fadeIn" data-wow-delay="1s">
        <?php echo ReadJson::howto();?>
      </div>

      <div class="form wow fadeIn" data-wow-delay="3s">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h3>QUEM ?? VOC???</h3>
          </div>
          <div class="col-sm-12 col-md-6">
            <small>* campos obrigat??rios</small>
          </div>
        </div>
        <form id="formRegister">
          <div class="row">
            <div class="col-sm-12">
              <input type="text" id="txt_nome" value="<?php echo $params['txt_nome'] ?>"  class="form_field" name="txt_nome" placeholder="Nome completo *" required="required">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-6">
              <input type="email" id="txt_email" value="<?php echo $params['txt_email'] ?>"   class="form_field" name="txt_email" placeholder="E-mail *" required="required">
            </div>
            <div class="col-sm-12 col-md-6">
              <input type="tel" id="txt_phone" value="<?php echo $params['txt_phone'] ?>"   class="form_field celphones" name="txt_phone"  placeholder="Telefone (DDD) + N??mero">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-6">
              <input type="text" id="txt_empresa" value="<?php echo $params['txt_empresa'] ?>"   class="form_field" name="txt_empresa" placeholder="Empresa *" required="required">
            </div>

            <div class="col-sm-12 col-md-6">
              <select id="txt_cargo"  class="form_field swap_for_text <?php echo (($params['txt_cargo'] == "Outro") ? "swap_for_select_active" : "" ); ?>" name="txt_cargo" required="required">
                <option <?php echo (($params['txt_cargo'] == "") ? "selected=\"selected\"" : "" ); ?> value="">Cargo *</option>
                <option <?php echo (($params['txt_cargo'] == "CEO") ? "selected=\"selected\"" : "" ); ?> value="CEO">CEO</option>
                <option <?php echo (($params['txt_cargo'] == "S??cio") ? "selected=\"selected\"" : "" ); ?> value="S??cio">S??cio</option>
                <option <?php echo (($params['txt_cargo'] == "Diretor") ? "selected=\"selected\"" : "" ); ?> value="Diretor">Diretor</option>
                <option <?php echo (($params['txt_cargo'] == "Gerente") ? "selected=\"selected\"" : "" ); ?> value="Gerente">Gerente</option>
                <option <?php echo (($params['txt_cargo'] == "Coordenador") ? "selected=\"selected\"" : "" ); ?> value="Coordenador">Coordenador</option>
                <option <?php echo (($params['txt_cargo'] == "Analista") ? "selected=\"selected\"" : "" ); ?> value="Analista">Analista</option>
                <option <?php echo (($params['txt_cargo'] == "Outro") ? "selected=\"selected\"" : "" ); ?> value="Outro">Outro</option>
              </select>
              <input type="text" id="txt_cargo_other" value="<?php echo $params['txt_cargo_other'] ?>" style="<?php echo (($params['txt_cargo_other'] == "") ? "" : "display:inline-block;" ); ?>"  class="form_field swap_for_select" name="txt_cargo_other" placeholder="Digite">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <select id="txt_atuacao"  class="form_field swap_for_text <?php echo (($params['txt_atuacao'] == "Outro") ? "swap_for_select_active" : "" ); ?>" name="txt_atuacao" required="required">
                <option <?php echo (($params['txt_atuacao'] == "") ? "selected=\"selected\"" : "" ); ?> value="">Segmento de Mercado *</option>
                <option <?php echo (($params['txt_atuacao'] == "Ag??ncia de Publicidade") ? "selected=\"selected\"" : "" ); ?> value="Ag??ncia de Publicidade">Ag??ncia de Publicidade</option>
                <option <?php echo (($params['txt_atuacao'] == "Agropecu??ria") ? "selected=\"selected\"" : "" ); ?> value="Agropecu??ria">Agropecu??ria</option>
                <option <?php echo (($params['txt_atuacao'] == "Alimentos e Bebidas") ? "selected=\"selected\"" : "" ); ?> value="Alimentos e Bebidas">Alimentos e Bebidas</option>
                <option <?php echo (($params['txt_atuacao'] == "Automotivo") ? "selected=\"selected\"" : "" ); ?> value="Automotivo">Automotivo</option>
                <option <?php echo (($params['txt_atuacao'] == "Bens de Consumo") ? "selected=\"selected\"" : "" ); ?> value="Bens de Consumo">Bens de Consumo</option>
                <option <?php echo (($params['txt_atuacao'] == "Branding") ? "selected=\"selected\"" : "" ); ?> value="Branding">Branding</option>
                <option <?php echo (($params['txt_atuacao'] == "Casa e Decora????o") ? "selected=\"selected\"" : "" ); ?> value="Casa e Decora????o">Casa e Decora????o</option>
                <option <?php echo (($params['txt_atuacao'] == "Cultura, Esporte e Lazer") ? "selected=\"selected\"" : "" ); ?> value="Cultura, Esporte e Lazer">Cultura, Esporte e Lazer</option>
                <option <?php echo (($params['txt_atuacao'] == "Com??rcio e Varejo") ? "selected=\"selected\"" : "" ); ?> value="Com??rcio e Varejo">Com??rcio e Varejo</option>
                <option <?php echo (($params['txt_atuacao'] == "Consultoria") ? "selected=\"selected\"" : "" ); ?> value="Consultoria">Consultoria</option>
                <option <?php echo (($params['txt_atuacao'] == "Educa????o") ? "selected=\"selected\"" : "" ); ?> value="Educa????o">Educa????o</option>
                <option <?php echo (($params['txt_atuacao'] == "Eletroeletr??nicos") ? "selected=\"selected\"" : "" ); ?> value="Eletroeletr??nicos">Eletroeletr??nicos</option>
                <option <?php echo (($params['txt_atuacao'] == "Energia") ? "selected=\"selected\"" : "" ); ?> value="Energia">Energia</option>
                <option <?php echo (($params['txt_atuacao'] == "Farmac??utico") ? "selected=\"selected\"" : "" ); ?> value="Farmac??utico">Farmac??utico</option>
                <option <?php echo (($params['txt_atuacao'] == "Financeiro") ? "selected=\"selected\"" : "" ); ?> value="Financeiro">Financeiro</option>
                <option <?php echo (($params['txt_atuacao'] == "Higiene e Beleza") ? "selected=\"selected\"" : "" ); ?> value="Higiene e Beleza">Higiene e Beleza</option>
                <option <?php echo (($params['txt_atuacao'] == "Imobili??rio") ? "selected=\"selected\"" : "" ); ?> value="Imobili??rio">Imobili??rio</option>
                <option <?php echo (($params['txt_atuacao'] == "Log??stica e Transporte") ? "selected=\"selected\"" : "" ); ?> value="Log??stica e Transporte">Log??stica e Transporte</option>
                <option <?php echo (($params['txt_atuacao'] == "M??dia") ? "selected=\"selected\"" : "" ); ?> value="M??dia">M??dia</option>
                <option <?php echo (($params['txt_atuacao'] == "Minera????o e Metalurgia") ? "selected=\"selected\"" : "" ); ?> value="Minera????o e Metalurgia">Minera????o e Metalurgia</option>
                <option <?php echo (($params['txt_atuacao'] == "Moda") ? "selected=\"selected\"" : "" ); ?> value="Moda">Moda</option>
                <option <?php echo (($params['txt_atuacao'] == "??leo e G??s") ? "selected=\"selected\"" : "" ); ?> value="??leo e G??s">??leo e G??s</option>
                <option <?php echo (($params['txt_atuacao'] == "Qu??mica") ? "selected=\"selected\"" : "" ); ?> value="Qu??mica">Qu??mica</option>
                <option <?php echo (($params['txt_atuacao'] == "Sa??de") ? "selected=\"selected\"" : "" ); ?> value="Sa??de">Sa??de</option>
                <option <?php echo (($params['txt_atuacao'] == "Seguros") ? "selected=\"selected\"" : "" ); ?> value="Seguros">Seguros</option>
                <option <?php echo (($params['txt_atuacao'] == "Servi??os Corporativos") ? "selected=\"selected\"" : "" ); ?> value="Servi??os Corporativos">Servi??os Corporativos</option>
                <option <?php echo (($params['txt_atuacao'] == "Servi??os Jur??dicos") ? "selected=\"selected\"" : "" ); ?> value="Servi??os Jur??dicos">Servi??os Jur??dicos</option>
                <option <?php echo (($params['txt_atuacao'] == "Setor P??blico") ? "selected=\"selected\"" : "" ); ?> value="Setor P??blico">Setor P??blico</option>
                <option <?php echo (($params['txt_atuacao'] == "Tecnologia") ? "selected=\"selected\"" : "" ); ?> value="Tecnologia">Tecnologia</option>
                <option <?php echo (($params['txt_atuacao'] == "Telecomunica????es") ? "selected=\"selected\"" : "" ); ?> value="Telecomunica????es">Telecomunica????es</option>
                <option <?php echo (($params['txt_atuacao'] == "Terceiro Setor") ? "selected=\"selected\"" : "" ); ?> value="Terceiro Setor">Terceiro Setor</option>
                <option <?php echo (($params['txt_atuacao'] == "Turismo") ? "selected=\"selected\"" : "" ); ?> value="Turismo">Turismo</option>
                <option <?php echo (($params['txt_atuacao'] == "Outro") ? "selected=\"selected\"" : "" ); ?> value="Outro">Outro</option>
              </select>
              <input type="text" id="txt_atuacao_other" value="<?php echo $params['txt_atuacao_other'] ?>" style="<?php echo (($params['txt_atuacao_other'] == "") ? "" : "display:inline-block;" ); ?>"  class="form_field swap_for_select" name="txt_atuacao_other" placeholder="Digite">
            </div>
            <div class="col-sm-12 col-md-6">
              <select id="txt_colaboradores" class="form_field" name="txt_colaboradores" required="required">
                <option <?php echo (($params['txt_colaboradores'] == "") ? "selected=\"selected\"" : "" ); ?> value="">N??mero de colaboradores</option>
                <option <?php echo (($params['txt_colaboradores'] == "1-10") ? "selected=\"selected\"" : "" ); ?> value="1-10">1-10</option>
                <option <?php echo (($params['txt_colaboradores'] == "11-50") ? "selected=\"selected\"" : "" ); ?> value="11-50">11-50</option>
                <option <?php echo (($params['txt_colaboradores'] == "51-100") ? "selected=\"selected\"" : "" ); ?> value="51-100">51-100</option>
                <option <?php echo (($params['txt_colaboradores'] == "101-300") ? "selected=\"selected\"" : "" ); ?> value="101-300">101-300</option>
                <option <?php echo (($params['txt_colaboradores'] == "+300") ? "selected=\"selected\"" : "" ); ?> value="+300">+300</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-8">
              <h3>QUAL MARCA VOC?? VAI AVALIAR?</h3>
            </div>
            <div class="col-sm-12 col-md-4">
              <small>* campos obrigat??rios</small>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-12">
              <input type="text" id="txt_marca"  class="form_field" name="txt_marca" placeholder="Marca *" required="required">
            </div>

            <div class="col-sm-12 col-md-6">
              <select id="txt_seg_marca"  class="form_field swap_for_text" name="txt_seg_marca" required="required">
                <option value="">Segmento da Marca *</option>
                <option value="Ag??ncia de Publicidade">Ag??ncia de Publicidade</option>
                <option value="Agropecu??ria">Agropecu??ria</option>
                <option value="Alimentos e Bebidas">Alimentos e Bebidas</option>
                <option value="Automotivo">Automotivo</option>
                <option value="Bens de Consumo">Bens de Consumo</option>
                <option value="Branding">Branding</option>
                <option value="Casa e Decora????o">Casa e Decora????o</option>
                <option value="Cultura, Esporte e Lazer">Cultura, Esporte e Lazer</option>
                <option value="Com??rcio e Varejo">Com??rcio e Varejo</option>
                <option value="Consultoria">Consultoria</option>
                <option value="Educa????o">Educa????o</option>
                <option value="Eletroeletr??nicos">Eletroeletr??nicos</option>
                <option value="Energia">Energia</option>
                <option value="Farmac??utico">Farmac??utico</option>
                <option value="Financeiro">Financeiro</option>
                <option value="Higiene e Beleza">Higiene e Beleza</option>
                <option value="Imobili??rio">Imobili??rio</option>
                <option value="Log??stica e Transporte">Log??stica e Transporte</option>
                <option value="M??dia">M??dia</option>
                <option value="Minera????o e Metalurgia">Minera????o e Metalurgia</option>
                <option value="Moda">Moda</option>
                <option value="??leo e G??s">??leo e G??s</option>
                <option value="Qu??mica">Qu??mica</option>
                <option value="Sa??de">Sa??de</option>
                <option value="Seguros">Seguros</option>
                <option value="Servi??os Corporativos">Servi??os Corporativos</option>
                <option value="Servi??os Jur??dicos">Servi??os Jur??dicos</option>
                <option value="Setor P??blico">Setor P??blico</option>
                <option value="Tecnologia">Tecnologia</option>
                <option value="Telecomunica????es">Telecomunica????es</option>
                <option value="Terceiro Setor">Terceiro Setor</option>
                <option value="Turismo">Turismo</option>
                <option value="Outro">Outro</option>
              </select>
              <input type="text" id="txt_seg_marca_other"  class="form_field swap_for_select" name="txt_seg_marca_other" placeholder="Digite">
            </div>
            <div class="col-sm-12 col-md-6">
              <select id="txt_relacao_marca" class="form_field swap_for_text" name="txt_relacao_marca" required="required">
                <option value="">Sua rela????o com ela *</option>
                <option value="Colaborador">Colaborador</option>
                <option value="Consumidor"> Consumidor / Cliente</option>
                <option value="Gestor">Gestor</option>
                <option value="Parceiro">Parceiro</option>
                <option value="Outro">Outro</option>
              </select>
              <input type="text" id="txt_relacao_marca_other"  class="form_field swap_for_select" name="txt_relacao_marca_other" placeholder="Digite">
            </div>
          </div>


          <div class="row">
            <div class="col-sm-12 text-left optin-box">
              <input type="checkbox" name="txt_option" class="form_field" id="txt_option" required="required" value="1">
              <span class="text-left">Autorizo expressamente que a AC Company Ltda., seus parceiros e/ou colaboradores, entrem em contato pelas informa????es ora disponibilizadas para os fins de confirma????o e/ou eventual aprofundamento das informa????es prestadas neste ato. Declaro, ainda, ter conhecimento de que, caso n??o ofere??a minha autoriza????o, a AC Company Ltda. poder?? ser for??ada a eliminar minha avalia????o de seu sistema, na hip??tese de impossibilidade de confirma????o das informa????es apresentadas</span>
            </div>
          </div>

        </form>
      </div>
    </div>
    <!-- //INTRODUCTION -->
    <!-- START BUTTON -->
    <div class="col-sm-2 button button--large background--orange wow v-middle fadeInRight col-action_second" id="btn-send-result" data-wow-delay="7s">
      <a href="#" class="action-button">COME??AR
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
    <!-- //START BUTTON -->



    <!-- START BUTTON -->
    <div class="col-sm-2 button button--large background--orange wow v-middle fadeInRight col-action" style="display:none;" data-wow-delay="3s">
      <a href="#" class="action-button">COME??AR
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
    <!-- //START BUTTON -->
  </div>
</div>
