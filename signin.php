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
                        <input name="email" type="email" value="" class="input form-control" id="email" placeholder="" required="true" aria-label="email" aria-describedby="basic-addon1" />
                        
                    </div>

                    <label for="firstname">Password <span class="important">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                        <input name="password" type="password" value="" class="input form-control" id="lg_password" placeholder="" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="fa fa-eye" id="lg_show_eye"></i>
                            </span>


                            <script type="text/javascript"> 

                                const lg_password = document.querySelector("#lg_password");
                                const lg_show_eye = document.querySelector("#lg_show_eye");


                                lg_show_eye.addEventListener("click", function(g) {

                                    // const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                    // password.setAttribute('type', type);
                                    // this.classList.toggle('fa-eye-slash'); 

                                    if (lg_password.getAttribute('type') === 'password') {

                                        lg_password.setAttribute('type', "text");
                                        this.classList.add('fa-eye-slash');
                                        this.classList.remove('fa-eye'); 

                                    }else{
                                    
                                        lg_password.setAttribute('type', "password");
                                        this.classList.add('fa-eye');
                                        this.classList.remove('fa-eye-slash'); 
                                    }

                                });


                            </script>

                        </div>
                    </div>

                    <button type="submit" name="save" class="btn btn-success w-100">Login</button>

                    <div class="terms text-center mt-3">
                        <p>Signing up signifies you've read and agree to our <br> 
                            <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </p>
                    </div>        

                    <div class="alt-login text-center">
                        <p>Already have an account? <a href="signup.php">Register here</a></p>
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