<?php
  include '.config/conn.php';
  include "base.php";
  base("includes/page.php");
  include("auth/checkpoint.php");
  include('includes/alert.php');
?>

<body style="background: url('{{ app.mainBG }}') no-repeat; background-size: cover" ng-init="form='<?php echo $form; ?>'">
  <?php 
    // $_SESSION['msg'] = 'o';
    // echo $_SESSION['msg'];
    // echo $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
  ?>

  <title> {{ form[0].toUpperCase() + form.substr(1).concat(" - ") }} {{ app.name }} </title>

  
  <div class="d-flex justify-content-center align-items-end align-items-md-center fixed-top h-100 w-100" ng-show="form === 'null'">
    
    <!-- Errors -->
    <div class="my-3">
      <?php if (count($errors) > 0) : ?>
        <?php foreach ($errors as $error) : ?>
          <?php alert('error', $error); ?>
        <?php endforeach ?>
      <?php endif ?>
    </div>
    <!-- End Errors -->


    <div class="px-4 py-5 my-5 text-center text-{{app.theme}}" style="background: rgba(255, 255, 255, 0.6);">
      <img class="d-block mx-auto mb-4 float-left" src="{{ app.logo }}" alt="" width="72" height="57">

      <h1 class="display-5 fw-bold"> Welcome to {{ app.name }} </h1>
      <div class="col-lg-6 mx-auto">
        <p class="font-italic font-weight-bold mb-4"> {{ app.shortDescription }} </p>
        <button type="button" class="btn btn-{{app.theme}} btn-lg px-4 gap-3" ng-click="form = 'login'" name="toLogin"> Login </button>
      </div>
    </div>
  </div>

  <!-- Login -->
  <div ng-show="form === 'login'">
    <?php include "auth/login.php"; ?>
  </div>

  <!-- Sign Up -->
  <div ng-show="form === 'signup'">
    <?php include "auth/signup.php"; ?>
  </div>
  
</body>