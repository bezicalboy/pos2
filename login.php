<?php
@ob_start();
session_start();
if (isset($_POST['proses'])) {
  require 'config.php';

  $user = strip_tags($_POST['user']);
  $pass = strip_tags($_POST['pass']);

  $sql = 'select member.*, login.user, login.pass
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';
  $row = $config->prepare($sql);
  $row->execute(array($user, $pass));
  $jum = $row->rowCount();
  if ($jum > 0) {
    $hasil = $row->fetch();
    $_SESSION['admin'] = $hasil;
    echo '<script>alert("Login Sukses");window.location="index.php"</script>';
  } else {
    echo '<script>alert("Login Gagal");history.go(-1);</script>';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/login/fonts/icomoon/style.css">

  <link rel="stylesheet" href="assets/login/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/login/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="assets/login/css/style.css">

  <title>Login</title>
</head>

<body>



  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                <div class="mb-4">
                  <h3>Sign In</h3>
                  <p class="mb-4">admin|123</p>
                </div>
                <form method="POST">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="user">

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="pass">

                  </div>

                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked" />
                      <div class="control__indicator"></div>
                    </label>

                  </div>

                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary" name="proses">


                </form>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="assets/login/js/jquery-3.3.1.min.js"></script>
  <script src="assets/login/js/popper.min.js"></script>
  <script src="assets/login/js/bootstrap.min.js"></script>
  <script src="assets/login/js/main.js"></script>
</body>

</html>