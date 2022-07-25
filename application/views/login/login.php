<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
	
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">	
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/font-awesome.css">
	
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/apps.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/apps_inner.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/res.css">
	
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
	
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
<!--font-family: 'Roboto', sans-serif;-->
	
<link href="https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&display=swap" rel="stylesheet"> 
<!--font-family: 'Gorditas', cursive;-->
	
</head>

<body>

<div class="loginmainDiv">
  <div class="loginBox">
	<div class="adminLogo"><img src="<?=base_url()?>assets/images/logo.png" alt="" height="80" width="80" /><b></b></div>
  <span class="confirm-div" style="float:right; color:red;"><?php if(null != $this->session->flashdata('err_message')) 
                  { echo $this->session->flashdata('err_message');};?></span>
	 <div class="fieldSec">
	<form action ="<?=base_url()?>index.php/auth/login" method="POST">

            <div class="form-group">
                  <input type="text" name="userid" class="form-control form-control-lg" id="userid" placeholder="Username" >
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                
              


              </form>
		</div>
  </div>
</div>
	
	
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );	
</script>

	
<!--<script src="js/classie.js"></script>	-->



<script src="js/bootstrap.min.js"></script>
<script src="js/main_javascript.js"></script>
<script src="js/main_jquery.js"></script>
</body>
</html>
