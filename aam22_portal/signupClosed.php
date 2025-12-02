<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Students' Alumni Cell | Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon">
  <link rel="stylesheet" href="./signups.css">
  <style>
    .palLogo{
      test-align: right;
    }
  </style>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* ===== GLOBAL ===== */
body {
  background: url('./aa2a.webp') no-repeat center center fixed;
  background-size: cover;
  /* min-height: 100vh; */
  color: #012a4a;
  font-family: 'Segoe UI', sans-serif;
  backdrop-filter: blur(30px);
}

.section1 {
  /* background: rgba(255, 255, 255, 0.9); */
  margin: 40px auto;
  padding: 30px;
  border-radius: 12px;
  max-width: 900px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

/* ===== HEADING ===== */
.heading-main {
  text-align: center;
  margin-bottom: 25px;
}

.heading-main h2 {
  color: #014f86;
  font-weight: 700;
  font-size: 1.6rem;
}

.instiLogo {
  display: inline-block;
  margin: 0 10px;
  height: 85px;
}
/* ===== ACCORDION ===== */
.accordion-button {
  background-color: #014f86;
  color: #fff;
  font-weight: 600;
  font-size: 1rem;
  transition: 0.3s ease;
}

.accordion-button:hover {
  background-color: #013a63;
  color: #fff;
}

.accordion-button:not(.collapsed) {
  background-color: #012a4a;
  color: #fff;
  box-shadow: none;
}

.accordion-item {
  border: none;
  margin-bottom: 10px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.accordion-body {
  background: #f8f9fa;
  border-radius: 0 0 10px 10px;
}

/* ===== FORM ===== */
.form-control, .form-select {
  border: 1px solid #ced4da;
  border-radius: 8px;
}

.form-floating > label {
  color: #495057;
}

.form-control:focus, .form-select:focus {
  border-color: #014f86;
  box-shadow: 0 0 0 0.2rem rgba(1, 79, 134, 0.25);
}

/* ===== TABLES ===== */
.table {
  border-collapse: collapse;
  background-color: #ffffff;
  border-radius: 10px;
  overflow: hidden;
  font-size: 0.95rem;
}

.table thead {
  background-color: #014f86;
  color: #fff;
  text-transform: uppercase;
}

.table th, .table td {
  padding: 12px 15px;
  text-align: left;
  vertical-align: middle;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f2f6fa;
}

.table-bordered th, .table-bordered td {
  border: 1px solid #dee2e6;
}

.table-responsive {
  border-radius: 8px;
  overflow-x: auto;
}

/* ===== CARDS ===== */
.card {
  border: none;
  border-radius: 12px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #014f86 !important;
  color: #ffffff;
  font-weight: 400;
  font-size: 1.1rem;
}

/* ===== NOTES / LISTS ===== */
.notes-text li {
  margin-bottom: 10px;
  line-height: 1.6;
}



/* ===== BUTTONS ===== */
.btn {
  border-radius: 8px;
  font-weight: 600;
  transition: all 0.2s ease-in-out;
}

.btn-light {
  background-color: #014f86;
  color: white;
  border: none;
}

.btn-light:hover {
  background-color: #012a4a;
  color: white;
  transform: scale(1.02);
}
.logoContainer{
    /* background: rgba(255, 255, 255, 0.35);
      */
    background-color: white;
    border-radius: 25px;
    border: 2px solid #012A4A;
    padding: 15px;
    margin: 20px auto;
    width: 300px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
  .section1 {
    margin: 20px;
    padding: 20px;
  }
    .logoContainer{
      width: 60%;
  }
  .heading-main h2 {
    font-size: 1.3rem;
  }
  .accordion-button {
    font-size: 0.95rem;
  }
  .logoContainer{
    width: 80%;
}
}

@media (max-width: 576px) {
  .table th, .table td {
    padding: 8px;
    font-size: 0.85rem;
  }

  .form-floating {
    margin-bottom: 15px !important;
  }
}
  </style>



</head>
<body>
<!-- <div class="heading-main">
    <h2 class="accordion-header" id="headingOne" >
        Registration for <br> 22nd Annual Alumni Meet
    </h2>
</div> -->

<div class="section1">
  <div class="heading-main">
      <div class="logoContainer text-center my-4">
          <div class="container">
                  <img class="instiLogo" src="./../img/logo/kgp_blue.png" alt="">
                  <img class="instiLogo" src="./img/palJubLogo.png" alt="">
          </div>
      </div> 
    <h2 class="accordion-header" id="headingOne" >
        Registration for the 22<sup>nd</sup> Annual Alumni Meet 2026 has Been Closed.

    </h2>
    <div>
      Registration for the event is now closed. We appreciate your interest and enthusiastic response. For any further queries, please feel free to contact the Office of Alumni Affairs (<a href="mailto:alumni@hijli.iitkgp.ac.in">alumni@hijli.iitkgp.ac.in</a>).
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function checkemailAvailability() {
    jQuery.ajax({
    url: "Utility/check_username_availablity.php",
    data:'email='+$("input[name=email]").val(),
    type: "POST",
    success:function(data){
    $("#user-email-availability-status").html(data);
    },
    error:function (){}
    });
}

function calc_cost() {
  let totalCost = 15000;
  let relation = document.getElementById("acc_relation").value;
  let name = document.getElementById("acc_name").value;

  if (relation === "Non" || relation === "") {
    totalCost = 15000;
    if(name == ""){
      
    }else{
      totalCost += 7000;
    }
  } else {
    totalCost += 7000;
  }


  document.getElementById("acp").value = totalCost;
}

</script>

</body>
</html>
