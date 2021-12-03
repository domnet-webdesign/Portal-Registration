<?php

    session_start();

?>

<?php
    if(isset($_POST["reset_password"])){


        include('includes/db.php');

        $psw = $_POST["password"];
        $con_psw = $_POST["confirmpassword"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        //$hash = password_hash( $psw , PASSWORD_DEFAULT );

        if($psw == $con_psw) {

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$Email'");
            $query = mysqli_num_rows($sql);
  	        $fetch = mysqli_fetch_assoc($sql);


            if($Email){
                //$new_pass = $hash;
                mysqli_query($conn, "UPDATE users SET password='$psw', con_password='$con_psw' WHERE email='$Email'");
                ?>
                <script>
                    window.location.replace("signin.php");
                    alert("<?php echo "your password has been succesful reset"?>");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("<?php echo "Please try again"?>");
                </script>
                <?php
            }


        }else {

            ?>
            <script>
                alert("<?php echo "Password Not Matched"?>");
            </script>
            <?php

        }

        
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domnet Chemical Plc</title>

    <!-- Assets CSS Files -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/style.css" rel="stylesheet">
</head>
<body style="background-color: #f2f5f7;">

    <section id="navbar-container">
        <nav class="navbar navbar-expand-lg" style="background-color: #275d2b;">
            <div class="container">
                <a class="navbar-brand" style="color: #fff; font-size: 2em; font-weight: bold;" href="home.php">DOMNET</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a style="color: #fff; font-weight: 600;" class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 600;" class="nav-link" href="openings.php">Openings</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 600;" class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a style="color: #fff; font-weight: 600;" class="nav-link" href="signup.php">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a style="color: #fff; font-weight: 600;" class="nav-link" href="signin.php">Signin</a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </section>

    <!-- Main Container -->
        <section class="container">
            <h1 class="display-5 mt-5" style="font-size: 1em;">Opening: Graduate Trainee Programme | Domnet Chemical Plc</h1>
            <p style="color: red; font-weight: 500;"><span>NOTE:</span> You have not applied for this opening until you 
        click on the "Submit Application" button in the single page section</p>

            <?php include('includes/message.php'); ?>

            <div class="mt-5 d-flex justify-content-center">
                <form method="POST" action="" style="background-color: #fff; padding:20px; border-radius: 20px;">
                <h2 class="display-5 text-center">Reset Your Password</h2>
                    <label for="firstname">Password <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                        <input name="password" type="password" value="" class="input form-control" id="password" placeholder="" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="fa fa-eye" id="show_eye"></i>
                            </span>

                            <script type="text/javascript"> 

                                const password = document.querySelector("#password");
                                const show_eye = document.querySelector("#show_eye");
                        

                                show_eye.addEventListener("click", function(a) {

                                    // const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                    // password.setAttribute('type', type);
                                    // this.classList.toggle('fa-eye-slash'); 

                                    if (password.getAttribute('type') === 'password') {

                                        password.setAttribute('type', "text");
                                        this.classList.add('fa-eye-slash');
                                        this.classList.remove('fa-eye'); 

                                    }else{
                                    
                                        password.setAttribute('type', "password");
                                        this.classList.add('fa-eye');
                                        this.classList.remove('fa-eye-slash'); 
                                    }

                                });
                            
                                
                            </script>

                        </div>


                    </div>

                    <label for="firstname"> Confirm Password <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                        <input name="confirmpassword" type="password" value="" class="input form-control" id="cf_password" placeholder="" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="">
                            <i class="fa fa-eye" id="cf_show_eye"></i>
                            </span>


                            <script type="text/javascript"> 

                                const cf_password = document.querySelector("#cf_password");
                                const cf_show_eye = document.querySelector("#cf_show_eye");


                                cf_show_eye.addEventListener("click", function(h) {

                                    // const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                    // password.setAttribute('type', type);
                                    // this.classList.toggle('fa-eye-slash'); 

                                    if (cf_password.getAttribute('type') === 'password') {

                                        cf_password.setAttribute('type', "text");
                                        this.classList.add('fa-eye-slash');
                                        this.classList.remove('fa-eye'); 

                                    }else{
                                    
                                        cf_password.setAttribute('type', "password");
                                        this.classList.add('fa-eye');
                                        this.classList.remove('fa-eye-slash'); 
                                    }

                                });


                            </script>

                        </div>
                    </div>

                    

                    <button type="submit" name="reset_password" class="btn btn-success w-100">Submit</button>
                </form>
            </div>    
        </section>















    <!-- Main CSS File -->
    <!-- <link href="assets/main.js"> -->

    <!-- Assets JS Files -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>