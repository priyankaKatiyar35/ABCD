<?php 
 include('dbConfig.php');

 $msg="";
  
if (isset($_POST['submit'])) {
 /* echo "<pre>";
  print_r($_POST);*/
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $sql = mysqli_query($conn,"select * from news_user where email='$email' && password='$password'");
  $num=mysqli_num_rows($sql);
  if ($num>0) {
    /*echo "login";*/
    $row=mysqli_fetch_assoc($sql);
    $_SESSION['USER_ID']=$row['id'];
    $_SESSION['UNSER_NAME']=$row['email'];
    header("location:index.php");
  }
  else{
    $msg="Please Enter Valid Details !";
  }
}





?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body background="photo/background.jpg" >
<section class="vh-100" >
  <div class="container py-4 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-8">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img style="height:40rem; border-radius: 1rem; " src="photo/loginimg.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>

            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="">
                        
                  <div class="error" style="color: red; text-align: center;">  
                          
                     </div>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Admin Login</span>
                  </div>
                  <h4  style="color: red"><?php echo "$msg";  ?></h4>


                  <!-- <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5> -->

                  <div class="form-outline mb-4">
                    <input type="email" id="email"   name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password"  name="password"  class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>