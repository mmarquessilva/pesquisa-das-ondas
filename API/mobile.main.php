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
      <div class="col-sm-12 p-0 wow fadeInLeft" data-wow-delay=".5s">
        <h1 class="highlight"><?php echo ReadJson::title()?></h1>
      </div>
    </div>

    <div class="row row_content">
      <div class="col-12 page-intro gradient p-0">

        <div class="sidebar-new">
          <span class="title background--red-gradient border-radius-top  border-radius-bottom bottom wow fadeInLeft" data-wow-duration="0.5s"><?php echo ReadJson::onlyZone(1)->name?></span>
          <span class="title background--blue-gradient border-radius-top  border-radius-bottom bottom wow fadeInLeft" data-wow-duration="0.7s"><?php echo ReadJson::onlyZone(2)->name?></span>
          <span class="title background--green-gradient border-radius-top border-radius-bottom  bottom wow fadeInLeft" data-wow-duration="0.9s"><?php echo ReadJson::onlyZone(3)->name?></span>
        </div>


        <div class="introduction wow fadeIn" data-wow-delay="1s">
          <?php echo ReadJson::howto();?>
        </div>

        <div class="form wow fadeIn">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h3>QUEM É VOCÊ?</h3>
            </div>
            <div class="col-sm-12 col-md-6">
              <small>* campos obrigatórios</small>
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
                <input type="tel" id="txt_phone" value="<?php echo $params['txt_phone'] ?>"   class="form_field celphones" name="txt_phone"  placeholder="Telefone (DDD) + Número">
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
                  <option <?php echo (($params['txt_cargo'] == "Sócio") ? "selected=\"selected\"" : "" ); ?> value="Sócio">Sócio</option>
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
                  <option <?php echo (($params['txt_atuacao'] == "Agência de Publicidade") ? "selected=\"selected\"" : "" ); ?> value="Agência de Publicidade">Agência de Publicidade</option>
                  <option <?php echo (($params['txt_atuacao'] == "Agropecuária") ? "selected=\"selected\"" : "" ); ?> value="Agropecuária">Agropecuária</option>
                  <option <?php echo (($params['txt_atuacao'] == "Alimentos e Bebidas") ? "selected=\"selected\"" : "" ); ?> value="Alimentos e Bebidas">Alimentos e Bebidas</option>
                  <option <?php echo (($params['txt_atuacao'] == "Automotivo") ? "selected=\"selected\"" : "" ); ?> value="Automotivo">Automotivo</option>
                  <option <?php echo (($params['txt_atuacao'] == "Bens de Consumo") ? "selected=\"selected\"" : "" ); ?> value="Bens de Consumo">Bens de Consumo</option>
                  <option <?php echo (($params['txt_atuacao'] == "Branding") ? "selected=\"selected\"" : "" ); ?> value="Branding">Branding</option>
                  <option <?php echo (($params['txt_atuacao'] == "Casa e Decoração") ? "selected=\"selected\"" : "" ); ?> value="Casa e Decoração">Casa e Decoração</option>
                  <option <?php echo (($params['txt_atuacao'] == "Cultura, Esporte e Lazer") ? "selected=\"selected\"" : "" ); ?> value="Cultura, Esporte e Lazer">Cultura, Esporte e Lazer</option>
                  <option <?php echo (($params['txt_atuacao'] == "Comércio e Varejo") ? "selected=\"selected\"" : "" ); ?> value="Comércio e Varejo">Comércio e Varejo</option>
                  <option <?php echo (($params['txt_atuacao'] == "Consultoria") ? "selected=\"selected\"" : "" ); ?> value="Consultoria">Consultoria</option>
                  <option <?php echo (($params['txt_atuacao'] == "Educação") ? "selected=\"selected\"" : "" ); ?> value="Educação">Educação</option>
                  <option <?php echo (($params['txt_atuacao'] == "Eletroeletrônicos") ? "selected=\"selected\"" : "" ); ?> value="Eletroeletrônicos">Eletroeletrônicos</option>
                  <option <?php echo (($params['txt_atuacao'] == "Energia") ? "selected=\"selected\"" : "" ); ?> value="Energia">Energia</option>
                  <option <?php echo (($params['txt_atuacao'] == "Farmacêutico") ? "selected=\"selected\"" : "" ); ?> value="Farmacêutico">Farmacêutico</option>
                  <option <?php echo (($params['txt_atuacao'] == "Financeiro") ? "selected=\"selected\"" : "" ); ?> value="Financeiro">Financeiro</option>
                  <option <?php echo (($params['txt_atuacao'] == "Higiene e Beleza") ? "selected=\"selected\"" : "" ); ?> value="Higiene e Beleza">Higiene e Beleza</option>
                  <option <?php echo (($params['txt_atuacao'] == "Imobiliário") ? "selected=\"selected\"" : "" ); ?> value="Imobiliário">Imobiliário</option>
                  <option <?php echo (($params['txt_atuacao'] == "Logística e Transporte") ? "selected=\"selected\"" : "" ); ?> value="Logística e Transporte">Logística e Transporte</option>
                  <option <?php echo (($params['txt_atuacao'] == "Mídia") ? "selected=\"selected\"" : "" ); ?> value="Mídia">Mídia</option>
                  <option <?php echo (($params['txt_atuacao'] == "Mineração e Metalurgia") ? "selected=\"selected\"" : "" ); ?> value="Mineração e Metalurgia">Mineração e Metalurgia</option>
                  <option <?php echo (($params['txt_atuacao'] == "Moda") ? "selected=\"selected\"" : "" ); ?> value="Moda">Moda</option>
                  <option <?php echo (($params['txt_atuacao'] == "Óleo e Gás") ? "selected=\"selected\"" : "" ); ?> value="Óleo e Gás">Óleo e Gás</option>
                  <option <?php echo (($params['txt_atuacao'] == "Química") ? "selected=\"selected\"" : "" ); ?> value="Química">Química</option>
                  <option <?php echo (($params['txt_atuacao'] == "Saúde") ? "selected=\"selected\"" : "" ); ?> value="Saúde">Saúde</option>
                  <option <?php echo (($params['txt_atuacao'] == "Seguros") ? "selected=\"selected\"" : "" ); ?> value="Seguros">Seguros</option>
                  <option <?php echo (($params['txt_atuacao'] == "Serviços Corporativos") ? "selected=\"selected\"" : "" ); ?> value="Serviços Corporativos">Serviços Corporativos</option>
                  <option <?php echo (($params['txt_atuacao'] == "Serviços Jurídicos") ? "selected=\"selected\"" : "" ); ?> value="Serviços Jurídicos">Serviços Jurídicos</option>
                  <option <?php echo (($params['txt_atuacao'] == "Setor Público") ? "selected=\"selected\"" : "" ); ?> value="Setor Público">Setor Público</option>
                  <option <?php echo (($params['txt_atuacao'] == "Tecnologia") ? "selected=\"selected\"" : "" ); ?> value="Tecnologia">Tecnologia</option>
                  <option <?php echo (($params['txt_atuacao'] == "Telecomunicações") ? "selected=\"selected\"" : "" ); ?> value="Telecomunicações">Telecomunicações</option>
                  <option <?php echo (($params['txt_atuacao'] == "Terceiro Setor") ? "selected=\"selected\"" : "" ); ?> value="Terceiro Setor">Terceiro Setor</option>
                  <option <?php echo (($params['txt_atuacao'] == "Turismo") ? "selected=\"selected\"" : "" ); ?> value="Turismo">Turismo</option>
                  <option <?php echo (($params['txt_atuacao'] == "Outro") ? "selected=\"selected\"" : "" ); ?> value="Outro">Outro</option>
                </select>
                <input type="text" id="txt_atuacao_other" value="<?php echo $params['txt_atuacao_other'] ?>" style="<?php echo (($params['txt_atuacao_other'] == "") ? "" : "display:inline-block;" ); ?>"  class="form_field swap_for_select" name="txt_atuacao_other" placeholder="Digite">
              </div>
              <div class="col-sm-12 col-md-6">
                <select id="txt_colaboradores" class="form_field" name="txt_colaboradores" required="required">
                  <option <?php echo (($params['txt_colaboradores'] == "") ? "selected=\"selected\"" : "" ); ?> value="">Número de colaboradores</option>
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
                <h3>QUAL MARCA VOCÊ VAI AVALIAR?</h3>
              </div>
              <div class="col-sm-12 col-md-4">
                <small>* campos obrigatórios</small>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12">
                <input type="text" id="txt_marca"  class="form_field" name="txt_marca" placeholder="Marca *" required="required">
              </div>

              <div class="col-sm-12 col-md-6">
                <select id="txt_seg_marca"  class="form_field swap_for_text" name="txt_seg_marca" required="required">
                  <option value="">Segmento da Marca *</option>
                  <option value="Agência de Publicidade">Agência de Publicidade</option>
                  <option value="Agropecuária">Agropecuária</option>
                  <option value="Alimentos e Bebidas">Alimentos e Bebidas</option>
                  <option value="Automotivo">Automotivo</option>
                  <option value="Bens de Consumo">Bens de Consumo</option>
                  <option value="Branding">Branding</option>
                  <option value="Casa e Decoração">Casa e Decoração</option>
                  <option value="Cultura, Esporte e Lazer">Cultura, Esporte e Lazer</option>
                  <option value="Comércio e Varejo">Comércio e Varejo</option>
                  <option value="Consultoria">Consultoria</option>
                  <option value="Educação">Educação</option>
                  <option value="Eletroeletrônicos">Eletroeletrônicos</option>
                  <option value="Energia">Energia</option>
                  <option value="Farmacêutico">Farmacêutico</option>
                  <option value="Financeiro">Financeiro</option>
                  <option value="Higiene e Beleza">Higiene e Beleza</option>
                  <option value="Imobiliário">Imobiliário</option>
                  <option value="Logística e Transporte">Logística e Transporte</option>
                  <option value="Mídia">Mídia</option>
                  <option value="Mineração e Metalurgia">Mineração e Metalurgia</option>
                  <option value="Moda">Moda</option>
                  <option value="Óleo e Gás">Óleo e Gás</option>
                  <option value="Química">Química</option>
                  <option value="Saúde">Saúde</option>
                  <option value="Seguros">Seguros</option>
                  <option value="Serviços Corporativos">Serviços Corporativos</option>
                  <option value="Serviços Jurídicos">Serviços Jurídicos</option>
                  <option value="Setor Público">Setor Público</option>
                  <option value="Tecnologia">Tecnologia</option>
                  <option value="Telecomunicações">Telecomunicações</option>
                  <option value="Terceiro Setor">Terceiro Setor</option>
                  <option value="Turismo">Turismo</option>
                  <option value="Outro">Outro</option>
                </select>
                <input type="text" id="txt_seg_marca_other"  class="form_field swap_for_select" name="txt_seg_marca_other" placeholder="Digite">
              </div>
              <div class="col-sm-12 col-md-6">
                <select id="txt_relacao_marca" class="form_field swap_for_text" name="txt_relacao_marca" required="required">
                  <option value="">Sua relação com ela *</option>
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
                <span class="text-left">Autorizo expressamente que a AC Company Ltda., seus parceiros e/ou colaboradores, entrem em contato pelas informações ora disponibilizadas para os fins de confirmação e/ou eventual aprofundamento das informações prestadas neste ato. Declaro, ainda, ter conhecimento de que, caso não ofereça minha autorização, a AC Company Ltda. poderá ser forçada a eliminar minha avaliação de seu sistema, na hipótese de impossibilidade de confirmação das informações apresentadas</span>
              </div>
            </div>

          </form>
        </div>
      </div>
      <?php /*
      <div class="col-1 page-intro p-0">
        <div class="sidebar sidebar-mobile" style="overflow:hidden;">
          <span class="title background--red-gradient border-radius-top wow fadeInLeft" data-wow-delay="2s">
            <p class="hidden-text">.</p>
          </span>
          <span class="title background--blue-gradient border-radius-top wow fadeInLeft" data-wow-delay="2.5s">
            <p class="hidden-text">.</p>
          </span>
          <span class="title background--green-gradient border-radius-top wow fadeInLeft" data-wow-delay="3s">
            <p class="hidden-text">.</p>
          </span>
        </div>
      </div> */ ?>
    </div>

    <div class="row">
      <div class="col-sm-12 button button--large background--orange wow fadeIn col-action-mobile_second" id="btn-send-result">
        <a href="quiz-mobile.html">COMEÇAR
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>


      <div class="col-sm-12 button button--large background--orange wow fadeIn col-action-mobile" style="display:none;">
        <a href="quiz-mobile.html">COMEÇAR
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
