<?php

    session_start();

?>

<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



include("includes/db.php");

if(isset($_POST['submit'])) {

    $firstname          = mysqli_real_escape_string($conn, $_POST['firstname']);
    $surname            = mysqli_real_escape_string($conn, $_POST['surname']);
    $phone              = mysqli_real_escape_string($conn, $_POST['phone']);
    $email              = mysqli_real_escape_string($conn, $_POST['email']);
    $password           = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword    = mysqli_real_escape_string($conn, $_POST['confirmpassword']);


    if($password != $confirmpassword) {

        $_SESSION['message'] = "Password and Confirm Password not Matched";
        

    }
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    $count = mysqli_num_rows($query);

    if(empty($firstname) || empty($surname) || empty($phone) || empty($email) || empty($password) || empty($confirmpassword)) {

        $_SESSION['message'] = "Please fill all the required inputs";
   

    }

    if(strlen($phone) < 11 || strlen($phone) > 11) {

        $_SESSION['message'] = "Phone Number should contain 11 digits";
        
    }

    if($count != 0) {

        $_SESSION['message'] = "Email already registered";
        
        
    }else {

        if(strlen($password) <=8 ) {

            $_SESSION['message'] = "Password too weak; include characters!!! ";

        }else {

                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $email;


                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'dominicudofia@gmail.com';                     //SMTP username
                $mail->Password   = 'pass,luv';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                //Recipients
                $mail->setFrom('dominicudofia@gmail.com', 'Domnet Chemical Plc');
                $mail->addAddress($_POST['email']);                                  //Add a recipient


                //HTML body
                $mail->isHTML(true);
                $mail->Subject = "Your Email Verification Code";
                $mail->Body = "<p> Dear $surname,</p> 
                                <p>Thank you for Registering for the Programme</p> 
                                <h3>Your Verification Code is $otp <br> </h3>
                                <p>Use this code to verify your account. </p>
                                <br><br>
                                <p>Best Regards, </p>

                                <b>Domnet Chemical Plc Team</b>";


                if($mail->send()){

                    mysqli_query($conn, "INSERT INTO users (userID, firstname, surname, phone, email, password, con_password, otp, verify) VALUES('NULL', '$firstname', '$surname', '$phone', '$email', '$password', '$confirmpassword', '$otp', 0)");

                    ?>
                        <script>
                            alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                window.location.replace('verify_account.php');
                        </script>
                    <?php

                }else{

                    ?>
                        <script>
                            alert("<?php echo "Register Failed, Invalid Email "?>");
                        </script>
                    <?php

                                    
                }
            }
        }

    }else {

        //die();

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
                <form method="POST" action="" style="background-color: #fff; padding:40px; border-radius: 20px;">
                <label for="firstname">First name <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="firstname" type="text" value="" class="input form-control" id="firstname" placeholder="" required="true" aria-label="firstname" aria-describedby="basic-addon1" />
                        
                    </div>
                            
                    <label for="firstname">Surname <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="surname" type="text" value="" class="input form-control" id="surname" placeholder="" required="true" aria-label="surname" aria-describedby="basic-addon1" />
                        
                    </div>

                    <label for="firstname">Phone <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                        <input name="phone" type="text" value="" class="input form-control" id="phone" placeholder="" required="true" aria-label="phone" aria-describedby="basic-addon1" />
                        
                    </div>
                            
                    <label for="firstname">Email <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input name="email" type="email" value="" class="input form-control" id="email" placeholder="" required="true" aria-label="email" aria-describedby="basic-addon1" />
                        
                    </div>

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

                    

                    <button type="submit" name="submit" class="btn btn-success w-100">Submit</button>

                    <div class="terms text-center mt-3">
                        <p>Signing up signifies you've read and agree to our <br> 
                            <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </p>
                    </div>        

                    <div class="alt-login text-center">
                        <p>Already have an account? <a href="signin.php">Login here</a></p>
                    </div>
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