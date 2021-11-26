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


    if(isset($_POST["recover"])){


        include('includes/db.php');

        $email = $_POST["email"];

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["verify"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("signin.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
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
            $mail->Subject = "Password Reset";
            $mail->Body = "<p> Dear $surname,</p> 
                            <p>Your requested for a Password reset on your account</p>
                            <p>Kindly click the below link to reset your password</p>
                            http://localhost/portal/reset_psw.php
                            <br><br>
                            <p>If you did not make this request kindly contact our support center immediately</p>
                            <br><br>
                            <p>Best Regards, </p>

                            <b>Domnet Chemical Plc Team</b>";

                            if($mail->send()){
            
                                ?>
                                    <script>
                                        alert("<?php echo "Password Reset link successfully sent to " . $email ?>");
                                            window.location.replace('signin.php');
                                    </script>
                                <?php
            
                            }else{
            
                                ?>
                                    <script>
                                        alert("<?php echo "Request Failed, Invalid Email "?>");
                                    </script>
                                <?php
            
                                                
                            }
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
            
            <div class="mt-5 d-flex justify-content-center">
                <form method="POST" action="" style="background-color: #fff; padding:40px; border-radius: 20px;">
                            
                    <label for="firstname">Email <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input name="email" type="email" value="" class="input form-control" id="email" autofocus placeholder="" required="true" aria-label="email" aria-describedby="basic-addon1" />
                        
                    </div>

                    <button type="submit" name="recover" class="btn btn-success w-100">Reset Password</button>       

                    <div class="alt-login text-center"><br>
                        <p>Already have an account? <a href="signin.php">Login here</a></p>
                    </div>
                </form>
            </div>    
        </section>


    <!-- Main CSS File -->
    <link href="assets/main.js">

    <!-- Assets JS Files -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>