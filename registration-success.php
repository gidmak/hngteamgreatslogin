<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if email exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $email, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Team Greats</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form onsubmit="return validation()">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><img src="icon/facebook.png" alt="facebook"></a>
				<a href="#" class="social"><img src="icon/twitter.png" alt="twitter"></a>
				<a href="#" class="social"><img src="icon/linkedin.png" alt="linkedin"></a>
			</div>
			<div id="error_message"></div>
			<span>or use your email for registration</span>
			<input name="name" type="text" placeholder="Your full Name" id="name" required/>
			<input name="email" type="email" placeholder="Email" id="email"required/>
			<input name="password" type="password" placeholder="Password" id="password" required/>
			<input type="password" placeholder="confirm password" id="password" required/>
			<input name="confirm_password" type="submit" name="register" value="SignUp" class="button">
		</form>
	</div>
	<div class="form-container sign-in-container">

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p>You have successfully Registered</p>
			<h2>Sign in</h2>
			<div class="social-container">
				<a href="#" class="social"><img src="icon/facebook.png" alt="facebook"></a>
				<a href="#" class="social"><img src="icon/twitter.png" alt="twitter"></a>
				<a href="#" class="social"><img src="icon/linkedin.png" alt="linkedin"></a>
			</div>
			<div id="error_message"></div>
			<span>or use your account</span>
			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
				<input name="email" type="email" placeholder="Email" id="email" value="<?php echo $email; ?>"  required/>
				<span class="help-block"><?php echo $email_err; ?></span>
			</div>
			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
				<input name="password" type="password" class="form-control" placeholder="Password" id="password" required />
				<span class="help-block"><?php echo $password_err; ?></span>
			</div>
			<a href="#">Forgot your password?</a>
			<input type="submit" name="signIn" value="Sign In" class="button">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>sign up now!</h1>
				<p>Enter your personal details and start journey with us</p>
				<a href="registration.php" class="button">Sign Up</a>
			</div>
		</div>
	</div>
</div>


<script src="main.js"></script>
</body>
</html>