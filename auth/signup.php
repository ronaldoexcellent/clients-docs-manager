<div class="container mt-3">
  <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="validate.php">
    <img class="d-block mx-auto float-left" src="{{ app.logo }}" alt="logo" width="72" height="57">
    <h4 class="text-center text-{{ app.theme }} mb-4"> Sign Up </h4>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingName" placeholder="Full Name" maxlength="255" required>
      <label for="floatingName">Full Name</label>
    </div>  

    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingEmail" maxlength="255" placeholder="name@example.com" required>
      <label for="floatingEmail">Email address</label>
    </div>

    <div class="form-floating mb-3">
      <input type="tel" class="form-control" id="floatingTel" placeholder="Mobile No" maxlength="255" required>
      <label for="floatingTel">Mobile No</label>
    </div>

    <div class="mb-3">
      <label for="photo" class="mb-2 ps-2 font-weight-bold text-{{app.theme}}">Passport Photograph</label>
      <input type="file" class="form-control" id="photo" required>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" maxlength="255" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="font-weight-bold checkbox mb-3 text-{{app.theme}}">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>

    <button class="w-100 btn btn-lg btn-{{app.theme}}" type="submit">Sign Up</button>

    <hr class="my-2">

    <div class="text-{{app.theme}} text-center">
      <small> By clicking Sign up, you agree to the terms of use. </small>
    </div>

    <hr class="my-2">

    <div class="text-center">
      Already have an account? <a href="javascript:void(0)" ng-click="form = 'login'" class="text-{{app.theme}} font-weight-bold"> Login </a>
    </div>
  </form>
</div>