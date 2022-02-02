<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="signup__container">
  <div class="container__child signup__form">
  <form action="Utility/signup2.php" method = "post">
      <div class="form-group">
        <label for="name" class="form-label">Email<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="name" id="name" class="validate" required>
      </div>
      <div class="form-group">
        <label for="dob">DOB <span style="color:red;">*</span></label>
        <input class="form-control" type="date" name="dob" required id="dob">
      </div>
      <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Login" />
          </li>
          <li>
            <a class="signup__link" href="signup.php">Not Registered?</a>
          </li>
        </ul>
      </div>
    </form>  
  </div>
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__content text-center">
    <h1 class="heading--primary">Need Help? Contact Us</h1>
    <h2 class="heading--secondary">Mail: aao@hijli.iitkgp.ernet.in<br>
 Tarun Majety: 7602443444<br>
 Vikas Ahlawat: 8397070108<br>
   Shikha Bagaria: 7479222951</h2>
    </div>
    <div class="signup__overlay"></div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
