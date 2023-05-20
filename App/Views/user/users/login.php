<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $lang["login_user_panel"]; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo assets('user/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo assets('user/adminlte-3/css/adminlte.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo assets('user/plugins/iCheck/square/blue.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link type="text/css" rel="stylesheet" href="https://cdn.rawgit.com/rastikerdar/vazir-font/v18.0.0/dist/font-face.css">

  <style>
  body{
       font-family: 'Vazir', sans-serif !important;
  }

  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
<?php echo $lang["user_panel"]; ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-card">
    <p class="login-box-msg"><?php echo $lang["login_user_panel"]; ?></p>

    <form action="<?php echo url('/user/login/submit'); ?>" method="post" id="login-form">
      <div id="login-results" style="font-weight: bold;text-align:center;"></div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="<?php echo $lang["email"]; ?>" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="<?php echo $lang["password"]; ?>" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> <?php echo $lang["dont_forgot_me"]; ?>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo $lang["login"]; ?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-card -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo assets('user/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo assets('user/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo assets('user/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
  $(function () {
      var flag = false;
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    loginResults = $('#login-results');

    $('#login-form').on('submit' , function (e) {
        e.preventDefault();

        if (flag === true) {
            return false;
        }

        form = $(this);

        requestUrl = form.attr('action');

        requestMethod = form.attr('method');

        requestData = form.serialize();

        $.ajax({
            url: requestUrl,
            type: requestMethod,
            data: requestData,
            dataType: 'json',
            beforeSend: function () {
                flag = true;
                $('button').attr('disabled' , true);
                loginResults.removeClass().addClass('alert alert-info').html('<?php echo $lang["login"]; ?> ...');
            },
            success: function (results) {
                if (results.errors) {
                    loginResults.removeClass().addClass('alert alert-danger').html(results.errors);
                    $('button').removeAttr('disabled');
                    flag = false;
                } else if (results.success) {
                    loginResults.removeClass().addClass('alert alert-success').html(results.success);

                    if (results.redirect) {
                        window.location.href = results.redirect;
                    }
                }
            }
        });

    });

  });
</script>
</body>
</html>
