<?php

function my_autoloader($class) {
    $class = str_replace("\\", "/", $class);
    require_once "$class.php";
}
spl_autoload_register('my_autoloader');

use acwaves\ReadJson;
?>
<div class="col-2 gradient-sidebar p-0">
  <div class="page-quiz">
    <div class="header header-previous">
      <h2 class="number number-previos"></h2>
    </div>
  </div>

  <!-- SIDEBAR -->
  <div class="sidebar page-quiz">
    <span class="title background--red-gradient bottom wow fadeInLeft" data-wow-duration="0.5s"><?php echo substr(ReadJson::onlyZone(1)->name,0,1)?></span>
    <span class="title background--blue-gradient bottom wow fadeInLeft" data-wow-duration="0.7s"><?php echo substr(ReadJson::onlyZone(2)->name,0,1)?></span>
    <span class="title background--green-gradient bottom wow fadeInLeft" data-wow-duration="0.9s"><?php echo substr(ReadJson::onlyZone(3)->name,0,1)?></span>
  </div>
</div>
<!-- //SIDEBAR -->
<!-- SECOND-->
<div class="col page-quiz page-quiz-second page-quiz-opened  gradient-sidebar p-0 page-quiz-1">
  <div class="header wow fadeIn" data-wow-duration="1s">
    <h2 class="number">0<?php echo ReadJson::onlyWave(1)->number?></h2>
    <h3 class="title "><?php echo ReadJson::onlyWave(1)->name ?></h3>
    <span class="explaining"><?php echo ReadJson::onlyWave(1)->desc; ?></span>
  </div>

  <div class="sidebar" style="overflow:hidden;">
    <div class="content  wow fadeInLeft" data-wow-duration="1.2s">
      <span class="title background--red-gradient">
        <div><?php echo ReadJson::onlyQuestion(1,1)->title ?></div>
      </span>
      <span class="question "><?php echo ReadJson::onlyQuestion(1,1)->question ?></span>
      <div class="radio-toolbar radio--red ">
        <input type="radio" id="question_1_1_0" name="question_1_1" value="0" >
        <label for="question_1_1_0">0</label>

        <input type="radio" id="question_1_1_1" name="question_1_1" value="1" >
        <label for="question_1_1_1">1</label>

        <input type="radio" id="question_1_1_2" name="question_1_1" value="2">
        <label for="question_1_1_2">2</label>

        <input type="radio" id="question_1_1_3" name="question_1_1" value="3">
        <label for="question_1_1_3">3</label>

        <input type="radio" id="question_1_1_4" name="question_1_1" value="4">
        <label for="question_1_1_4">4</label>

        <input type="radio" id="question_1_1_5" name="question_1_1" value="5">
        <label for="question_1_1_5">5</label>
      </div>
    </div>

    <div class="content  wow fadeInLeft" data-wow-duration="1.3s">
      <span class="title background--blue-gradient">
        <div><?php echo ReadJson::onlyQuestion(2,1)->title ?></div>
      </span>
      <span class="question "><?php echo ReadJson::onlyQuestion(2,1)->question ?></span>
      <div class="radio-toolbar radio--blue ">
        <input type="radio" id="question_2_1_0" name="question_2_1" value="0" >
        <label for="question_2_1_0">0</label>

        <input type="radio" id="question_2_1_1" name="question_2_1" value="1" >
        <label for="question_2_1_1">1</label>

        <input type="radio" id="question_2_1_2" name="question_2_1" value="2">
        <label for="question_2_1_2">2</label>

        <input type="radio" id="question_2_1_3" name="question_2_1" value="3">
        <label for="question_2_1_3">3</label>

        <input type="radio" id="question_2_1_4" name="question_2_1" value="4">
        <label for="question_2_1_4">4</label>

        <input type="radio" id="question_2_1_5" name="question_2_1" value="5">
        <label for="question_2_1_5">5</label>
      </div>
    </div>

    <div class="content  wow fadeInLeft" data-wow-duration="1.5s">
      <span class="title background--green-gradient">
        <div><?php echo ReadJson::onlyQuestion(3,1)->title ?></div>
      </span>
      <span class="question "><?php echo ReadJson::onlyQuestion(3,1)->question ?></span>
      <div class="radio-toolbar radio--green ">
        <input type="radio" id="question_3_1_0" name="question_3_1" value="0" >
        <label for="question_3_1_0">0</label>

        <input type="radio" id="question_3_1_1" name="question_3_1" value="1" >
        <label for="question_3_1_1">1</label>

        <input type="radio" id="question_3_1_2" name="question_3_1" value="2">
        <label for="question_3_1_2">2</label>

        <input type="radio" id="question_3_1_3" name="question_3_1" value="3">
        <label for="question_3_1_3">3</label>

        <input type="radio" id="question_3_1_4" name="question_3_1" value="4">
        <label for="question_3_1_4">4</label>

        <input type="radio" id="question_3_1_5" name="question_3_1" value="5">
        <label for="question_3_1_5">5</label>
      </div>
    </div>
  </div>
</div>
<!-- //SECOND -->
<!-- THIRD -->
<div class="col page-quiz page-quiz-first gradient p-0 wow fadeInRight page-quiz-next page-quiz-2" data-wow-delay=".5s" data-wow-duration="1s">
  <div class="header">
    <h2 class="number">0<?php echo ReadJson::onlyWave(2)->number?></h2>
    <h3 class="title"><?php echo ReadJson::onlyWave(2)->name ?></h3>
    <span class="explaining">
    <?php
      $desc = ((empty(ReadJson::onlyWave(2)->desc)) ? ReadJson::onlyWave(1)->desc : ReadJson::onlyWave(2)->desc );
      if(!empty($desc)){ echo $desc; }
    ?>
    </span>
  </div>
  <div class="sidebar">
    <div class="content">
      <span class="title background--red-gradient"><div><?php echo ReadJson::onlyQuestion(1,2)->title ?></div></span>
      <span class="question"><?php echo ReadJson::onlyQuestion(1,2)->question ?></span>
      <div class="radio-toolbar radio--red">
        <input type="radio" id="question_1_2_0" name="question_1_2" value="0" >
        <label for="question_1_2_0">0</label>

        <input type="radio" id="question_1_2_1" name="question_1_2" value="1" >
        <label for="question_1_2_1">1</label>

        <input type="radio" id="question_1_2_2" name="question_1_2" value="2">
        <label for="question_1_2_2">2</label>

        <input type="radio" id="question_1_2_3" name="question_1_2" value="3">
        <label for="question_1_2_3">3</label>

        <input type="radio" id="question_1_2_4" name="question_1_2" value="4">
        <label for="question_1_2_4">4</label>

        <input type="radio" id="question_1_2_5" name="question_1_2" value="5">
        <label for="question_1_2_5">5</label>
      </div>
    </div>

    <div class="content">
      <span class="title background--blue-gradient"><div><?php echo ReadJson::onlyQuestion(2,2)->title ?></div></span>
      <span class="question"><?php echo ReadJson::onlyQuestion(2,2)->question ?></span>
        <div class="radio-toolbar radio--blue">
          <input type="radio" id="question_2_2_0" name="question_2_2" value="0" >
          <label for="question_2_2_0">0</label>

          <input type="radio" id="question_2_2_1" name="question_2_2" value="1" >
          <label for="question_2_2_1">1</label>

          <input type="radio" id="question_2_2_2" name="question_2_2" value="2">
          <label for="question_2_2_2">2</label>

          <input type="radio" id="question_2_2_3" name="question_2_2" value="3">
          <label for="question_2_2_3">3</label>

          <input type="radio" id="question_2_2_4" name="question_2_2" value="4">
          <label for="question_2_2_4">4</label>

          <input type="radio" id="question_2_2_5" name="question_2_2" value="5">
          <label for="question_2_2_5">5</label>
        </div>
    </div>

    <div class="content">
      <span class="title background--green-gradient"><div><?php echo ReadJson::onlyQuestion(3,2)->title ?></div></span>
      <span class="question"><?php echo ReadJson::onlyQuestion(3,2)->question ?></span>
      <div class="radio-toolbar radio--green">
        <input type="radio" id="question_3_2_0" name="question_3_2" value="0" >
        <label for="question_3_2_0">0</label>

        <input type="radio" id="question_3_2_1" name="question_3_2" value="1" >
        <label for="question_3_2_1">1</label>

        <input type="radio" id="question_3_2_2" name="question_3_2" value="2">
        <label for="question_3_2_2">2</label>

        <input type="radio" id="question_3_2_3" name="question_3_2" value="3">
        <label for="question_3_2_3">3</label>

        <input type="radio" id="question_3_2_4" name="question_3_2" value="4">
        <label for="question_3_2_4">4</label>

        <input type="radio" id="question_3_2_5" name="question_3_2" value="5">
        <label for="question_3_2_5">5</label>
      </div>
    </div>
  </div>
</div>
<!-- //THIRD -->

<!-- FOURTH -->
<div class="col page-quiz page-quiz-fourth gradients-sidebar p-0 page-quiz-hide wow fadeInRight page-quiz-3" data-wow-delay="1s" data-wow-duration="1s">
  <div class="header">
    <h2 class="number">0<?php echo ReadJson::onlyWave(3)->number?></h2>
    <h3 class="title"><?php echo ReadJson::onlyWave(3)->name ?></h3>
    <span class="explaining">
    <?php
      $desc = ((empty(ReadJson::onlyWave(3)->desc)) ? ReadJson::onlyWave(1)->desc : ReadJson::onlyWave(3)->desc );
      if(!empty($desc)){ echo $desc; }
    ?>
    </span>
  </div>

  <div class="sidebar">
    <div class="content">
      <span class="title background--red-gradient">
        <div><?php echo ReadJson::onlyQuestion(1,3)->title ?></div>
      </span>
      <span class="question"><?php echo ReadJson::onlyQuestion(1,3)->question ?></span>
      <div class="radio-toolbar radio--red">
        <input type="radio" id="question_1_3_0" name="question_1_3" value="0" >
        <label for="question_1_3_0">0</label>

        <input type="radio" id="question_1_3_1" name="question_1_3" value="1" >
        <label for="question_1_3_1">1</label>

        <input type="radio" id="question_1_3_2" name="question_1_3" value="2">
        <label for="question_1_3_2">2</label>

        <input type="radio" id="question_1_3_3" name="question_1_3" value="3">
        <label for="question_1_3_3">3</label>

        <input type="radio" id="question_1_3_4" name="question_1_3" value="4">
        <label for="question_1_3_4">4</label>

        <input type="radio" id="question_1_3_5" name="question_1_3" value="5">
        <label for="question_1_3_5">5</label>
      </div>
    </div>

    <div class="content">
      <span class="title background--blue-gradient">
        <div><?php echo ReadJson::onlyQuestion(2,3)->title ?></div>
      </span>
      <span class="question"><?php echo ReadJson::onlyQuestion(2,3)->question ?></span>
      <div class="radio-toolbar radio--blue">
        <input type="radio" id="question_2_3_1" name="question_2_3" value="1" >
        <label for="question_2_3_1">1</label>

        <input type="radio" id="question_2_3_2" name="question_2_3" value="2">
        <label for="question_2_3_2">2</label>

        <input type="radio" id="question_2_3_3" name="question_2_3" value="3">
        <label for="question_2_3_3">3</label>

        <input type="radio" id="question_2_3_4" name="question_2_3" value="4">
        <label for="question_2_3_4">4</label>

        <input type="radio" id="question_2_3_5" name="question_2_3" value="5">
        <label for="question_2_3_5">5</label>
      </div>
    </div>

    <div class="content">
      <span class="title background--green-gradient">
        <div class=""><?php echo ReadJson::onlyQuestion(3,3)->title ?></div>
      </span>
      <span class="question"><?php echo ReadJson::onlyQuestion(3,3)->question ?></span>
      <div class="radio-toolbar radio--green">
        <input type="radio" id="question_3_3_0" name="question_3_3" value="0" >
        <label for="question_3_3_0">0</label>

        <input type="radio" id="question_3_3_1" name="question_3_3" value="1" >
        <label for="question_3_3_1">1</label>

        <input type="radio" id="question_3_3_2" name="question_3_3" value="2">
        <label for="question_3_3_2">2</label>

        <input type="radio" id="question_3_3_3" name="question_3_3" value="3">
        <label for="question_3_3_3">3</label>

        <input type="radio" id="question_3_3_4" name="question_3_3" value="4">
        <label for="question_3_3_4">4</label>

        <input type="radio" id="question_3_3_5" name="question_3_3" value="5">
        <label for="question_3_3_5">5</label>
      </div>
    </div>
  </div>
</div>
<!-- //FOURTH -->
