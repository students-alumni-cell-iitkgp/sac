<?php
include 'header_aam.php'; // include your updated header
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Our Team | AAM</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: url(./../img/aa.webp) no-repeat center center fixed;
  background-size: cover;
  min-height: 100vh;
  justify-content: center;
  align-items: center;
}

.team-section {
  background-color: #2196F3;
  border-radius: 20px;
  padding: 50px 25px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
  max-width: 1100px;
  width: 100%;
  margin-top: 50px;
  margin-bottom: 50px;
}

.team-card {
  text-align: center;
  background: #E3F2FD;
  border-radius: 16px;
  padding: 25px 20px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.team-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 18px rgba(0,0,0,0.2);
}

.team-img {
  width: 130px;
  height: 130px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 15px;
  border: 3px solid #007bff;
}

.team-card h5 {
  margin-bottom: 5px;
}

.team-card p {
  margin: 3px 0;
  font-size: 15px;
}

@media (max-width: 768px) {
  body {
    align-items: flex-start;
    padding-top: 40px;
  }
  .team-section {
    margin: 10px;
    padding: 30px 15px;
  }
  .team-card {
    margin-bottom: 20px;
  }
  .team-img {
    width: 110px;
    height: 110px;
  }
}
</style>
</head>

<body>
<div class="container team-section text-center">
  <h2 class="fw-bold mb-4">Team</h2>
  <div class="row justify-content-center g-4">

    <!-- Team Member 1 -->
    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/rajas.jpeg" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Rajas Sangekar</h5>
        <p class="text-muted mb-1">General Secretary</p>
        <p class="mb-1">rajassangekar1855@gmail.com</p>
        <p>📞 +919975261910</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/aditi.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Aditi Singh</h5>
        <p class="text-muted mb-1">General Secretary</p>
        <p class="mb-1">aditisingh10@kgpian.iitkgp.ac.in</p>
        <p>📞 +918815395895</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/varun.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Varun Nikam</h5>
        <p class="text-muted mb-1">Coordinator</p>
        <p class="mb-1">varunsniitkgp27@gmail.com</p>
        <p>📞 +917558304939 </p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/sruthi.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Sruthi Killi</h5>
        <p class="text-muted mb-1">Coordinator</p>
        <p class="mb-1">killisruthi@kgpian.iitkgp.ac.in</p>
        <p>📞 +916301649289</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/anshu.jpg" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Anshu Sirigineedi</h5>
        <p class="text-muted mb-1">Coordinator</p>
        <p class="mb-1">anshus2706@gmail.com</p>
        <p>📞 +919347143833</p>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/soumya.jpg" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Soumya Kanta Das</h5>
        <p class="text-muted mb-1">Coordinator</p>
        <p class="mb-1">soumyakantadas2005@gmail.com</p>
        <p>📞 +917849085554</p>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/nirmal.jpg" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Nirmal Patidar</h5>
        <p class="text-muted mb-1">Web Head</p>
        <p class="mb-1">nirmalpatidar2533@gmail.com</p>
        <p>📞 +919165905280</p>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/rupesh.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Rupesh Sahoo</h5>
        <p class="text-muted mb-1">Web Head</p>
        <p class="mb-1">sahoosanjita809@gmail.com</p>
        <p>📞 +919078260658</p>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/rohith02.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Rohith Kumar</h5>
        <p class="text-muted mb-1">Public Relations Head (Design)</p>
        <p class="mb-1">Rohith.allaka@gmail.com</p>
        <p>📞 +919550227979</p>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/srinu.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Srinu Meda</h5>
        <p class="text-muted mb-1">Public Relations Head (Design)</p>
        <p class="mb-1">srinumeda0516@gmail.com</p>
        <p>📞 +916300707680</p>
      </div>
    </div>

        <div class="col-lg-4 col-md-4 col-sm-6">
      <div class="team-card">
        <img src="./../img/team2025/srujan.png" class="team-img" alt="Nirmal Sharma">
        <h5 class="fw-bold">Srujan Shyam Perumalla</h5>
        <p class="text-muted mb-1">Public Relations Head (Vediography)</p>
        <p class="mb-1">srujanshyamp@gmail.com</p>
        <p>📞 +918885506813</p>
      </div>
    </div>




  </div>
</div>
</body>
</html>