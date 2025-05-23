<!-- Update Database With New Client Data --><?php 
  // session_start();
?>
<?php include "../../base.php"; ?>
<?php base("includes/page.php"); ?>

<body style="background: url('{{ app.mainBG }}') no-repeat; background-size: cover;">

  <title> Update Record - {{ app.name }} </title>

  <main>
    <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = '';
      }
    ?>

    <div class="container mt-3">
      <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="processing.php"  enctype="multipart/form-data">
        <img class="d-block mx-auto float-left" src="{{ app.logo }}" alt="logo" width="72" height="57">
        <h4 class="text-center text-{{ app.theme }} mb-2"> Add A New Record </h4>

        <!-- Errors -->
        <div class="mt-3">
          <?php
            if (isset($_SESSION['message'])) {
              if (count($_SESSION['errors']) > 0)  {
                foreach ($_SESSION['errors'] as $error) {
                  echo '
                    <div class="fst-italic text-center fs-6 text-danger fw-bold">
                      * '.$error.' *
                    </div> <br>
                  ';
                }
              }
            }
          ?>
        </div>
        <!-- End Errors -->

        <div class="form-floating mt-5">
          <input type="text" name="customer_name" class="form-control" id="floatingName" maxlength="255" placeholder="customer_name">
          <label for="floatingName">Customer Name</label>
        </div>

        
        <div class="mt-5">
          <label class="form-label" for="customFile"><button name="file_upload">Upload File</button></label>
          <input type="file" class="form-control" id="file_to_upload" name="file_to_upload" value="Upload File">
        </div>

        <div class="form-floating mt-5">
          <input type="text" name="file_title" class="form-control" id="file_title" maxlength="255" placeholder="title_auto_generated" readonly disabled>
          <label for="file_title">File Title</label>
        </div>

        <button class="w-100 mt-5 btn btn-lg btn-{{app.theme}}" type="submit" name="update">Update</button>
      </form>
    </div>

  </main>

</body>

<!-- Processing -->

<!-- End Processing -->