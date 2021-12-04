<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img  src="img/aamlogo.png"></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse  justify-content-end" id="navbarNavDropdown2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"> <a class="nav-link" href="update.php">Dashboard</a> </li>                
                <li class="nav-item">
                    <a class="nav-link" href="displayRegisteredUsers.php">Attendee </a>                
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown"> Edit</a>
                    <div>	
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="update_show.php" > Update</a></li>
                            <li><a class="dropdown-item" href="adminpage.php"> Payment</a></li>
                            <li><a class="dropdown-item" href="TravellingDetails.php"> Travel Details</a></li> 
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout2.php"> Logout</a></li>            
            </ul>
        </div>
    </div>
</nav>