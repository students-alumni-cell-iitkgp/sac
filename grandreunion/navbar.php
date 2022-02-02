<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/navbar.css">
  </head>
  <body>
<nav class="nb navbar navbar-expand-lg navbar-light bg-transparent ">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img  src="img/aamlogo.png"></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse  justify-content-end" id="navbarNavDropdown2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item list active"> <a class="nav-link" href="dashboard.php"><span class='icons'><i class="fas fa-sitemap"></i></span><span class='text'>Dashboard</span>  </a> </li>                
                <li class="nav-item">
                    <a class="nav-link list" href="displayRegisteredUsers.php"><span class='icons'><i class="fas fa-graduation-cap"></i></span><span class='text'>Attendee</span></a>                
                </li>
                <li class="nav-item">
                    <a class="nav-link list" href="payment.php"><span class='icons'><i class="fas fa-rupee-sign"></i></span><span class='text'>Payment </span></a>                
                </li>
                <li class="nav-item list">
                    <a class="nav-link" href="edit_info.php"><span class='icons'><i class="fas fa-edit"></i></span><span class='text'>Edit</span> </a>                
                </li>
                <li class="nav-item list"><a class="nav-link" href="Utility/logout2.php"><span class='icons'><i class="fas fa-sign-out-alt"></i></span> <span class='text'>Logout</span> </a></li>            
            </ul>
        </div>
    </div>
</nav>
<script>
     var list = document.getElementsByClassName('nav-item');
     var nav_link = document.getElementsByClassName('nav-link');

    var current_link = window.location.href;

   //console.log(link_arr[4]);


    for(var i=0;i<nav_link.length;i++){
        //console.log(nav_link[i].href,current_link);
        if(nav_link[i].href == current_link){
            //console.log('a');
            list[i].className = "nav-item list active";
        }
        else{
            list[i].className = "nav-item list ";
        }
    }


</script>
</body>