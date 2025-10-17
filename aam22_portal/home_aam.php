<?php
session_start();
include 'header_aam.php'; // include your updated header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | 22nd Annual Alumni Meet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/home_aam.css">

<style>

</style>


</head>
<body>
<div class="logoContainer text-center my-4">
    <div class="container">
            <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
            <img class="instiLogo" src="./img/palJubLogo.png" alt="">
    </div>
</div> 
<div class="mainCount">
    <div class="mainCount">
        <span id="days1" class="days1"> </span>
        <p class="daysTogo">Days to Go</p>
    </div>
</div>

<div class='hero'>
    <div class="text-center">
        Welcome to the 22<sup>nd</sup> Annual Alumni Meet 2026
    </div>
    <div class="text-center">
        Batch of 1976 | 1986 | 2001
    </div>
    <div class="text-center dateDiv">
        <span> 9<sup>th</sup> to 11<sup>th</sup> January 2026</span>
    </div>
</div>


<div class="headr text-center my-4">
    <a href="./../aam21.php" class="btn btn-lg mx-4 px-10 mb-6" style="background-color: #1976D2; color: white;">Glimpses of earlier Annual Alumni Meets
</a>
<br>
<br>
    <!-- <span class="notes-text">Join the fun! Register first, then log in to continue!</span> -->
    <span class="notes-text">Please register for the 22<sup>nd</sup> Annual Alumni Meet to relive old memories and celebrate with your batchmates!</span>
    <br>
    <br>
    <a href="signup.php" class="btn btn-lg mx-4 px-10" style="background-color: #1976D2; color: white;">Register</a>
    <a href="login_aam.php" class="btn btn-lg mx-4 px-10" style="background-color: #1976D2; color: white;">Login</a>
</div>






<div class="headr text-center my-4">
        <img src="./img/home_aampic01.png" alt="Alumni Meet Banner" class="countdown-bg">
</div>

<div class="headr text-center my-5">
    <h3 class="mb-4" style="color:#012a4a; font-weight:700;">Tentative Itinerary of 22<sup>nd</sup> Annual Alumni Meet ( 9<sup>th</sup> to 11<sup>th</sup> January 2026 )</h3>
    <div class="itenary-grid">
        <img src="./img/itenary1.png" alt="Itinerary Day 1" class="itenary-img">
        <img src="./img/itenary2.png" alt="Itinerary Day 2" class="itenary-img">
        <img src="./img/itenary3.png" alt="Itinerary Day 3" class="itenary-img">
    </div>
</div>

<div class="headr flexdiv my-5">

<!-- Invite Friends Section -->
<div class="invite-section">
  <h2>Get Your Batchmate to Register!</h2>
  <p>Reunite and relive the memories!  
     Invite your batchmates to join the <strong>22<sup>nd</sup> Annual Alumni Meet</strong>.</p>

  <button id="invite-btn" class="invite-btn">Share</button>

  <div class="social-buttons" id="social-buttons" style="display:none;">
    <a href="#" class="share-btn fb" id="share-facebook" title="Share on Facebook">Facebook</a>
    <a href="#" class="share-btn wa" id="share-whatsapp" title="Share on WhatsApp">WhatsApp</a>
    <a href="#" class="share-btn ig" id="share-instagram" title="Share on Instagram">Instagram</a>
    <button class="share-btn copy" id="copy-link" title="Copy Link">Copy Link</button>
  </div>

  <p id="copy-msg" style="display:none; color:#fff; margin-top:10px;">✅ Link copied to clipboard!</p>
</div>



<div class="invite-section">
  <div class="follow-us-content">
    <h2>CONNECT WITH US</h2>
    <p>ON OUR SOCIAL NETWORKS</p>

    <div class="social-icons">
      <a href="https://www.linkedin.com/company/sac-iitkgp/mycompany/" target="_blank">
        <img src="./img/linkedIcon.png" alt="LinkedIn" />
      </a>
      <a href="https://www.facebook.com/iitkgp.alumnicell" target="_blank">
        <img src="./img/fbIcon.png" alt="Facebook" />
      </a>
      <a href="https://x.com/IITKgpAlumni" target="_blank">
        <img src="./img/xIcon.png" alt="X" />
      </a>
      <a href="https://www.instagram.com/sac.iitkgp/?hl=en" target="_blank">
        <img src="./img/instaIcon.png" alt="Instagram" />
      </a>
      <a href="https://www.youtube.com/c/StudentsAlumniCellIITKharagpur" target="_blank">
        <img src="./img/youtubeIcon.png" alt="Youtube" />
      </a>
    </div>

  </div>
</div>

</div>

<!-- ===== CONTACT SECTION ===== -->


<div class="headr text-center my-5 contact-section">
    <h3 class="mb-4" style="color:#012a4a; font-weight:700;">Got a query? Feel free to contact us!</h3>
    <div class="contact-grid">
        <div class="contact-card">
            <h5 class="contact-name">Rajas Sangekar</h5>
            <p class="contact-role">General Secretary, Students' Alumni Cell</p>
            <p><strong>Phone:</strong> <a href="tel:+919975261910" class="contact-link">+91 99752 61910</a></p>
            <p><strong>Email:</strong> <a href="mailto:rajassangekar1855@gmail.com" class="contact-link">rajassangekar1855@gmail.com</a></p>
        </div>

        <div class="contact-card">
            <h5 class="contact-name">Soumya Kanta Das</h5>
            <p class="contact-role">Coordinator, Students' Alumni Cell</p>
            <p><strong>Phone:</strong> <a href="tel:+917849085554" class="contact-link">+91 78490 85554</a></p>
            <p><strong>Email:</strong> <a href="mailto:soumyakantadas2005@gmail.com" class="contact-link">soumyakantadas2005@gmail.com</a></p>
        </div>

        <div class="contact-card">
            <h5 class="contact-name">Anamika Das</h5>
            <p class="contact-role">Office of Alumni Affairs, IIT Kharagpur</p>
            <p><strong>Phone:</strong> <a href="tel:+919836107544" class="contact-link">+91 98361 07544</a></p>
            <p><strong>Email:</strong> <a href="mailto:alumni@hijli.iitkgp.ac.in" class="contact-link">alumni@hijli.iitkgp.ac.in</a></p>
        </div>

        <div class="contact-card">
            <h5 class="contact-name">Nirmla Patidar</h5>
            <p class="contact-role">Web Head, Students' Alumni Cell</p>
            <p><strong>Phone:</strong> <a href="tel:+919165905280" class="contact-link">+91 91659 05280</a></p>
            <p><strong>Email:</strong> <a href="mailto:nirmalpatidar2533@gmail.com" class="contact-link">nirmalpatidar2533@gmail.com</a></p>
        </div>


    </div>
</div>






</div>



</body>

<script>
  const targetDate = new Date("January 9, 2026 00:00:00").getTime();
  const countdown1 = document.getElementById("days1");

  function updateCountdown() {
    const now = new Date().getTime();
    const diff = targetDate - now;

    if (diff <= 0) {
      countdown1.innerHTML = "It’s Time! 🎊";
      return;
    }

    const days = Math.floor(diff / (1000 * 60 * 60 * 24)) + 1;
    countdown1.textContent = days;

  }

  updateCountdown();
  setInterval(updateCountdown, 1000 * 60 * 60); // Update every hour



const shareUrl = window.location.href;
const shareText = "Join me at the 22nd Annual Alumni Meet at IIT Kharagpur! Don't miss the fun!";

// Show share options
document.getElementById("invite-btn").onclick = () => {
  const socialButtons = document.getElementById("social-buttons");
  socialButtons.style.display = "flex";
  socialButtons.classList.add("fadeIn");
  document.getElementById("invite-btn").style.display = "none";
};

// Facebook
document.getElementById("share-facebook").onclick = (e) => {
  e.preventDefault();
  window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`, "_blank");
};

// WhatsApp
document.getElementById("share-whatsapp").onclick = (e) => {
  e.preventDefault();
  window.open(`https://wa.me/?text=${encodeURIComponent(shareText + " " + shareUrl)}`, "_blank");
};

// Instagram
document.getElementById("share-instagram").onclick = (e) => {
  e.preventDefault();
  alert("Instagram doesn’t support direct link sharing — copy the link and share it in your story or bio!");
};

// Copy link
document.getElementById("copy-link").onclick = () => {
  navigator.clipboard.writeText(shareText + " " + shareUrl)
    .then(() => {
      const msg = document.getElementById("copy-msg");
      msg.style.display = "block";
      setTimeout(() => msg.style.display = "none", 2000);
    });
};
</script>
</html>

<?php
include 'footer_aam.php'; // include your updated header
?>
