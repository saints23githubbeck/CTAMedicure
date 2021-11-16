<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container-fluid bodybackground" style="background-color: rgb(205, 218, 218);">
        <div class="signupbox bg-light alert-dismissible d-flex alert " role="alert">
            <div class="signupimage col">
                                
            </div>
            <!-- <div class="signinimage">
                <img src="Sources/signInimage.jpg" height="100%" width="auto" alt="Sign in">
            </div> -->
            <div class="halflayer col">
                <div class="text-end p-4">
                    <button type="button" class="btn btn-secondary btn-lg close" style="border-radius: 50%;" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center"><h2>Sign in to Medicare</h2></div>
                    
                </div>
                <div>
                    <form class="px-4 py-3">
                      <div class="form-group pb-4">
                        <label style="font-size: 15x;" for="FormEmail1"><strong>Name</strong></label>
                        <input type="text" class="form-control" id="Formname1" placeholder="John Doe">
                      </div>
                        <div class="form-group pb-4">
                          <label style="font-size: 15px;" for="FormEmail1"><strong>Email address</strong></label>
                          <input type="email" class="form-control" id="FormEmail1" placeholder="email@example.com">
                        </div>
                        <div class="form-group pb-4">
                          <label style="font-size: 15px;" for="FormPassword1"><strong>Password</strong></label>
                          <input type="password" class="form-control" id="FormPassword1" placeholder="Password">
                        </div>
                        <div class="form-group pb-4">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck">
                            <label class="form-check-label" for="dropdownCheck">
                              Remember me
                            </label>
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" style="width: 150px;" class="btn btn-primary btn-lg">SIGN UP</button>
                        </div>
                      </form>
                      
                </div>
            </div>
            
            
        </div>


    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    
</body>
</html>