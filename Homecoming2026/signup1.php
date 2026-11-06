<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumni Registration Wizard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <style>
    body {
        background: linear-gradient(135deg, #eef4ff, #f8fbff);
        font-family: 'Segoe UI', sans-serif;
    }

    .wizard-card {
        max-width: 1100px;
        margin: 40px auto;
        border: none;
        border-radius: 22px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .12);
    }

    .wizard-header {
        background: linear-gradient(135deg, #003566, #00509d, #0077b6);
        color: #fff;
        padding: 40px;
        text-align: center;
    }

    .wizard-header h2 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .wizard-header p {
        opacity: .9;
    }

    .stepper {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 35px 40px 25px;
        background: #fff;
    }

    .progress-line {
        position: absolute;
        top: 63px;
        left: 9%;
        right: 9%;
        height: 5px;
        background: #dee2e6;
        border-radius: 30px;
        z-index: 0;
    }

    .progress-fill {
        height: 100%;
        width: 0%;
        border-radius: 30px;
        background: linear-gradient(90deg, #0d6efd, #20c997);
        transition: width .4s ease;
    }

    .step {

        position: relative;

        z-index: 2;

        text-align: center;

        flex: 1;

        cursor: pointer;

        transition: .3s;

    }

    .step-circle {

        width: 58px;

        height: 58px;

        margin: auto;

        border-radius: 50%;

        background: white;

        border: 4px solid #ced4da;

        display: flex;

        align-items: center;

        justify-content: center;

        font-weight: bold;

        font-size: 20px;

        position: relative;

        transition: .35s;

    }

    .step-number {

        display: block;

    }

    .step-check {

        display: none;

        font-size: 24px;

    }

    .step.active .step-circle {

        background: #0d6efd;

        border-color: #0d6efd;

        color: white;

        box-shadow: 0 10px 25px rgba(13, 110, 253, .30);

        transform: scale(1.1);

    }

    .step.completed .step-circle {

        background: #198754;

        border-color: #198754;

        color: white;

    }

    .step.completed .step-number {

        display: none;

    }

    .step.completed .step-check {

        display: block;

    }

    .step-title {

        margin-top: 15px;

        font-size: 15px;

        font-weight: 700;

        color: #212529;

    }

    .step small {

        display: block;

        font-size: 12px;

        color: #6c757d;

        margin-top: 4px;

    }

    .step:hover {

        transform: translateY(-3px);

    }

    .step.active .step-title {

        color: #0d6efd;

    }

    .step.completed .step-title {

        color: #198754;

    }

    .step-pane {

        display: none;

        animation: fade .4s;
    }

    .step-pane.active {

        display: block;
    }

    @keyframes fade {

        from {

            opacity: 0;
            transform: translateY(20px);

        }

        to {

            opacity: 1;
            transform: translateY(0);

        }

    }

    /* ===========================
   Premium Form Controls
=========================== */

    .form-floating {
        margin-bottom: 22px;
    }

    .form-control,
    .form-select {
        height: 64px;
        border-radius: 16px;
        border: 1.5px solid #dce5f2;
        background: #ffffff;
        font-size: 15px;
        font-weight: 500;
        color: #2d3748;
        transition: all .35s ease;
        box-shadow: 0 4px 12px rgba(15, 23, 42, .04);
    }

    .form-floating label {
        padding-left: 18px;
        color: #6b7280;
        font-weight: 500;
    }

    /* Hover */

    .form-control:hover,
    .form-select:hover {
        border-color: #9ec5fe;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .08);
    }

    /* Focus */

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        background: #fff;
        box-shadow:
            0 0 0 4px rgba(13, 110, 253, .10),
            0 12px 24px rgba(13, 110, 253, .12);
    }

    /* Placeholder */

    .form-control::placeholder {
        color: #b5b5b5;
    }


    /* ===========================
   Buttons
=========================== */

    .btn {

        border: none;

        border-radius: 14px;

        padding: 13px 34px;

        font-size: 15px;

        font-weight: 600;

        letter-spacing: .3px;

        transition: all .3s ease;

    }


    /* Previous */

    .btn-secondary {

        background: #eef2f7;

        color: #374151;

    }

    .btn-secondary:hover {

        background: #dbe3ef;

        color: #111827;

        transform: translateY(-2px);

    }


    /* Next */

    .btn-primary {

        background: linear-gradient(135deg, #0052D4, #1E88E5);

        color: #fff;

    }

    .btn-primary:hover {

        transform: translateY(-3px);

        box-shadow: 0 12px 25px rgba(13, 110, 253, .28);

    }


    /* Submit */

    .btn-success {

        background: linear-gradient(135deg, #11998E, #38EF7D);

        color: #fff;

    }

    .btn-success:hover {

        transform: translateY(-3px);

        box-shadow: 0 12px 25px rgba(25, 135, 84, .28);

    }


    /* Click Effect */

    .btn:active {

        transform: scale(.98);

    }


    /* ===========================
   Cards
=========================== */

    .step-pane {

        background: #fff;

        padding: 30px;

        border-radius: 18px;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, .05);

    }


    /* ===========================
   Responsive
=========================== */

    @media(max-width:768px) {

        .form-control,
        .form-select {

            height: 58px;

        }

        .btn {

            width: 100%;

            margin-bottom: 10px;

        }

    }

    .wizard-body {
        padding: 25px;
    }

    .wizard-footer {

        background: #f8f9fa;

        padding: 25px;

        display: flex;

        justify-content: space-between;

        align-items: center;

        border-top: 1px solid #eee;

    }

    .table {

        border-radius: 15px;

        overflow: hidden;

    }

    .table thead {

        background: #003566;

        color: white;

    }

    .card {

        border: none;

        border-radius: 18px;

        box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

    }

    .card-header {

        background: linear-gradient(135deg, #003566, #00509d);

        color: white;

        font-size: 18px;

        font-weight: 600;

    }

    .alert {

        border: none;

        border-radius: 15px;

    }

    .alert-info {

        background: #eef7ff;

    }

    .alert-warning {

        background: #fff9e6;

    }

    @media(max-width:768px) {

        .stepper {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 25px;

        }

        .stepper::before {

            display: none;

        }

    }



    .section-header {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 22px 28px;
        background: linear-gradient(135deg, #0d6efd, #003566);
        border-radius: 18px;
        color: #fff;
        margin-bottom: 30px;
    }

    .section-icon {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .15);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 28px;
    }

    .section-header h3 {
        margin: 0;
        font-weight: 700;
    }

    .section-header p {
        margin: 4px 0 0;
        opacity: .9;
    }

    .form-card {
        background: #fff;
        border-radius: 18px;
        padding: 28px;
        border: 1px solid #edf2f7;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .05);
    }

    .card-title {
        font-size: 18px;
        font-weight: 700;
        color: #003566;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #eef4ff;
    }

    .premium-field {
        margin-bottom: 18px;
    }

    .premium-field .form-control,
    .premium-field .form-select {
        border-radius: 14px;
        border: 1px solid #dfe7f3;
        height: 60px;
        background: #fbfdff;
        transition: .3s;
    }

    .premium-field .form-control:focus,
    .premium-field .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, .10);
        background: #fff;
    }

    /*=============================
  Section Title
=============================*/

    .section-title-card {
        display: flex;
        align-items: center;
        gap: 16px;
        background: #fff;
        border: 1px solid #e9eef5;
        border-left: 5px solid #0d6efd;
        border-radius: 14px;
        padding: 18px 22px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
    }

    .title-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #eef5ff;
        color: #00000;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .title-content h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        color: #1e293b;
    }

    .title-content span {
        display: block;
        margin-top: 4px;
        color: #6b7280;
        font-size: 14px;
    }

    @media(max-width:768px) {

        .section-title-card {
            padding: 15px;
            gap: 12px;
        }

        .title-icon {
            width: 46px;
            height: 46px;
            font-size: 20px;
        }

        .title-content h4 {
            font-size: 19px;
        }

        .title-content span {
            font-size: 13px;
        }

    }

    .form-control.is-invalid,
    .form-select.is-invalid {

        border: 2px solid #dc3545 !important;
        box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .15);

    }

    .form-control.is-valid,
    .form-select.is-valid {

        border: 2px solid #198754;

    }

    .hidden-section {
        display: none;
    }

    .custom-section-card {
        border: 1px solid #e0e6ed;
        border-radius: 12px;
        background-color: #f8fafc;
        transition: all 0.3s ease;
    }

    .btn-check:checked+.btn-outline-primary {
        background-color: #0d6efd;
        color: #fff;
        box-shadow: 0 4px 10px rgba(13, 110, 253, 0.25);
    }

    .conditional-box {
        background: #ffffff;
        border-left: 4px solid #0d6efd;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    </style>
</head>

<body>

    <div class="wizard-card">

        <div class="wizard-header">
            <h2 class="mb-1">Registration for the Homecoming 2026</h2>
            <p class="mb-0">Complete all steps and submit your registration</p>
        </div>

        <div class="stepper">

            <div class="progress-line">
                <div class="progress-fill"></div>
            </div>

            <div class="step active" data-step="0">
                <div class="step-circle">
                    <span class="step-number">1</span>
                    <span class="step-check">✓</span>
                </div>
                <div class="step-title">Personal</div>
                <small>Basic Details</small>
            </div>

            <div class="step" data-step="1">
                <div class="step-circle">
                    <span class="step-number">2</span>
                    <span class="step-check">✓</span>
                </div>
                <div class="step-title">Work</div>
                <small>Career</small>
            </div>

            <div class="step" data-step="2">
                <div class="step-circle">
                    <span class="step-number">3</span>
                    <span class="step-check">✓</span>
                </div>
                <div class="step-title">IIT</div>
                <small>Affiliation</small>
            </div>

            <div class="step" data-step="3">
                <div class="step-circle">
                    <span class="step-number">4</span>
                    <span class="step-check">✓</span>
                </div>
                <div class="step-title">Payment</div>
                <small>Registration</small>
            </div>

            <div class="step" data-step="4">
                <div class="step-circle">
                    <span class="step-number">5</span>
                    <span class="step-check">✓</span>
                </div>
                <div class="step-title">Stay</div>
                <small>Accommodation</small>
            </div>

            <div class="step" data-step="5">
                <div class="step-circle">
                    <span class="step-number">6</span>
                    <span class="step-check">✓</span>
                </div>
                <div class="step-title">Travel</div>
                <small>Journey</small>
            </div>
        </div>
        <form action="register.php" method="POST" enctype="multipart/form-data" id="wizardForm">

            <div class="wizard-body">
                <div class="step-pane active">

                    <!-- Premium Header -->
                    <div class="section-title-card mb-4">

                        <div class="title-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="title-content">
                            <h4>Personal Details</h4>
                            <span>Please provide your personal information exactly as per the institute records.</span>
                        </div>

                    </div>

                    <!-- Contact Information -->
                    <div class="form-card">
                        <div class="card-title">

                            Contact Information
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="text" class="form-control" name="name" maxlength="150" required
                                        placeholder=" ">
                                    <label>Name (as per records)<span class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="email" class="form-control" name="email" maxlength="100" required
                                        placeholder=" ">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="text" class="form-control" name="mobile" required placeholder=" ">
                                    <label>Cell Number <span class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="date" class="form-control" name="dob" required>
                                    <label>Date of Birth <span class="text-danger">*</span></label>
                                </div>
                            </div>

                        </div>

                    </div>


                    <!-- Identity -->
                    <div class="form-card mt-4">

                        <div class="card-title">
                            Identity Verification
                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-floating premium-field">

                                    <select class="form-select" name="idtype" required>

                                        <option value="">Select</option>

                                        <option>Aadhar Card</option>

                                        <option>Passport</option>

                                        <option>PAN Card</option>

                                        <option>Driving License</option>

                                        <option>OCI Card</option>

                                    </select>

                                    <label>ID Type <span class="text-danger">*</span></label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-floating premium-field">

                                    <input class="form-control" name="idnumber" required placeholder=" ">

                                    <label>ID Number <span class="text-danger">*</span></label>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- Address -->
                    <div class="form-card mt-4">

                        <div class="card-title">
                            Address Details
                        </div>

                        <div class="form-floating premium-field mb-3">

                            <input class="form-control" name="address" required placeholder=" ">

                            <label>Address <span class="text-danger">*</span></label></label>

                        </div>

                        <div class="form-floating premium-field mb-3">

                            <input class="form-control" name="social_links" placeholder=" ">

                            <label>Social Media Link</label>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-floating premium-field">

                                    <input class="form-control" name="city" required placeholder=" ">

                                    <label>City <span class="text-danger">*</span></label></label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-floating premium-field">

                                    <input class="form-control" name="state" required placeholder=" ">

                                    <label>State <span class="text-danger">*</span></label></label>

                                </div>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6">

                                <div class="form-floating premium-field">

                                    <input class="form-control" name="country" required placeholder=" ">

                                    <label>Country <span class="text-danger">*</span></label></label>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-floating premium-field">

                                    <input class="form-control" name="zipcode" required placeholder=" ">

                                    <label>Zip Code <span class="text-danger">*</span></label></label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="step-pane">

                    <div class="section-card">

                        <div class="section-title-card mb-4">

                            <div class="title-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>

                            <div class="title-content">
                                <h4>Work Details</h4>
                                <span>Share your current professional information.</span>
                            </div>

                        </div>


                        <div class="section-body">

                            <!-- Current Position -->
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Current Position
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" class="form-control" name="profession"
                                            placeholder="Software Engineer" maxlength="100" required>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Current Designation
                                        </label>

                                        <input type="text" class="form-control" name="designation"
                                            placeholder="Senior Software Engineer" maxlength="100">

                                    </div>
                                </div>

                            </div>


                            <!-- Organization -->
                            <div class="row g-4 mt-1">

                                <div class="col-md-12">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Organisation Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" class="form-control" name="organisation"
                                            placeholder="Google, Microsoft, IIT Kharagpur" maxlength="100" required>

                                    </div>
                                </div>

                            </div>


                            <!-- Address -->
                            <div class="row g-4 mt-1">

                                <div class="col-md-12">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Office Address
                                        </label>

                                        <input type="text" class="form-control" name="waddress"
                                            placeholder="Street, Area, Building" maxlength="200">

                                    </div>
                                </div>

                            </div>


                            <!-- City / State -->
                            <div class="row g-4 mt-1">

                                <div class="col-md-6">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            City
                                        </label>

                                        <input type="text" class="form-control" name="wcity" placeholder="Kolkata"
                                            maxlength="50">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            State
                                        </label>

                                        <input type="text" class="form-control" name="wstate" placeholder="West Bengal"
                                            maxlength="50">

                                    </div>
                                </div>

                            </div>


                            <!-- Country / Zip -->
                            <div class="row g-4 mt-1">

                                <div class="col-md-6">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Country
                                        </label>

                                        <input type="text" class="form-control" name="wcountry" placeholder="India"
                                            maxlength="50">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Zip Code
                                        </label>

                                        <input type="text" class="form-control" name="wzipcode" placeholder="700001"
                                            maxlength="20">

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- ==========================================
        STEP 3 : IIT AFFILIATION
=========================================== -->
                <div class="step-pane">

                    <div class="section-card">
                        <div class="section-title-card mb-4">

                            <div class="title-icon">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>

                            <div class="title-content">
                                <h4>IIT Kharagpur Affiliation</h4>
                                <span>Tell us about your academic journey at IIT Kharagpur.</span>
                            </div>

                        </div>



                        <div class="section-body">

                            <!-- Course & Degree -->
                            <div class="row g-4">

                                <div class="col-lg-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Academic Course Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input name="course" type="text" class="form-control"
                                            placeholder="Computer Science & Engineering" maxlength="120" required>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Degree (Mention the first Degree)
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-select" name="degree" required>

                                            <option value="" selected disabled>Select Degree</option>

                                            <option>BTech</option>
                                            <option>DualDegree</option>
                                            <option>BArch</option>
                                            <option>BSc</option>
                                            <option>MTech</option>
                                            <option>MSc(Integrated)</option>
                                            <option>MSc(Two years)</option>
                                            <option>MCP</option>
                                            <option>MRP</option>
                                            <option>MBA</option>
                                            <option>LLB</option>
                                            <option>MMST</option>
                                            <option>DIIT</option>
                                            <option>PGDST</option>
                                            <option>PGDBA</option>
                                            <option>EMBA</option>
                                            <option>LLM</option>
                                            <option>MS</option>
                                            <option>Other</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <!-- Department & Hall -->

                            <div class="row g-4 mt-1">

                                <div class="col-lg-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Department
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-select" name="dept" required>

                                            <option selected disabled>Choose Department</option>
                                            <option value="AE">Aerospace Engineering</option>
                                            <option value="AG">Agricultural & Food Engineering</option>
                                            <option value="AR">Architecture & Regional Planning</option>
                                            <option value="BT">Biotechnology</option>
                                            <option value="CE">Civil Engineering</option>
                                            <option value="CH">Chemical Engineering</option>
                                            <option value="CS">Computer Science & Engineering</option>
                                            <option value="CY">Chemistry</option>
                                            <option value="EE">Electrical Engineering</option>
                                            <option value="EC">Electronics & Electrical Communication Engineering
                                            </option>
                                            <option value="GG">Geology & Geophysics</option>
                                            <option value="HS">Humanities & Social Sciences</option>
                                            <option value="IM">Industrial & Systems Engineering</option>
                                            <option value="MA">Mathematics</option>
                                            <option value="ME">Mechanical Engineering</option>
                                            <option value="MT">Metallurgical & Materials Engineering</option>
                                            <option value="MI">Mining Engineering</option>
                                            <option value="NA">Ocean Engineering & Naval Architecture</option>
                                            <option value="PH">Physics</option>
                                            <option value="ATDC">Advanced Technology Development Center</option>
                                            <option value="CET">Center for Educational Technology</option>
                                            <option value="CYE">Cryogenic Engineering</option>
                                            <option value="MS">Materials Science</option>
                                            <option value="ORALS">Oceans, Rivers, Atmosphere and Land Sciences</option>
                                            <option value="CBE">P K Sinha Centre for Bio Energy</option>
                                            <option value="REC">Reliability Engineering Centre</option>
                                            <option value="RTC">Rubber Technology Centre</option>
                                            <option value="RDC">Rural Development Centre</option>
                                            <option value="GSSST">G S Sanyal School of Telecommunications</option>
                                            <option value="IT">Information Technology</option>
                                            <option value="RCIM">Ranbir & Chitra Gupta School</option>
                                            <option value="RMSEE">Rajendra Mishra School</option>
                                            <option value="RGSIPL">Rajiv Gandhi School of IPL</option>
                                            <option value="MST">Medical Science & Technology</option>
                                            <option value="SB">School of Bioscience</option>
                                            <option value="SEST">School of Environment Science</option>
                                            <option value="SES">School of Energy Science</option>
                                            <option value="SNST">School of Nano Science</option>
                                            <option value="SWS">School of Water Resources</option>
                                            <option value="VGSOM">Vinod Gupta School of Management</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="premium-input">
                                        <label class="premium-label">
                                            Hall of Residence
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" name="hall" required>
                                            <option selected disabled>Select Hall</option>
                                            <option>Sir Ashutosh Mukherjee Hall</option>
                                            <option>Azad Hall</option>
                                            <option>B C Roy Hall</option>
                                            <option>B R Ambedkar Hall</option>
                                            <option>Gokhale Hall</option>
                                            <option>Homi J Bhabha Hall</option>
                                            <option>J C Bose Hall</option>
                                            <option>Lala Lajpat Rai Hall</option>
                                            <option>Lal Bahadur Shastri Hall</option>
                                            <option>Madan Mohan Malviya Hall</option>
                                            <option>Megnad Saha Hall</option>
                                            <option>Mother Teresa Hall</option>
                                            <option>Nehru Hall</option>
                                            <option>Patel Hall</option>
                                            <option>Radha Krishnan Hall</option>
                                            <option>Rajendra Prasad Hall</option>
                                            <option>Rani Laxmibai Hall</option>
                                            <option>Sarojini Naidu Hall</option>
                                            <option>Sister Nivedita Hall</option>
                                            <option>Vidyasagar Hall</option>
                                            <option>Vikram Sarabhai Residential Complex</option>
                                            <option>Zakir Hussain Hall</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Position -->

                            <div class="row g-4 mt-1">
                                <div class="col-12">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Position Held at IIT KGP
                                        </label>

                                        <input name="positionHolding" class="form-control"
                                            placeholder="Any Position Held in KGP (Eg. HP, Captain, VP, GSec, Secy, etc)"
                                            maxlength="100">

                                    </div>

                                </div>

                            </div>



                            <!-- Section 1: Nearest Alumni Chapter -->
                            <!-- Stylish HTML Section -->
                            <div class="card custom-section-card p-4 mb-4 mt-4 shadow-sm">
                                <!-- Main Question Header -->
                                <label class="form-label text-dark mb-3">
                                    Are you a part of
                                    nearest alumni chapter?
                                </label>

                                <!-- Radio Buttons as Segmented Control -->
                                <div class="d-flex gap-3 mb-2">
                                    <input type="radio" class="btn-check" name="nearest_alumni_chapter" id="chapterYes"
                                        value="yes" autocomplete="off">
                                    <label class="btn btn-outline-primary px-4 py-2 rounded-pill fw-medium"
                                        for="chapterYes">
                                        <i class="bi bi-check-circle me-1"></i> Yes
                                    </label>

                                    <input type="radio" class="btn-check" name="nearest_alumni_chapter" id="chapterNo"
                                        value="no" autocomplete="off">
                                    <label class="btn btn-outline-primary px-4 py-2 rounded-pill fw-medium"
                                        for="chapterNo">
                                        <i class="bi bi-x-circle me-1"></i> No
                                    </label>
                                </div>

                                <!-- Conditional 1: If Yes -> Chapter Name Input -->
                                <div id="chapterNameSection" class="mt-3 p-3 conditional-box hidden-section">
                                    <label for="chapterName" class="form-label fw-medium text-secondary">
                                        Chapter Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted"><i
                                                class="bi bi-building"></i></span>
                                        <input type="text" class="form-control form-control-lg fs-6" id="chapterName"
                                            name="chapter_name_interested_associating_with"
                                            placeholder="e.g. New York Alumni Chapter">
                                    </div>
                                </div>

                                <!-- Conditional 2: If No -> Interest Section -->
                                <div id="associateInterestSection"
                                    class="mt-3 p-3 conditional-box border-warning hidden-section"
                                    style="border-left-color: #ffc107;">
                                    <label class="form-label fw-medium text-dark mb-2">
                                        Would you be interested in associating with one?
                                    </label>
                                    <div class="d-flex gap-2">
                                        <!-- associate_interest -->
                                        <input type="radio" class="btn-check"
                                            name="chapter_name_interested_associating_with" id="associateYes"
                                            value="yes" autocomplete="off">
                                        <label class="btn btn-outline-secondary px-3 py-1 rounded-pill btn-sm"
                                            for="associateYes">Yes</label>

                                        <input type="radio" class="btn-check"
                                            name="chapter_name_interested_associating_with" id="associateNo" value="no"
                                            autocomplete="off">
                                        <label class="btn btn-outline-secondary px-3 py-1 rounded-pill btn-sm"
                                            for="associateNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 mt-1">
                                <div class="col-12">
                                    <div class="premium-input">

                                        <label class="premium-label">
                                            How would you like to contribute to IIT Kharagpur?
                                        </label>

                                        <input type="text" name="contribute" class="form-control">


                                    </div>

                                </div>

                            </div>

                            <!-- Years -->

                            <div class="row g-4 mt-1">

                                <div class="col-md-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Joining Year
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="number" name="yoj" class="form-control" min="1951" max="2035"
                                            placeholder="2005" required>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Graduation Year
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="number" name="yog" class="form-control" min="1951" max="2035"
                                            placeholder="2009" required>
                                        <div class="invalid-feedback">
                                            Graduation Year must be less than Joining Year.
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="step-pane">


                    <div class="section-title-card mb-4">

                        <div class="title-icon">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                        </div>

                        <div class="title-content">
                            <h4 class="mb-4">Payment Details</h4>
                            <span>Payment details and bank information are provided below.</span>

                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Registration Fee <span class="text-danger">*</span></th>
                                    <th>Amount (INR)</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Per Alumnus / Alumna</td>
                                    <td><strong>12000</strong></td>
                                </tr>

                                <tr>
                                    <th>2</th>
                                    <td>Per Accompanying Person</td>
                                    <td><strong>8000</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-muted mb-1">
                        <strong>Registration Fee includes Food, Transportation, Registration Kit, etc.</strong>
                    </p>

                    <p class="text-muted mb-4">
                        <strong>Kids below the age of 10 years accompanying a participant have no registration
                            fee.</strong>
                    </p>
                    <!-- Accompanying Person -->
                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="premium-input">

                                <label class="premium-label">
                                    Accompanying Adult Relation
                                    <span class="text-danger">*</span>
                                </label>

                                <select class="form-select" name="acc_relation" id="acc_relation" oninput="calc_cost()"
                                    required>

                                    <option value="Non" selected>No</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Other">Other</option>

                                </select>

                                <small class="text-muted mt-2 d-block">
                                    Select if someone is accompanying you.
                                </small>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="premium-input">

                                <label class="premium-label">
                                    Accompanying Adult Name
                                </label>

                                <input type="text" class="form-control" id="acc_name" name="acc_name"
                                    placeholder="Enter Full Name" oninput="calc_cost()">

                                <small class="text-muted mt-2 d-block">
                                    Leave blank if no accompanying adult.
                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-md-4 mb-4">

                            <label class="form-label fw-bold">
                                Total Registration Fee
                            </label>

                            <input type="text" class="form-control" id="acp" name="acp" placeholder="12000" readonly>

                        </div>

                    </div>

                    <div class="card shadow border-0 rounded-4">

                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0">
                                Bank Details for Depositing Registration Fees
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-lg-7">

                                    <ul class="list-unstyled fs-6 mb-0">

                                        <li><strong>Bank Name :</strong> HDFC</li>
                                        <li><strong>Account Name :</strong> IIT Kharagpur Alumni Event Fund</li>
                                        <li><strong>Account Number :</strong> 50100856454247</li>
                                        <li><strong>IFSC :</strong> HDFC0010942</li>
                                        <li><strong>MICR :</strong> 721240004</li>
                                        <li><strong>SWIFT Code :</strong> HDFCINBB</li>

                                    </ul>

                                </div>

                                <div class="col-lg-5 text-center mt-4 mt-lg-0">

                                    <img src="./img/qrCode.jpeg" class="img-fluid rounded border p-2"
                                        style="max-width:230px; height:420px" alt="QR Code">

                                    <p class="mt-2 mb-1 text-muted">
                                        Scan to Pay
                                    </p>

                                    <small class="text-muted">
                                        <strong>This QR Code is for Indian UPI Payments only.</strong>
                                    </small>

                                </div>

                                <div class="col-lg-12 text-center mt-4 mt-lg-0">



                                    <p class="mt-2 mb-1 alert alert-warning ">
                                        <strong>For online payment (UPI, Credit/Debit Card, or Net Banking),
                                            you may log
                                            in to your account and complete the payment.</strong>
                                    </p>



                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- ===========================
     STEP 5 : ACCOMMODATION & FOOD
============================ -->
                <div class="step-pane">

                    <!-- ==========================================
        STEP 5 : ACCOMMODATION & FOOD
========================================== -->

                    <div class="section-card">



                        <div class="section-title-card mb-4">

                            <div class="title-icon">
                                <i class="fa-solid fa-hotel"></i>
                            </div>

                            <div class="title-content">
                                <h4 class="mb-4">Accommodation & Food</h4>
                                <span>Help us arrange comfortable accommodation and meals for your visit.</span>

                            </div>

                        </div>


                        <div class="section-body">

                            <div class="row g-4">

                                <!-- Food Preference -->
                                <div class="col-lg-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Food Preference
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-select" name="foodPreference" required>

                                            <option selected disabled>
                                                Select Food Preference
                                            </option>

                                            <option value="VEG">
                                                🥗 Vegetarian
                                            </option>

                                            <option value="NONVEG">
                                                🍗 Non-Vegetarian
                                            </option>

                                            <option value="VEGAN">
                                                🥦 Vegan
                                            </option>

                                            <option value="OTHER">
                                                🍽 Other
                                            </option>

                                        </select>

                                        <small class="text-muted mt-2 d-block">
                                            Your preferred meal option during the event.
                                        </small>

                                    </div>

                                </div>

                                <!-- Medical -->
                                <div class="col-lg-6">

                                    <div class="premium-input">

                                        <label class="premium-label">
                                            Health Restrictions
                                        </label>

                                        <input type="text" class="form-control" id="medical" name="medical"
                                            placeholder="Diabetic, Allergies, Gluten-Free, etc.">

                                        <small class="text-muted mt-2 d-block">
                                            Leave blank if none.
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="alert alert-info">

                        <h5 class="mb-3">
                            Accommodation
                        </h5>

                        <p class="mb-0">
                            We would be delighted to accommodate you on campus.
                            However, please note that campus accommodation is limited,
                            and we are expecting a higher turnout this Platinum Jubilee year.
                            Therefore, most accommodations will be on a shared basis.
                            We seek your kind understanding and cooperation in this regard.
                        </p>

                    </div>

                    <div class="card shadow-sm border-0">

                        <div class="card-header bg-primary text-white">
                            <strong>Accommodation Policy</strong>
                        </div>

                        <div class="card-body">

                            <ul class="mb-3">

                                <li class="mb-2">
                                    The details of room allocation will be shared one week prior to the event.
                                </li>

                                <li class="mb-2">
                                    In view of the increased number of participants,
                                    accommodation inside the campus will mostly be offered
                                    on a sharing basis.
                                </li>

                                <li class="mb-2">
                                    In case of an overwhelming response,
                                    participants may be accommodated
                                    in nearby hotels.
                                    Further details will be shared later.
                                </li>

                                <li class="mb-2">
                                    Registration fee includes the musical night,
                                    entertainment,
                                    registration kit,
                                    three days' food,
                                    and local campus transportation.

                                    Technology Guest House accommodation charges
                                    are to be paid directly by the participant.
                                </li>

                                <li class="mb-2">
                                    Participants are requested to complete registration,
                                    make the payment,
                                    and share the transaction details with the
                                    Office of Alumni Affairs
                                    (<a href="mailto:anamika.das@adm.iitkgp.ac.in">
                                        anamika.das@adm.iitkgp.ac.in
                                    </a>)
                                    for confirmation.
                                </li>

                            </ul>
                            <!-- 
                            <div class="alert alert-warning mb-0">

                                <strong>Accommodation Charge</strong>

                                <br>

                                Current accommodation rate for a
                                double-bedded room at the
                                Technology Guest House is

                                <strong>₹2100/day (Inclusive of GST).</strong>

                            </div> -->

                        </div>

                    </div>

                </div>

                <!-- =====================================
     STEP 6 : TRAVEL DETAILS
===================================== -->
                <!-- ================= Travel Step ================= -->

                <div class="step-pane">


                    <div class="section-title-card mb-4">

                        <div class="title-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div class="title-content">
                            <h4 class="mb-4">Travel Details</h4>
                            <span>Please share your arrival and departure schedule to help us arrange campus
                                transportation.</span>
                        </div>

                    </div>


                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4">

                            <!-- Arrival Mode -->

                            <div class="section-subtitle mb-3">
                                <span class="badge bg-primary">Transportation</span>
                            </div>

                            <div class="row">

                                <div class="col-12 mb-4">

                                    <!-- <label class="form-label fw-semibold">
                                        Mode of Arrival
                                    </label>

                                    <div class="input-group input-group-modern">

                                        <span class="input-group-text">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </span>
                                        <select>
                                            <option value="Flight">Flight</option>
                                            <option value="">Train</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Cap">Cap</option>
                                            <option value="Others">Others</option>
                                        </select>






                                    <input type="text" class="form-control" name="arrivalMode"
                                        placeholder="By Flight, Train, Road, Bus, Taxi etc.">

                                </div>-->
                                    <label for="modeOfArrival" class="form-label fw-bold">Mode of Arrival</label>
                                    <select class="form-select" id="modeOfArrival" name="arrivalMode">
                                        <option value="" selected disabled>-- Select Mode of Arrival --</option>
                                        <option value="flight">Flight</option>
                                        <option value="train">Train</option>
                                        <option value="car">Personal Car</option>
                                        <option value="cap">Cap</option>
                                        <option value="bus">Bus</option>
                                        <option value="others">Others</option>
                                    </select>

                                    <!-- If Others: Description Input -->
                                    <div id="modeDescriptionSection" class="mt-3 hidden-section">
                                        <label for="modeDescription" class="form-label">Mode Description <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="modeDescription"
                                            name="mode_description" placeholder="Please specify your mode of arrival">
                                    </div>


                                </div>

                            </div>

                            <hr class="my-4">

                            <!-- Arrival -->

                            <div class="section-subtitle mb-3">
                                <span class="badge bg-success">
                                    Arrival Schedule
                                </span>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">

                                    <label class="form-label fw-semibold">
                                        Arrival Date
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group input-group-modern">

                                        <span class="input-group-text">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </span>

                                        <input type="date" class="form-control" name="dateOfArr" required>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="form-label fw-semibold">
                                        Arrival Time
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group input-group-modern">

                                        <span class="input-group-text">
                                            <i class="fa-solid fa-clock"></i>
                                        </span>

                                        <input type="time" class="form-control" name="timeOfArr" required>

                                    </div>

                                </div>

                            </div>

                            <hr class="my-4">

                            <!-- Departure -->

                            <div class="section-subtitle mb-3">
                                <span class="badge bg-danger">
                                    Departure Schedule
                                </span>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">

                                    <label class="form-label fw-semibold">
                                        Departure Date
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group input-group-modern">

                                        <span class="input-group-text">
                                            <i class="fa-solid fa-calendar-check"></i>
                                        </span>

                                        <input type="date" class="form-control" name="dateOfDep" required>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="form-label fw-semibold">
                                        Departure Time
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group input-group-modern">

                                        <span class="input-group-text">
                                            <i class="fa-solid fa-business-time"></i>

                                        </span>

                                        <input type="time" class="form-control" name="timeOfDep" required>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Information Card -->

                    <div class="info-box mt-4">

                        <div class="info-icon">
                            <i class="bi bi-bus-front-fill"></i>
                        </div>

                        <div>

                            <h5>Transportation Facility</h5>

                            <p class="mb-0">
                                Shuttle buses and local transportation will be arranged for all registered
                                participants during the Annual Alumni Meet. Final pickup schedules will
                                be shared before the event.
                            </p>

                        </div>

                    </div>

                </div>
            </div>

            <div class="wizard-footer">
                <button type="button" class="btn btn-warning" id="prevBtn" disabled>Previous</button>

                <div class="ms-auto d-flex gap-2">
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                    <button type="submit" class="btn btn-success d-none" id="submitBtn">Submit Registration</button>
                </div>
            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- 1. Alumni Chapter Toggle Logic ---
        const chapterYes = document.getElementById("chapterYes");
        const chapterNo = document.getElementById("chapterNo");
        const chapterNameSection = document.getElementById("chapterNameSection");
        const associateInterestSection = document.getElementById("associateInterestSection");

        function toggleChapterSections() {
            if (chapterYes.checked) {
                chapterNameSection.classList.remove("hidden-section");
                associateInterestSection.classList.add("hidden-section");
            } else if (chapterNo.checked) {
                chapterNameSection.classList.add("hidden-section");
                associateInterestSection.classList.remove("hidden-section");
            } else {
                chapterNameSection.classList.add("hidden-section");
                associateInterestSection.classList.add("hidden-section");
            }
        }

        chapterYes.addEventListener("change", toggleChapterSections);
        chapterNo.addEventListener("change", toggleChapterSections);


        // --- 2. Mode of Arrival Toggle Logic ---
        const modeOfArrival = document.getElementById("modeOfArrival");
        const modeDescriptionSection = document.getElementById("modeDescriptionSection");

        modeOfArrival.addEventListener("change", function() {
            if (this.value === "others") {
                modeDescriptionSection.classList.remove("hidden-section");
            } else {
                modeDescriptionSection.classList.add("hidden-section");
            }
        });
    });
    const panes = document.querySelectorAll('.step-pane');
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');

    let currentStep = 0;

    /*==========================
        SHOW STEP
    ==========================*/
    function showStep(step) {

        panes.forEach((pane, index) => {
            pane.classList.toggle('active', index === step);
        });

        steps.forEach((item, index) => {

            item.classList.remove('active', 'completed');

            if (index < step) {
                item.classList.add('completed');
            } else if (index === step) {
                item.classList.add('active');
            }

        });

        prevBtn.disabled = step === 0;

        if (step === panes.length - 1) {
            nextBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');
        } else {
            nextBtn.classList.remove('d-none');
            submitBtn.classList.add('d-none');
        }

    }


    /*==========================
        EMAIL VALIDATION
    ==========================*/

    function validateEmail(email) {

        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        return regex.test(email);

    }


    /*==========================
        STEP VALIDATION
    ==========================*/

    function validateStep(step) {

        const currentPane = panes[step];

        const fields = currentPane.querySelectorAll("input,select,textarea");

        let valid = true;

        fields.forEach(function(field) {

            field.classList.remove("is-invalid");

            if (field.hasAttribute("required")) {

                if (field.value.trim() == "") {

                    field.classList.add("is-invalid");

                    valid = false;

                }

            }

            if (field.type === "email" && field.value != "") {

                if (!validateEmail(field.value)) {

                    field.classList.add("is-invalid");

                    valid = false;

                }

            }

        });

        if (!valid) {

            currentPane.querySelector(".is-invalid").focus();

        }

        return valid;

    }


    /*==========================
        REMOVE ERROR LIVE
    ==========================*/

    document.querySelectorAll("input,select,textarea").forEach(function(ele) {

        ele.addEventListener("input", function() {

            this.classList.remove("is-invalid");

        });

        ele.addEventListener("change", function() {

            this.classList.remove("is-invalid");

        });

    });


    /*==========================
          NEXT
    ==========================*/

    // nextBtn.addEventListener("click", function() {

    //     if (!validateStep(currentStep))
    //         return;

    //     currentStep++;

    //     showStep(currentStep);

    //     window.scrollTo({
    //         top: 0,
    //         behavior: "smooth"
    //     });

    // });

    nextBtn.addEventListener("click", async function() {

        // First validate current step
        if (!validateStep(currentStep)) {
            return;
        }

        /*
        ==========================================
        STEP 1 - CHECK EMAIL & MOBILE
        ==========================================
        */
        if (currentStep === 0) {

            const emailField = document.querySelector('[name="email"]');
            const mobileField = document.querySelector('[name="mobile"]');

            const email = emailField.value.trim();
            const mobile = mobileField.value.trim();

            // Extra validation
            if (!validateEmail(email)) {

                emailField.classList.add("is-invalid");

                Swal.fire({
                    icon: "warning",
                    title: "Invalid Email",
                    text: "Please enter a valid email address.",
                    confirmButtonColor: "#0d6efd"
                });

                emailField.focus();

                return;
            }

            if (mobile === "") {

                mobileField.classList.add("is-invalid");

                Swal.fire({
                    icon: "warning",
                    title: "Mobile Number Required",
                    text: "Please enter your mobile number.",
                    confirmButtonColor: "#0d6efd"
                });

                mobileField.focus();

                return;
            }

            /*
            ==========================================
            SHOW LOADING
            ==========================================
            */

            const originalText = nextBtn.innerHTML;

            nextBtn.disabled = true;

            nextBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2"></span>
            Checking...
        `;

            try {

                /*
                ==========================================
                AJAX / FETCH REQUEST
                ==========================================
                */

                const formData = new FormData();

                formData.append("email", email);
                formData.append("mobile", mobile);
                console.log(email);

                const response = await fetch("check_duplicate.php", {

                    method: "POST",

                    body: formData

                });

                if (!response.ok) {

                    throw new Error("Server error");

                }

                const result = await response.json();


                /*
                ==========================================
                EMAIL / MOBILE ALREADY EXISTS
                ==========================================
                */

                if (result.status === "exists") {

                    if (result.field === "email") {

                        emailField.classList.add("is-invalid");

                    }

                    if (result.field === "mobile") {

                        mobileField.classList.add("is-invalid");

                    }

                    await Swal.fire({

                        icon: "error",

                        title: "Already Registered",

                        text: result.message,

                        confirmButtonText: "OK",

                        confirmButtonColor: "#d33"

                    });

                    // IMPORTANT:
                    // DO NOT GO TO STEP 2

                    return;
                }


                /*
                ==========================================
                BOTH ARE AVAILABLE
                ==========================================
                */

                if (result.status === "available") {

                    emailField.classList.remove("is-invalid");
                    mobileField.classList.remove("is-invalid");

                    emailField.classList.add("is-valid");
                    mobileField.classList.add("is-valid");

                    currentStep++;

                    showStep(currentStep);

                    window.scrollTo({

                        top: 0,

                        behavior: "smooth"

                    });

                    return;
                }


                /*
                ==========================================
                UNKNOWN RESPONSE
                ==========================================
                */

                Swal.fire({

                    icon: "error",

                    title: "Unable to Continue",

                    text: result.message ||
                        "Unable to verify your registration details.",

                    confirmButtonColor: "#d33"

                });

            } catch (error) {

                console.error(error);

                Swal.fire({

                    icon: "error",

                    title: "Server Error",

                    text: "Unable to check email and mobile number. Please try again.",

                    confirmButtonColor: "#d33"

                });

            } finally {

                nextBtn.disabled = false;

                nextBtn.innerHTML = originalText;

            }

            return;
        }


        /*
        ==========================================
        OTHER STEPS
        ==========================================
        */

        currentStep++;

        showStep(currentStep);

        window.scrollTo({

            top: 0,

            behavior: "smooth"

        });

    });


    /*==========================
          PREVIOUS
    ==========================*/

    prevBtn.addEventListener("click", function() {

        currentStep--;

        showStep(currentStep);

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });


    /*==========================
       FINAL SUBMIT
    ==========================*/

    document.getElementById("wizardForm").addEventListener("submit", function(e) {

        if (!validateStep(currentStep)) {

            e.preventDefault();

        }

    });


    /*==========================
        REGISTRATION FEE
    ==========================*/

    function calc_cost() {

        let totalCost = 12000;

        let relation = document.getElementById("acc_relation").value;

        let name = document.getElementById("acc_name").value.trim();

        if (relation === "Non" || relation === "") {

            totalCost = 12000;

            if (name !== "") {

                totalCost += 8000;

            }

        } else {

            totalCost += 8000;

        }

        document.getElementById("acp").value = totalCost;

    }


    /*==========================
        AUTO CALCULATE
    ==========================*/

    document.getElementById("acc_relation")?.addEventListener("change", calc_cost);

    document.getElementById("acc_name")?.addEventListener("input", calc_cost);

    calc_cost();

    showStep(currentStep);

    const joinYear = document.querySelector('[name="yoj"]');
    const gradYear = document.querySelector('[name="yog"]');

    function checkYear() {

        if (!joinYear || !gradYear) return;

        if (joinYear.value === "" || gradYear.value === "") return;

        if (parseInt(gradYear.value) < parseInt(joinYear.value)) {

            gradYear.value = "";

            Swal.fire({
                icon: "warning",
                title: "Invalid Graduation Year",
                text: "Graduation Year must be greater than Joining Year.",
                confirmButtonColor: "#0d6efd"
            }).then(() => {
                gradYear.focus();
            });

        }

    }

    joinYear.addEventListener("change", checkYear);
    gradYear.addEventListener("change", checkYear);
    </script>

</body>

</html>