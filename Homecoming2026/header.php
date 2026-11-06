<?php
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['email']);
?>

<!-- Import Matching Typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet">

<style>

</style>



<script>
window.addEventListener("scroll", function() {
    const nav = document.getElementById("mainHeaderNav");
    if (nav) {
        nav.classList.toggle("scrolled", window.scrollY > 30);
    }
});
</script>