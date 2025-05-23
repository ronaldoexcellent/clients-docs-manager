<div class="container mt-3">
  <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" onsubmit="setForm()" action="<?php baseUrl('/'); ?>">
    <img class="d-block mx-auto float-left" src="{{ app.logo }}" alt="logo" width="72" height="57">
    <h4 class="text-center text-{{ app.theme }} mb-2"> Login </h4>

    <!-- Errors -->
    <div class="my-3">
      <?php if (count($errors) > 0) : ?>
        <?php foreach ($errors as $error) : ?>
          <div class="fst-italic text-center fs-6 text-danger fw-bold">
            * <?php echo $error; ?> * <br>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    </div>
    <!-- End Errors -->
    
    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" id="floatingInput" maxlength="255" placeholder="name@example.com" value="<?php echo $email; ?>">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="pwd" class="form-control" id="floatingPassword" maxlength="255" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div role="button" class="user-select-none fw-bold checkbox mb-3 text-{{app.theme}}">
      <input role="button" id="remember-me" type="checkbox" class="form-check-input bg-{{ app.theme }}" value="remember-me">
      <label role="button" for="remember-me"> Remember me </label>
    </div>

    <button class="w-100 btn btn-lg btn-{{app.theme}}" type="submit" name="login">Login</button>

    <div class="text-center mt-2">
      <a href="javascript:void(0)" ng-click="form = 'signup'" class="text-{{ app.theme }} fw-bold font-style-italic"> Forgot Password </a>
    </div>

    <hr class="my-4">

    <div class="text-center fst-italic">
      Don't have an account? <a href="javascript:void(0)" ng-click="form = 'signup'" class="text-{{app.theme}} fw-bold"> Sign Up </a>
    </div>
  </form>

  <script>
    // Use JavaScript on this form
    const setForm = () => {};
  </script>
</div>