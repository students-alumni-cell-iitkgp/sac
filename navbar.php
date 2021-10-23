<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style>
      .navbar{
font-size: 1.1rem;
}
.nav-link{
padding-right: 20px !important;
padding-left: 20px !important;
}
.navbar-brand img{
height: 4.5rem;
width: 11rem;
}
.nav-item:hover .nav-link{
background-color: gray;
border-radius:  2px;
}
.dropdown-menu{
    display: none;
    transition: all 2s ease-in;
}
.dropdown:hover .dropdown-menu {
display: block;
animation-name: delay;
animation-duration: 1.2s;
transition: 2s ease-in;
}
.dropdown:hover{
    transition: 2s ease-in;
    transition-delay:2s ;
   
}
.dropdown-item{
text-align: center !important;
padding-bottom: 20px !important;
}
.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
}
.dropdown-content a:hover {
background-color: #ddd;
}
.dropdown:hover .dropdown-content {
display: block;}
.xyz{
	padding-bottom :10px;
}
@keyframes delay{
    0%{
        opacity: 0;
    }
    30%{
        opacity: 0;
    }
    100%{
        opacity: 1;
    }
	
}
</style>
  </head>
  <body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">

		<div class="container-fluid">
			<a class="navbar-brand xyz" href="#"><img src="img/latestlogo.jpeg"></a>
			<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
				aria-expanded="false" aria-label="Toggle navigation"> -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"> <a class="nav-link" href="index.php">Home </a> </li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" data-bs-toggle="dropdown"> Events </a>
						<div>
							<ul class="dropdown-menu">
						     	<li><a class="dropdown-item" href="alumni_talks.php"> Alumni Talks </a></li>
								 <li><a class="dropdown-item" href="alvida.php"> Alvida </a></li>
								 <li><a class="dropdown-item" href="AAM.php">Annual Alumni Meet </a></li>
								 <li><a class="dropdown-item" href="homecoming.php"> Homecoming </a></li>
								 <li><a class="dropdown-item" href="leadershipsummit.php"> Leadership Summit </a></li>
								 <li><a class="dropdown-item" href="phonathon.php"> Phonathon </a></li>
								<li><a class="dropdown-item" href="SAM.php"> Students Alumni Meet </a></li>			
							</ul>
						</div>

					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" data-bs-toggle="dropdown"> Initiatives </a>
						<ul class="dropdown-menu">
						    <li><a class="dropdown-item" href="ACAP.php"> ACAP</a></li>
							<li><a class="dropdown-item" href="affinity.php"> Affinity Programme </a></li>
							<li><a class="dropdown-item" href="https://studentsalumnicell-iitkgp.medium.com/" target = "_blank"> Alumni Blog </a></li>
							<li><a class="dropdown-item" href="myimprint.php"> My Imprint </a></li>
							<li><a class="dropdown-item" href="SAMP.php"> SAMP</a></li>
							<li><a class="dropdown-item" href="sparc.php"> SPARC </a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" data-bs-toggle="dropdown"> Publications </a>	
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="https://sac.iitkgp.ac.in/temposhout_final_6.pdf" target="_blank"> Tempo Shout </a></li>
							<li><a class="dropdown-item" href="yearbook.php"> Yearbook </a></li>
							<li><a class="dropdown-item" href="YOY.php"> YOY </a></li>
							
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link" href="team.php"> The Team </a></li>
					<!-- <li class="nav-item"><a class="nav-link" href="signup.php"> Alumni-Reg </a></li> -->
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" data-bs-toggle="dropdown"> Sponsors </a>
						<ul class="dropdown-menu">
						    <li><a class="dropdown-item" href="sponsors2021.php"> 2021 </a></li>
							<li><a class="dropdown-item" href="sponsors.php"> 2020 </a></li>
							<li><a class="dropdown-item" href="sponsors2019.php"> 2019 </a></li>
							<li><a class="dropdown-item" href="sponsors2018.php"> 2018 </a></li>
							<li><a class="dropdown-item" href="sponsors2017.php"> 2017</a></li>
							<li><a class="dropdown-item" href="sponsors2016.php"> 2016 </a></li>
							<li><a class="dropdown-item" href="sponsors2015.php"> 2015 </a></li>
							<li><a class="dropdown-item" href="sponsors2014.php"> 2014 </a></li>
							<li><a class="dropdown-item" href="sponsors2013.php"> 2013 </a></li>
							<li><a class="dropdown-item" href="sponsors2012.php"> 2012 </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

	</nav>
</body>

</html>