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
<body>

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
            
            <div class="b-center mt-5">
                <form class="bb-center" method="POST" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First name <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id=""  placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Surname <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email <span class="important">*</span></label>
                        <input type="email" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Phone <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Gender <span class="important">*</span></label>
                        <select class="form-control border_form">
                            <option> -- Select -- </option>    
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date of Birth <span class="important">*</span></label>
                        <input type="date" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Completed NYSC? <span class="important">*</span></label>
                        <select class="form-control border_form">
                            <option> -- Select -- </option>    
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Certificate Number <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Country of Origin <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">State of Origin <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">LGA of Origin <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Country of Residence <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">State of Residence <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Residential Address <span class="important">*</span></label>
                        <input type="text" class="form-control border_form" id="" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="submit" class="btn btn-success">Save & Continue</button>    
 
                </form>
            </div>    
        </section>


    <!-- Assets JS Files -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>