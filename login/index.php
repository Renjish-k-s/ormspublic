<?php 
session_start();
// session_unset(); // Unset all session variables
// session_destroy(); // Destroy the session
$_SESSION['user_id']=-1;
include_once './db/otpsender_emailvalidator.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!--   *** Link To Custom CSS Style Sheet ***   -->
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/alert.css">


	<!--   *** Link To Fonts Awesome Icons ***   -->
	<link rel="stylesheet" href="./css/all.min.css"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>SignIn/SignUp Page</title>
</head>

<?php
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<style>
#loader {
	padding: 16px 45px;
    background-color: #3498db; /* Blue background color */
    color: white; /* White text color */
    font-size: 12px; /* Font size */
    font-weight: bold; /* Bold text */
 /* Uppercase text */
    border: none; /* No border */
    border-radius: 25px; /* Rounded edges */
    padding: 10px 20px; /* Padding inside the button */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition on hover */
}


.account-success-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: none;
    z-index: 9999;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    overflow: auto;
    flex-direction: column;
}

.success-container {
    background: linear-gradient(135deg, #2C3E50, #3498DB);
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    text-align: center;
    max-width: 600px;
    width: 90%;
    animation: fadeInScale 0.6s ease-out;
    position: relative;
    overflow: hidden;
}

.success-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, #2ECC71, #3498DB);
    animation: shimmer 2s infinite linear;
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

@keyframes fadeInScale {
    0% {
        transform: scale(0.9);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.success-icon {
    font-size: 70px;
    margin-bottom: 25px;
    animation: celebrateIcon 1.5s ease infinite;
}

@keyframes celebrateIcon {
    0%, 100% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.1) rotate(5deg); }
}

.success-title {
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: bold;
    background: linear-gradient(90deg, #2ECC71, #3498DB);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.success-message {
    font-size: 18px;
    margin-bottom: 30px;
    color: #AED6F1;
    line-height: 1.6;
    padding: 0 20px;
}

.email-highlight {
    background: rgba(46, 204, 113, 0.1);
    padding: 15px;
    border-radius: 10px;
    margin: 20px 0;
    border: 1px solid rgba(46, 204, 113, 0.3);
}

.action-button {
    background: linear-gradient(90deg, #2ECC71, #27AE60);
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 30px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 10px;
    box-shadow: 0 4px 15px rgba(46, 204, 113, 0.2);
}

.action-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(46, 204, 113, 0.3);
    background: linear-gradient(90deg, #27AE60, #2ECC71);
}

.welcome-note {
    font-size: 20px;
    color: #F7DC6F;
    margin-top: 20px;
    font-style: italic;
}

select {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: none;
    background-color: #f0f0f0;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px;
}

select:focus {
    outline: none;
    background-color: #e8e8e8;
}

/* Remove focus ring for Firefox */
select:-moz-focusring {
    color: transparent;
    text-shadow: 0 0 0 #333;
}

#duplicateemail,#invalidlogin
{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8); /* Black background with 80% opacity */
        display: none; /* Hidden by default */
        z-index: 9999; /* Ensure it overlays everything */
        align-items: center;
        justify-content: center;
        color: white; /* Text color inside overlay */
        font-size: 24px;
        overflow:auto;
        flex-direction: column; /* Stack elements vertically */
        align-items: center; /* Center-align items */
        justify-content: center; /* Center vertically */
        gap: 20px; 
}
.common
{
    background: linear-gradient(135deg, #2C3E50, #3498DB); /* Red gradient for error */
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    font-family: Arial, sans-serif;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: 30px auto;
    font-size: 16px;
    font-weight: bold;
    line-height: 1.5;
}
</style>


	
<body>
<div class="wrapper">
	<div class="form-container signIn-container" >
        <form method="post">
			<h1>Welcome Back!</h1>
			<p>Please log in with your personal details to stay connected with us</p>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
			<input type="email" placeholder="Your Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
			<button type="submit" name="loginbutton">Sign In</button>
		</form>
	</div>
	<div class="form-container signUp-container">
    <form method="post">
    <h1>Create Account</h1>
    <p>Or use your email for registration</p>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    
    <input type="text" name="fullname" placeholder="Your Name" required>
    <input type="email" name="email_id" placeholder="Your Email" required>
    
    <select name="usertype" required>
        <option value="" disabled selected>Select type of user</option>
        <option value="5">Researcher</option>
        <!-- <option value="1">Head of the institution</option> -->
    </select>

    <button type="submit" id="registerBtn" name="register">Sign Up</button>
    </form>
</div>



	<div class="overlay-container">
		<div class="overlay" style="background:linear-gradient(135deg,#2C3E50,#3498DB);">
			<div class="overlay-panel overlay-left" style="background:linear-gradient(135deg,#2C3E50,#3498DB);">
				<h1>Welcome Back!</h1>
				<p>Please log in with your personal details to stay connected with us</p>
				<button class="btn" id="signIn" style="background:linear-gradient(135deg,#2C3E50,#3498DB);">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right"  style="background:linear-gradient(135deg,#2C3E50,#3498DB);" >
				<h1>Hey, Buddy!</h1>
				<p>Share your personal information to embark on your journey with us</p>
				<button class="btn" id="signUp" style="background:linear-gradient(135deg,#2C3E50,#3498DB);">Sign Up</button>
				
			</div>
		</div>
	</div>

	<div id="loginsucessfull">
		<div class="alert-box">
			<div class="smile">😊</div>
			<div class="welcome-text">Hi John!</div>
			<div class="welcome-text">Welcome to ORMS</div>
			<div class="notification-text">Your Complete Research Partner</div>
			<!-- <div class="notification-text">You have 5 new notifications</div> -->
			<button class="continue-btn">Continue</button>
		</div>
	</div>




<div class="account-success-overlay">
    <div class="success-container">
        <div class="success-icon">🎉</div>
        <div class="success-title">Account Created Successfully!</div>
        <div class="success-message">
            Great news! Your account has been created successfully.
            <div class="email-highlight">
                We've sent a temporary password to your registered email address.
                Please use it to log in to your account.
            </div>
        </div>
        <div class="welcome-note">
            Welcome to ORMS - Your Complete Research Partner
        </div>
		<button class="action-button" onclick="goback_login()">Go to Login</button>
	
	</div>
</div>
</div>

<div id="duplicateemail">
<div class="common">
    ❌ <span style="font-size: 18px; color: #FFC107;">User Already Exists!</span> <br><br>
    📌 The email you entered is already registered. <br>
    🔄 Try using a different email or log in instead. <br><br>
    🛠 Need help? Contact support. <br><br>

    <div class="d-flex justify-content-center">
        <button onclick="goback_login()" 
            style="background: linear-gradient(135deg, #8E0E00, #1F1C18); border: none; padding: 10px 20px; color: white; font-size: 14px; border-radius: 5px; cursor: pointer;">
            Go to Login
        </button>
    </div>
</div>
</div>

<div id="invalidlogin">
    <div class="common">
        ❌ <span style="font-size: 18px; color: #FFC107;">Invalid Username or Password!</span> <br><br>
        📌 The credentials you entered do not match our records. <br>
        🔄 Please check your email and password and try again. <br><br>
        🛠 Forgot your password? <a href="forgot-password.php" style="color: #FFC107; text-decoration: none;">Reset here</a>. <br><br>

        <div class="d-flex justify-content-center">
            <button onclick="goback_login()" 
                style="background: linear-gradient(135deg, #8E0E00, #1F1C18); border: none; padding: 10px 20px; color: white; font-size: 14px; border-radius: 5px; cursor: pointer;">
                Try Again
            </button>
        </div>
    </div>
</div>


<!--   *** Link To Custom Script File ***   -->
<script type="text/javascript" src="./js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="./js/script.js"></script>
<script type="text/javascript" src="./js/alert.js"></script>


</body>
</html>

<script>





function goback_login()
{
    //alert("haii");
    document.querySelector('.account-success-overlay').style.display = 'none';
    document.querySelector('#duplicateemail').style.display = 'none';
    document.querySelector('#invalidlogin').style.display = 'none';


	//location.reload();

}



</script>