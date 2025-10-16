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

<style>

body {
    background: url(./aa2a.webp) no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    backdrop-filter: blur(25px);

    font-family: 'Segoe UI', sans-serif;
}

/* ===== HERO SECTION ===== */
.hero {
    display: flex;
    flex-direction: column;
    background: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    height: 120px;
    margin: 30px auto;
    width: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #012a4a;
    font-size: 2rem;
    font-weight: 700;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7);
}

/* ===== LOGO SECTION ===== */
.justCenter {
    margin-top: 30px;
    text-align: center;
}

.instiLogo {
    margin: 10px;
    height: 100px;
    transition: transform 0.3s ease;
}

.instiLogo:hover {
    transform: scale(1.1);
}

/* ===== DATE & HEADER ===== */
.dateDiv {
    font-size: 39px;
    font-weight: 600;
    text-align: center;
    margin-top: 10px;
    color: #ff5400;
}

/* ===== BUTTONS ===== */
.btn {
    border-radius: 30px;
    font-size: 22px;
    font-weight: 600;
    padding: 10px 35px;
    transition: all 0.3s ease;
    background-color: #014f86 !important;
    border: none;
}

.btn:hover {
    background-color: #012a4a !important;
    transform: scale(1.1);
    color: #fff;
}

/* ===== MAIN IMAGE CARD ===== */
.mainImg {
    min-width: 50vw;
    width: 100%;
    max-width: 90vw;
    border-radius: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    border: 3px solid rgba(255, 255, 255, 0.5);
}

/* ===== CONTENT BLOCK (CENTER) ===== */
.headr {
    background: rgba(255, 255, 255, 0.35);
    backdrop-filter: blur(12px);
    border-radius: 25px;
    padding: 15px;
    margin: 20px auto;
    width: 85%;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* ===== NOTES TEXT ===== */
.notes-text {
    font-size: 25px;
    font-weight: 600;
    /* color: #012a4a; */
    color: #012A4A;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .hero {
        width: 90%;
        font-size: 1.5rem;
        height: auto;
        padding: 20px;
    }

    .headr {
        width: 90%;
        padding: 20px;
    }

    .instiLogo {
        height: 60px;
    }

    .btn {
        width: 90%;
        margin-bottom: 15px;
    }

    .mainImg {
        border-radius: 20px;
    }
}
.itenary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    justify-items: center;
}

.itenary-img {
    width: 100%;
    max-width: 600px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

.itenary-img:hover {
    transform: scale(1.1);
}
.logoContainer{
    /* background: rgba(255, 255, 255, 0.35);
        */
    background-color: white;
    border-radius: 25px;
    border: 2px solid #012A4A;
    padding: 15px;
    margin: 20px auto;
    width: 18%;
}

/* Contact Section */
.contact-section {
    background: rgba(255, 255, 255, 0.35);
    backdrop-filter: blur(10px);
    border-radius: 25px;
    padding: 40px 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    color: #012a4a;
    width: 85%;
    margin: auto;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    justify-items: center;
    align-items: start;
}

.contact-card {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    padding: 20px;
    width: 100%;
    max-width: 350px;
    min-width: 350px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.contact-name {
    font-weight: 700;
    color: #012a4a;
}

.contact-role {
    color: #01497c;
    font-size: 0.95rem;
    margin-bottom: 10px;
}

.contact-link {
    color: #014f86;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-link:hover {
    color: #012a4a;
    text-decoration: underline;
}

.countdown-container {
    backdrop-filter: blur(12px);
    padding: 15px;
    margin: 20px auto;
    width: 85%;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);

}

.countdown-bg {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 20px;
  /* filter: brightness(70%); */
}

.mainCount {
  display: flex;
  justify-content: center;
  align-items: baseline;  
  gap: 10px;
  font-family: 'Poppins', sans-serif;
  margin-top: 20px;
}

.days1 {
  font-size: 5rem;        /* big number */
  font-weight: 900;
  color: #012A4A;         /* gold/yellow */
  animation: pop 1s ease-in-out infinite alternate;
  text-shadow: 2px 2px 6px white;
    
}

.daysTogo {
  font-size: 2rem;
  font-weight: 800;
  color: #01497C;
  margin: 10px;
}

@keyframes pop {
  0% { opacity: 1; transform: scale(1); color: #033270}
  100% { opacity: 1; transform: scale(1.4); color: #03327h}
}

@keyframes fadeIn {
  from { opacity: 0; transform: translate(-50%, -60%); }
  to { opacity: 1; transform: translate(-50%, -50%); }
}




.invite-section {
  color: black;
  text-align: center;
  padding: 60px 20px;
  border-radius: 20px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.25);
  margin: 50px auto;
  max-width: 750px;
  animation: fadeIn 1s ease-in-out;
}

.invite-section h2 {
  font-size: 2rem;
  margin-bottom: 10px;
}

.invite-section p {
  font-size: 1.1rem;
  margin-bottom: 25px;
}

.invite-btn {
  background: #ffb703;
  border: none;
  color: #000;
  font-size: 1.2rem;
  font-weight: 600;
  padding: 12px 30px;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.invite-btn:hover {
  background: #ffd166;
  transform: scale(1.05);
}

.social-buttons {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 20px;
  opacity: 0;
  transform: translateY(10px);
}

.fadeIn {
  animation: fadeInButtons 0.5s forwards;
}

@keyframes fadeInButtons {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.share-btn {
  padding: 12px 25px;
  border-radius: 30px;
  color: white;
  font-weight: 600;
  text-decoration: none;
  transition: transform 0.2s ease, background-color 0.3s ease;
}

.share-btn:hover {
  transform: scale(1.1);
}

/* Button Colors */
.fb { background: #4267B2; }
.wa { background: #25D366; }
.ig { background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF); }
.copy { background: #ffb703; color: #000; }

@media (max-width: 768px) {
    .contact-section {
        width: 90%;
        padding: 25px 15px;
    }
    .logoContainer{
        width: 60%;
    }
    .countdown-container {
        font-size: 10px !important;
        display: hidden;
    }
    .dateDiv {
        font-size: 25px;
    }

    .countdown-overlay {
        display: none;
        position: absolute;
        top: 30%;
        left: 50%;
        font-size: 3px !important;
    }
}
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


<!-- Invite Friends Section -->
<div class=" headr invite-section">
  <h2>Invite Your Friends!</h2>
  <p>Reunite and relive the memories!  
     Invite your batchmates to join the <strong>22<sup>nd</sup> Annual Alumni Meet</strong>.</p>

  <button id="invite-btn" class="invite-btn">Invite Friends</button>

  <div class="social-buttons" id="social-buttons" style="display:none;">
    <a href="#" class="share-btn fb" id="share-facebook" title="Share on Facebook">Facebook</a>
    <a href="#" class="share-btn wa" id="share-whatsapp" title="Share on WhatsApp">WhatsApp</a>
    <a href="#" class="share-btn ig" id="share-instagram" title="Share on Instagram">Instagram</a>
    <button class="share-btn copy" id="copy-link" title="Copy Link">Copy Link</button>
  </div>

  <p id="copy-msg" style="display:none; color:#fff; margin-top:10px;">✅ Link copied to clipboard!</p>
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
            <p class="contact-role">Office of Alumni Affairs</p>
            <p><strong>Phone:</strong> <a href="tel:+919836107544" class="contact-link">+91 98361 07544</a></p>
            <p><strong>Email:</strong> <a href="mailto:alumni@hijli.iitkgp.ac.in" class="contact-link">alumni@hijli.iitkgp.ac.in</a></p>
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

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    countdown1.textContent = days;
  }

  updateCountdown();
  setInterval(updateCountdown, 1000 * 60 * 60); // Update every hour



const shareUrl = window.location.href;
const shareText = "Join me at the 22nd Annual Alumni Meet at IIT Kharagpur! Don’t miss the fun!";

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
