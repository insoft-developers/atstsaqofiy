
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pondok Pesantren Ats Tsaqofiy</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">

    <!-- jQuery -->
  <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
</head>
<body style="background-color: black" class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div style="background-color: #0a5c10; color:white" class="card card-outline card-primary">
    <div class="card-header text-center">
      <center><img style="width: 60%;" src="<?php echo base_url();?>assets/images/logo.jpg"></center>
      <a href="javascript:void(0)" class="h1"><span style="font-size: 18px;">Sistem Absensi Guru</span><br><b>Ats Tsaqofiy</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url();?>index.php/Login/proseslogin" id="frmjatralogin" method="post">
        <div class="input-group mb-3">
          <input type="text" id="emailjatra" name="emailjatra" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="passwordjatra" name="passwordjatra" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 80px;">
         
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<script>
    $("#frmjatralogin").submit(function(e){
        e.preventDefault();
        $.ajax({
            url : "<?php echo base_url();?>index.php/Login/proseslogin",
            type : "POST",
            dataType: "JSON",
            data : $("#frmjatralogin").serialize(),
            success: function(data) {
                console.log(data);
                if(data.sukses == 'sukses'){
                    alert("Login Berhasil...!");
                    window.location = 'dashboard';
                }else{
                    alert("Login Failed...!");
                }
            }

        });

    });
</script>

</body>
</html>
