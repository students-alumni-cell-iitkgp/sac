<?php
<<<<<<< HEAD
ob_start();
session_start();

// Check for login error - fixed variable name
if(isset($_SESSION['check']))
{
    $ch = $_SESSION['check'];
    unset($_SESSION['check']); // Clear the error after displaying
}else{
    $ch=0;
}
=======
session_start();  

$ch = isset($_SESSION['check'])? $_SESSION['check']: 0;
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Students' Alumni Cell | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/login.css">
  <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon" />
<<<<<<< HEAD
</head>
<body>

<style>
=======

</head>
<body>
<!--
    D3DEDC
    92A9BD
    7C99AC
    FFEFEF
-->
<style>
    
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
    #login-error-msg {
      text-align: center;
      margin: 0;
      padding: 5px;
      font-size: 12px;
      font-weight: bold;
      color: #8a0000;
      border: 1px solid #8a0000;
      background-color: #e58f8f;
      opacity: 0;
    }

<<<<<<< HEAD
    #empty-fields-msg {
      text-align: center;
      margin: 5px 0;
      padding: 5px;
      font-size: 12px;
      font-weight: bold;
      color: #8a4400;
      border: 1px solid #8a4400;
      background-color: #e5b88f;
      opacity: 0;
    }

=======
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
    h4{
        font-size: 18px;
    }
    h3{
        font-weight: bold;
        font-size: 18px;
    }
    label{
        padding: 2px;
        margin: top 0.5em;
    }
    @media (max-width:460px){
        h4{
        font-size: 15px;
    }
    h3{
        font-size: 16px;
    }
    }

    @media (max-width:400px){
        h4{
        font-size: 13px;
    }
    h3{ 
        font-size: 13px;
    }
    }

    @media (max-width:400px){
    h3{
        font-size: 10px;
    }
    }
</style>
<<<<<<< HEAD

<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup">Log in</h2>
        <p id="login-error-msg">Invalid email or date of birth</p>
        <p id="empty-fields-msg">Please fill in all fields</p>
        
        <form action="loginValidate.php" method="post" id="loginForm">
		    <div class="form-holder">
                <label for="email">Email</label>
                <input type="email" class="input" name="email" id="email" placeholder="Email" required />
                <label for="dob">Date of Birth</label>
                <input class="form-control input" type="date" placeholder="Date of Birth" name="dob" required id="dob">
		    </div>
		    <button class="submit-btn" type="submit">Log in</button>
        </form>
        
        <hr>
        <center><h3 style="color: #FFEFEF"><span class="text-muted">For new registration</span> Sign up</h3></center>
        <a class="submit-btn" href="signup.php" role="button"><center>Sign up</center></a>
	</div>

=======
<div class="form-structor">

	<div class="signup">
		<h2 class="form-title" id="signup">Log in</h2>
        <p id="login-error-msg">Bad Credentials</p>
        <form action="Utility/signup2.php" method = "post">
		    <div class="form-holder">
            <label for="email">Email</label>
            <input type="email" class="input" name="name" id="name" placeholder="Email" class="validate" required />
            <label for="dob">Date of Birth</label>
            <input class="form-control input" type="date" placeholder="date of Birth" name="dob" required id="dob">
		    </div>
		    <button class="submit-btn">Log in</button>
        </form>
        <hr>
        <center><h3 style = "color: #FFEFEF"><span text-muted>For new registration</span> Sign up</h3></center>
        <a class="submit-btn" href="signup.php" role="button"><center>Sign up</center></a>
	</div>


>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Contact us</h2>
			
<<<<<<< HEAD
               <br><br>
=======
               <br>
               <br>
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
               <h4>On facing any difficulty mail us on</h4>
               <h3>aao@hijli.iitkgp.ernet.in</h3>

               <h4> or contact any of us</h4>
               <h3>
<<<<<<< HEAD
               <div class="row"><div class="col-xs-6">Prerit Goyal </div><div class="col-xs-6">8989020473</div></div>
               <div class="row"><div class="col-xs-6">Rohan Sachan </div><div class="col-xs-6">6389355293</div></div>
               <div class="row"><div class="col-xs-6">Abhisha Shrivastava </div><div class="col-xs-6">8827031589</div></div>
               <div class="row"><div class="col-xs-6">Anjani Kumar </div><div class="col-xs-6">8968628246</div></div>
               <div class="row"><div class="col-xs-6">Kajol Sahu   </div><div class="col-xs-6">9479940899</div></div>
=======
               <div class = "row"><div class = "col-xs-6">Prerit Goyal </div><div class = "col-xs-6 ">8989020473</div></div>
               <div class = "row"><div class = "col-xs-6">Rohan Sachan </div><div class = "col-xs-6 ">6389355293</div></div>
               <div class = "row"><div class = "col-xs-6">Abhisha Shrivastava </div><div class = "col-xs-6 ">8827031589</div></div>
               <div class = "row"><div class = "col-xs-6">Anjani Kumar </div><div class = "col-xs-6 ">8968628246</div></div>
               <div class = "row"><div class = "col-xs-6">Kajol Sahu   </div><div class = "col-xs-6 ">9479940899</div></div>
>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
               </h3>
		</div>
	</div>
</div>

<script>
<<<<<<< HEAD
console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');
const loginForm = document.getElementById('loginForm');

var $ch = '<?php echo $ch; ?>';

// Show error message if login failed
if($ch == 1) {
    document.getElementById('login-error-msg').style.opacity = 1;
} else {
    document.getElementById('login-error-msg').style.opacity = 0;  
}

// Form validation
loginForm.addEventListener('submit', function(event) {
    var email = document.getElementById("email").value.trim();
    var dob = document.getElementById("dob").value.trim();
    
    // Hide previous error messages
    document.getElementById('login-error-msg').style.opacity = 0;
    document.getElementById('empty-fields-msg').style.opacity = 0;
    
    if(email === "" || dob === "") {
        document.getElementById('empty-fields-msg').style.opacity = 1;  
        event.preventDefault();
        return false;
    }
    
    return true;
});

// Slide animation handlers
=======
    console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

var $ch = '<?php echo $ch; ?>';

if($ch == 1)
{
    document.getElementById('login-error-msg').style.opacity = 1;
    <?php
    session_destroy(); 
    ?>
}
else{
    document.getElementById('login-error-msg').style.opacity = 0;  
}

>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
loginBtn.addEventListener('click', (e) => {
    let parent = e.target.parentNode.parentNode;
    Array.from(e.target.parentNode.parentNode.classList).find((element) => {
        if (element !== "slide-up") {
            parent.classList.add('slide-up')
        } else {
            signupBtn.parentNode.classList.add('slide-up')
            parent.classList.remove('slide-up')
        }
    });
});

signupBtn.addEventListener('click', (e) => {
    let parent = e.target.parentNode;
    Array.from(e.target.parentNode.classList).find((element) => {
        if (element !== "slide-up") {
            parent.classList.add('slide-up')
        } else {
            loginBtn.parentNode.parentNode.classList.add('slide-up')
            parent.classList.remove('slide-up')
        }
    });
});
</script>  
</body>
<<<<<<< HEAD
</html>
=======
</html>



>>>>>>> 431f2d860032359773f62f6cb1c59bb9a861d1c7
