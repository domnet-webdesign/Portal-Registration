<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domnet Chemical Plc </title>

    <!-- Assets CSS Files -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/style.css" rel="stylesheet">
</head>
<body style="background-color: #f2f5f7;">

    <div class="container">
        <div class="verify_center">
            <div class="verify">
                <form action="#" method="POST" style="background-color: #fff; padding:40px; border-radius: 20px;">
                    <h2 class="display-4 text-center">Verify your Account</h2>
                    <div class="input-field">
                        <input type="text" class="form-control w-100" placeholder="OTP Code" name="otp_code" id="code">
                    </div><br>
                    <input type="submit" value="Verify" class="form-control w-100 btn btn-success" name="check_code">
                </form>
            </div>
        </div>
    </div>


    <!-- Assets JS Files -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

    include("includes/db.php");

    if(isset($_POST['check_code'])) {

        $otp_num = $_SESSION['otp'];
        $email = $_SESSION['email'];
        $otp = $_POST['otp_code'];

        if($otp_num != $otp) {
            

            ?>
                <script>
                    alert("Invalid OTP Code");
                </script>

            <?php

        }else {
            mysqli_query($conn, "UPDATE users SET verify = 1 WHERE email = '$email'");

            ?>
                <script>
                    alert("Your Account Verification Sucessful");
                    window.location.replace("signin.php")
                </script>

            <?php

        }


    }

?>