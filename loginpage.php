<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<!--
    D3DEDC
    92A9BD
    7C99AC
    FFEFEF
-->
<style>
    h4{
        font-size: 18px;
    }
    h3{
        font-weight: bold;
        font-size: 18px;
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
<div class="form-structor">

	<div class="signup">
		<h2 class="form-title" id="signup">Log in</h2>
        <form action="utility/signup2.php" method = "post">
		    <div class="form-holder">
            <input type="email" class="input" name="name" id="name" placeholder="Email" class="validate" required />
            <input class="form-control input" type="date" placeholder="date of Birth" name="dob" required id="dob">
		    </div>
		    <button class="submit-btn">Log in</button>
        </form>
        <hr>
        <center><h3 style = "color: #FFEFEF">Or Sign up</h3></center>
        <a class="submit-btn" href="signup.php" role="button"><center>Sign up</center></a>
	</div>


	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Contact us</h2>
			
               <br>
               <br>
               <h4>On facing any difficulty mail us on</h4>
               <h3>aao@hijli.iitkgp.ernet.in</h3>

               <h4> or contact any of us</h4>
               <h3>
               <div class = "row"><div class = "col-xs-6">Prerit Goyal </div><div class = "col-xs-6 ">8989020473</div></div>
               <div class = "row"><div class = "col-xs-6">Rohan Sachan </div><div class = "col-xs-6 ">6389355293</div></div>
               <div class = "row"><div class = "col-xs-6">Anjani Kumar </div><div class = "col-xs-6 ">8968628246</div></div>
               <div class = "row"><div class = "col-xs-6">Kajol Sahu   </div><div class = "col-xs-6 ">9479940899</div></div>
               </h3>
		</div>
	</div>
</div>

<script>
    console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

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
</html>



