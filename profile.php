<?php session_start(); ?>

<?php 

        //include('includes/db.php');

        if(isset($_POST['submit'])) {

            $firstname      =   $_POST['firstname'];
            $surname        =   $_POST['surname'];
            $othername      =   $_POST['othername'];
            $phone          =   $_POST['phone'];
            $email          =   $_POST['email'];
            $gender         =   $_POST['gender'];
            $dob            =   $_POST['dob'];
            $nysc           =   $_POST['nysc'];
            $cert_nos       =   $_POST['cert_nos'];
            $country_origin =   $_POST['country_origin'];
            $state_origin   =   $_POST['state_origin'];
            $lga_origin     =   $_POST['lga_origin'];
            $res_country    =   $_POST['res_country'];
            $res_state      =   $_POST['res_state'];
            $res_address    =   $_POST['res_address'];


            if(empty($firstname) || empty($surname) || empty($othername) || empty($phone) || empty($email) || empty($gender) || empty($dob) || empty($nysc) || empty($cert_nos) || empty($country_origin) || empty($state_origin) || empty($lga_origin) || empty($res_country) || empty($res_state) || empty($res_address)) {

                //$_SESSION['message'] = "Please fill all the required inputs";
                ?>

                    <script>
                        alert("Please fill all the required inputs to continue");
                    </script>

                <?php
           
        
            }else {

                $sql = "INSERT INTO profile (profileID, firstname, surname, other_name, phone, email, gender, date_of_birth, nysc, nysc_cert_no, country_origin, state_origin, lga_origin, residence_country, residence_state, residential_address)
                VALUES('NULL', '$firstname', '$surname', '$othername', '$phone', '$email', '$gender', '$dob', '$nysc', '$cert_nos', '$country_origin', '$state_origin', '$lga_origin', '$res_country', '$res_state', '$res_address')";

                $data = mysqli_query($conn, $sql);


                if($data == true) {

                    ?>

                        <script>
                            alert("<?php echo "Profile Successfully Submitted" ?>");
                                window.location.replace('olevel.php');
                        </script>

                    <?php

                }else {

                    ?>

                        <script>
                            alert("<?php echo "Profile Not Submitted" ?>");
                        </script>

                    <?php

                }


            }

        }
        // elseif(isset($_POST['save'])) {

        // }
        else {
            
            
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
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 600;" class="nav-link" href="contact.php"><?php echo $_SESSION['auth_user']['user_email']; ?> </a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 600;" class="nav-link" href="contact.php">Logout</a>
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

    <!--  -->
    <section>
        <nav aria-label="breadcrumb" role="navigation">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    <li class="breadcrumb-item"><a href="olevel.php">Olevel</a></li>
                    <li class="breadcrumb-item"><a href="education.php">Education</a></li>
                    <li class="breadcrumb-item"><a href="document.php">Document/passport</a></li>
                    <li class="breadcrumb-item"><a href="single-page.php">Single Page</a></li>
                </ol>
            </div>
        </nav>
    </section>

    <!-- Main Container -->
        <section class="container">
            <h1 class="display-5 mt-5" style="font-size: 1em;">Opening: Graduate Trainee Programme | Domnet Chemical Plc</h1>
            <p style="color: red; font-weight: 500;"><span>NOTE:</span> You have not applied for this opening until you 
            click on the "Submit Application" button in the single page section</p>
         
            <form action="" method="POST" style="width: 50%; left:50%; position: absolute; transform: translate(-50%); background-color: #fff; padding:40px; border-radius: 20px;">
                            
                <label for="firstname">Firstname <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border_form" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input value="<?php echo $_SESSION['auth_user']['user_firstname']; ?>" name="firstname" disabled type="text" class="input form-control border_form" id="firstname" placeholder="" required="true" aria-label="firstname" aria-describedby="basic-addon1" />
                        
                    </div>  
                    
                <label for="surname">Surname <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border_form" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input value="<?php echo $_SESSION['auth_user']['user_surname']; ?>" name="surname" disabled type="text" class="input form-control border_form" id="surname" placeholder="" required="true" aria-label="surname" aria-describedby="basic-addon1" />
                        
                    </div>

                    <label for="firstname">Other Name <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border_form" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="othername" type="text" value="" class="input form-control border_form" id="othername" placeholder="" required="true" aria-label="othername" aria-describedby="basic-addon1" />
                        
                    </div>

                    <label for="firstname">Phone <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border_form" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                        <input value="<?php echo $_SESSION['auth_user']['user_phone']; ?>" name="phone" disabled type="text" class="input form-control border_form" id="phone" placeholder="" required="true" aria-label="phone" aria-describedby="basic-addon1" />
                        
                    </div>

                    <label for="firstname">Email <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border_form" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input value="<?php echo $_SESSION['auth_user']['user_email']; ?>" name="email" disabled type="email" class="input form-control border_form" id="email" placeholder="" required="true" aria-label="email" aria-describedby="basic-addon1" />
                        
                    </div>
                    
                    <label for="">Gender <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <select class="form-control border_form" name="gender">
                            <option> -- Select -- </option>    
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Date of Birth <span class="important">*</span></label>
                        <input name="dob" type="date" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Completed NYSC? <span class="important">*</span></label>
                        <select name="nysc" class="form-control border_form">
                            <option> -- Select -- </option>    
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Certificate Number <span class="important">*</span></label>
                        <input name="cert_nos" type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Country of Origin <span class="important">*</span></label>
                        <input name="country_origin" disabled value="Nigeria" type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">State of Origin <span class="important">*</span></label>
                        <input name="state_Origin" type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">LGA of Origin <span class="important">*</span></label>
                        <input name="lga_origin" type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Country of Residence <span class="important">*</span></label>
                        <input name="res_country" disabled value="Nigeria" type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">State of Residence <span class="important">*</span></label>
                        <input name="res_state" type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Residential Address <span class="important">*</span></label>
                        <input name="res_address" type="text" class="form-control border_form" id="" placeholder="">
                    </div>

                    <!-- <button type="save" class="btn btn-success">Save</button> -->
                    <button type="submit" class="btn btn-success">Save & Continue</button>
                
            </form>

    </section>

    <!-- Assets JS Files -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>