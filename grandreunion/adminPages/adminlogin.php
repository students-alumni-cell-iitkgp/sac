<?php
$title = "login";
include 'includeAdmin/header.php';
$path="../connection.php";
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $userAdded=adduser($_POST['username'],$_POST['password']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    //adding the user
    // $result=adduser($username,$password);
    // if(!$result) {echo 'Error registering'; }
    // else{
    //     header('Location: view.php');
    // }

    // authorising the user

    $result = getuser($username, $password);
    if (!$result) {
        echo "<div class='text-center text-danger'>Username or Password Incorrect. Please try again</div>";
    } else {
        $_SESSION['userid'] = $result['username'];
        header('Location: view.php');
    }
}

?>
<style>
    .login {
        height: 100px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<br /><br />
<div class="login">
    <h2>Login</h2>
</div>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" required>

    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary  " style="width:100%;">Submit</button>
</form>

<?php include 'includeAdmin/footer.php' ?>