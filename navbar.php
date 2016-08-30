<script>
  $(document).ready(function(){
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
    );
  });
  
</script>
<div class="navbar-fixed white" id="nav">
  <ul id="events" class="dropdown-content">
    <li><a href="aam.php">Annual Alumni Meet</a></li>
    <li><a href="sam.php">Student Alumni Meet</a></li>
    <li><a href="guestlecture.php">Guest Lectures</a></li>
    <li><a href="leadershipsummit.php">Leadership Summit</a></li>
    <li><a href="alvida.php">Alvida</a></li>
  </ul>
  <ul id="initiatives" class="dropdown-content">
    <li><a href="mentorship.php">Mentorship Program</a></li>
    <li><a href="imprint.php">My Imprint</a></li>
  </ul>
  <ul id="publications" class="dropdown-content">
    <li><a href="yearbook.php">Yearbook</a></li>
    <li><a href="yoy.php">Yearnings of Yore</a></li>
  </ul>
  <nav>
    <div class="nav-wrapper white">
      <a href="#!" class="brand-logo"><img src="img/logo/sac_logo.png" width="180" height="70"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down _textcolor">
        <li><a href="index.php">Home</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="events">Events</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="initiatives">Initiatives</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="publications">Publications</a></li>
        <li><a href="team.php">The Team</a></li>
       

<<<<<<< cda441a9a0caa064a6c9e2d6b5bc758d2d7d92af
        <li><a href="association.php">Our Sponsers</a></li>
=======
        <li><a href="association.php">Sponsers</a></li>
>>>>>>> changed gallery, added video, changed images, added images to index, added sponsers

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
    </div>
  </nav>
</div>
