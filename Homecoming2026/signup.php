<?php
die("Homecoming have been closed");
exit;
?>
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
        background: #fff;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
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

    .form-control:hover,
    .form-select:hover {
        border-color: #9ec5fe;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .08);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, .10), 0 12px 24px rgba(13, 110, 253, .12);
    }

    .btn {
        border: none;
        border-radius: 14px;
        padding: 13px 34px;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: .3px;
        transition: all .3s ease;
    }

    .btn-secondary {
        background: #eef2f7;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #dbe3ef;
        color: #111827;
        transform: translateY(-2px);
    }

    .btn-primary {
        background: linear-gradient(135deg, #0052D4, #1E88E5);
        color: #fff;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(13, 110, 253, .28);
    }

    .btn-success {
        background: linear-gradient(135deg, #11998E, #38EF7D);
        color: #fff;
    }

    .btn-success:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(25, 135, 84, .28);
    }

    .btn:active {
        transform: scale(.98);
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
        color: #0d6efd;
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

    .form-control.is-invalid,
    .form-select.is-invalid {
        border: 2px solid #dc3545 !important;
        box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .15) !important;
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
    }

    @media(max-width:768px) {

        .form-control,
        .form-select {
            height: 58px;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .stepper {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .progress-line {
            display: none;
        }
    }


    .photo-preview-wrapper {
        width: 160px;
        height: 160px;
        margin: 0 auto;
        border-radius: 16px;
        overflow: hidden;
        border: 3px dashed #c9d6ea;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all .3s ease;
    }

    .photo-preview-wrapper:hover {
        border-color: #0d6efd;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .12);
    }

    .photo-preview-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Fix for File Input UI */
    input[type="file"].form-control {
        height: auto !important;
        padding: 10px 14px !important;
        font-size: 14px;
        line-height: 1.5;
        display: flex;
        align-items: center;
        border-radius: 16px;
        background: #ffffff;
        border: 1.5px solid #dce5f2;
        box-shadow: 0 4px 12px rgba(15, 23, 42, .04);
    }

    /* Style the native "Choose File" button */
    input[type="file"].form-control::file-selector-button {
        background: #eef4ff;
        color: #0d6efd;
        border: 1px solid #dbe5f5;
        border-radius: 10px;
        padding: 8px 16px;
        margin-right: 14px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all .25s ease;
    }

    input[type="file"].form-control::file-selector-button:hover {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    /* Webkit fallback for older browsers */
    input[type="file"].form-control::-webkit-file-upload-button {
        background: #eef4ff;
        color: #0d6efd;
        border: 1px solid #dbe5f5;
        border-radius: 10px;
        padding: 8px 16px;
        margin-right: 14px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all .25s ease;
    }

    input[type="file"].form-control::-webkit-file-upload-button:hover {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    /* Override global focus for file input */
    input[type="file"].form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, .10), 0 12px 24px rgba(13, 110, 253, .12);
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

        <form action="register.php" method="POST" enctype="multipart/form-data" id="wizardForm" novalidate>
            <div class="wizard-body">

                <!-- STEP 1: PERSONAL DETAILS -->
                <div class="step-pane active">
                    <div class="section-title-card mb-4">
                        <div class="title-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="title-content">
                            <h4>Personal Details</h4>
                            <span>Please provide your personal information exactly as per institute records.</span>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="card-title">Contact Information</div>
                        <div class="col-md-12">
                            <div class="form-floating premium-field">

                                <select class="form-select" name="phase" required>
                                    <option value="" selected disabled>Select a Phase</option>
                                    <!-- <option value="ph1">Homecoming One (Batches of 2003 • 2008 • 2013)</option> -->
                                    <option value="ph2">Homecoming Two (Batches of 2004 • 2009 • 2014)</option>
                                </select>
                                <label>Choose Phase <span class="text-danger">*</span></label>
                                <div class="invalid-feedback">Please Select a Phase.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="text" class="form-control" name="name" maxlength="150" required
                                        placeholder=" ">
                                    <label>Name (as per records) <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter your full name.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="email" class="form-control" name="email" maxlength="100" required
                                        placeholder=" ">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="tel" class="form-control" name="mobile" required placeholder=" "
                                        pattern="[0-9]{10,15}">
                                    <label>Cell Number <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter a valid phone number (10-15 digits).
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="date" class="form-control" name="dob" required placeholder=" ">
                                    <label>Date of Birth <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please select your date of birth.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Upload (added after Phase select) -->
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-card">
                                <div class="card-title">Profile Photo</div>
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-4 text-center">
                                        <div class="photo-preview-wrapper">
                                            <img id="photoPreview"
                                                src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='160' height='160'><rect width='100%25' height='100%25' fill='%23eef4ff'/><text x='50%25' y='50%25' font-size='14' fill='%236b7280' text-anchor='middle' dominant-baseline='middle'>No Photo</text></svg>"
                                                alt="Photo Preview" class="photo-preview-img">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="photoInput" class="form-label fw-semibold">
                                            Upload Photo <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control" id="photoInput" name="photo"
                                            accept="image/png, image/jpeg, image/jpg, image/webp" required>
                                        <div class="form-text mt-1">
                                            Accepted formats: JPG, PNG, WEBP. Max size: 2 MB. Recommended: square
                                            (min
                                            300×300 px).
                                        </div>
                                        <div class="invalid-feedback" id="photoFeedback">Please upload a valid image
                                            (JPG/PNG/WEBP, max 1 MB).</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-card mt-4">
                        <div class="card-title">Identity Verification</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <select class="form-select" name="idtype" required>
                                        <option value="" selected disabled>Select Identification Type</option>
                                        <option value="Aadhar Card">Aadhar Card</option>
                                        <option value="Passport">Passport</option>
                                        <option value="PAN Card">PAN Card</option>
                                        <option value="Driving License">Driving License</option>
                                        <option value="OCI Card">OCI Card</option>
                                    </select>
                                    <label>ID Type <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please select an ID type.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input type="text" class="form-control" name="idnumber" required placeholder=" ">
                                    <label>ID Number <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter your ID number.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-card mt-4">
                        <div class="card-title">Address Details</div>
                        <div class="form-floating premium-field mb-3">
                            <input class="form-control" name="address" required placeholder=" ">
                            <label>Address <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">Please provide your residential address.</div>
                        </div>

                        <div class="form-floating premium-field mb-3">
                            <input class="form-control" name="social_links" placeholder=" ">
                            <label>Social Media Link (Optional)</label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input class="form-control" name="city" required placeholder=" ">
                                    <label>City <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter your city.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input class="form-control" name="state" required placeholder=" ">
                                    <label>State <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter your state.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input class="form-control" name="country" required placeholder=" ">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter your country.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating premium-field">
                                    <input class="form-control" name="zipcode" required placeholder=" ">
                                    <label>Zip Code <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Please enter your postal/zip code.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: WORK DETAILS -->
                <div class="step-pane">
                    <div class="section-title-card mb-4">
                        <div class="title-icon">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="title-content">
                            <h4>Work Details</h4>
                            <span>Share your current professional information.</span>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="card-title">Professional Information</div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Current Profession / Sector <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="profession"
                                    placeholder="e.g. Software Engineer / Entrepreneur" maxlength="100" required>
                                <div class="invalid-feedback">Please enter your current profession.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Current Designation</label>
                                <input type="text" class="form-control" name="designation"
                                    placeholder="e.g. Senior Director" maxlength="100">
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Organisation Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="organisation"
                                    placeholder="e.g. Google, Microsoft, IIT Kharagpur" maxlength="100" required>
                                <div class="invalid-feedback">Please enter your organisation name.</div>
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Office Address</label>
                                <input type="text" class="form-control" name="waddress"
                                    placeholder="Street, Area, Building" maxlength="200">
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Office City</label>
                                <input type="text" class="form-control" name="wcity" placeholder="Kolkata"
                                    maxlength="50">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Office State</label>
                                <input type="text" class="form-control" name="wstate" placeholder="West Bengal"
                                    maxlength="50">
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Office Country</label>
                                <input type="text" class="form-control" name="wcountry" placeholder="India"
                                    maxlength="50">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Office Zip Code</label>
                                <input type="text" class="form-control" name="wzipcode" placeholder="700001"
                                    maxlength="20">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: IIT AFFILIATION -->
                <div class="step-pane">
                    <div class="section-title-card mb-4">
                        <div class="title-icon">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <div class="title-content">
                            <h4>IIT Kharagpur Affiliation</h4>
                            <span>Tell us about your academic journey at IIT Kharagpur.</span>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Academic Course Name <span
                                        class="text-danger">*</span></label>
                                <input name="course" type="text" class="form-control"
                                    placeholder="Computer Science & Engineering" maxlength="120" required>
                                <div class="invalid-feedback">Please provide your course name.</div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Degree (First Degree) <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="degree" required>
                                    <option value="" selected disabled>Select Degree</option>
                                    <option value="BTech">BTech</option>
                                    <option value="DualDegree">DualDegree</option>
                                    <option value="BArch">BArch</option>
                                    <option value="BSc">BSc</option>
                                    <option value="MTech">MTech</option>
                                    <option value="MSc(Integrated)">MSc(Integrated)</option>
                                    <option value="MSc(Two years)">MSc(Two years)</option>
                                    <option value="MCP">MCP</option>
                                    <option value="MRP">MRP</option>
                                    <option value="MBA">MBA</option>
                                    <option value="LLB">LLB</option>
                                    <option value="MMST">MMST</option>
                                    <option value="DIIT">DIIT</option>
                                    <option value="PGDST">PGDST</option>
                                    <option value="PGDBA">PGDBA</option>
                                    <option value="EMBA">EMBA</option>
                                    <option value="LLM">LLM</option>
                                    <option value="MS">MS</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select your degree.</div>
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Department <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="dept" required>
                                    <option value="" selected disabled>Choose Department</option>
                                    <option value="AE">Aerospace Engineering</option>
                                    <option value="AG">Agricultural & Food Engineering</option>
                                    <option value="AR">Architecture & Regional Planning</option>
                                    <option value="BT">Biotechnology</option>
                                    <option value="CE">Civil Engineering</option>
                                    <option value="CH">Chemical Engineering</option>
                                    <option value="CS">Computer Science & Engineering</option>
                                    <option value="CY">Chemistry</option>
                                    <option value="EE">Electrical Engineering</option>
                                    <option value="EC">Electronics & Electrical Communication Engineering</option>
                                    <option value="GG">Geology & Geophysics</option>
                                    <option value="HS">Humanities & Social Sciences</option>
                                    <option value="IM">Industrial & Systems Engineering</option>
                                    <option value="MA">Mathematics</option>
                                    <option value="ME">Mechanical Engineering</option>
                                    <option value="MT">Metallurgical & Materials Engineering</option>
                                    <option value="MI">Mining Engineering</option>
                                    <option value="NA">Ocean Engineering & Naval Architecture</option>
                                    <option value="PH">Physics</option>
                                    <option value="VGSOM">Vinod Gupta School of Management</option>
                                    <option value="RGSOIPL">Rajiv Gandhi School Of Intellectual Property Law
                                    </option>
                                </select>
                                <div class="invalid-feedback">Please choose your department.</div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Hall of Residence <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="hall" required>
                                    <option value="" selected disabled>Select Hall</option>
                                    <option value="Sir Ashutosh Mukherjee Hall">Sir Ashutosh Mukherjee Hall</option>
                                    <option value="Azad Hall">Azad Hall</option>
                                    <option value="B C Roy Hall">B C Roy Hall</option>
                                    <option value="B R Ambedkar Hall">B R Ambedkar Hall</option>
                                    <option value="Homi J Bhabha Hall">Homi J Bhabha Hall</option>
                                    <option value="J C Bose Hall">J C Bose Hall</option>
                                    <option value="Lala Lajpat Rai Hall">Lala Lajpat Rai Hall</option>
                                    <option value="Nehru Hall">Nehru Hall</option>
                                    <option value="Patel Hall">Patel Hall</option>
                                    <option value="Radha Krishnan Hall">Radha Krishnan Hall</option>
                                    <option value="Rajendra Prasad Hall">Rajendra Prasad Hall</option>
                                    <option value="Sarojini Naidu Hall">Sarojini Naidu Hall</option>
                                    <option value="Vidyasagar Hall">Vidyasagar Hall</option>
                                    <option value="Zakir Hussain Hall">Zakir Hussain Hall</option>
                                </select>
                                <div class="invalid-feedback">Please select your hall of residence.</div>
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Position Held at IIT KGP (Optional)</label>
                                <input name="positionHolding" class="form-control"
                                    placeholder="e.g. Hall President, VP, General Secretary, etc." maxlength="100">
                            </div>
                        </div>

                        <!-- Alumni Chapter Selection -->
                        <div class="card custom-section-card p-4 mb-4 mt-4 shadow-sm" id="chapterCardContainer">
                            <label class="form-label text-dark fw-bold mb-2">
                                Are you a part of your nearest alumni chapter? <span class="text-danger">*</span>
                            </label>
                            <div class="d-flex gap-3 mb-2">
                                <input type="radio" class="btn-check" name="nearest_alumni_chapter" id="chapterYes"
                                    value="yes" required autocomplete="off">
                                <label class="btn btn-outline-primary px-4 py-2 rounded-pill fw-medium"
                                    for="chapterYes">
                                    <i class="fa-solid fa-circle-check me-1"></i> Yes
                                </label>

                                <input type="radio" class="btn-check" name="nearest_alumni_chapter" id="chapterNo"
                                    value="no" required autocomplete="off">
                                <label class="btn btn-outline-primary px-4 py-2 rounded-pill fw-medium" for="chapterNo">
                                    <i class="fa-solid fa-circle-xmark me-1"></i> No
                                </label>
                            </div>
                            <div class="invalid-feedback d-block" id="chapterError" style="display:none !important;">
                                Please select an option.</div>

                            <!-- If Yes -->
                            <div id="chapterNameSection" class="mt-3 p-3 conditional-box hidden-section">
                                <label for="chapterName" class="form-label fw-medium text-secondary">
                                    Chapter Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="chapterName" name="chapter_name"
                                    placeholder="e.g. Kolkata Alumni Chapter">
                                <div class="invalid-feedback">Please enter the chapter name.</div>
                            </div>

                            <!-- If No -->
                            <div id="associateInterestSection"
                                class="mt-3 p-3 conditional-box border-warning hidden-section"
                                style="border-left-color: #ffc107;">
                                <label class="form-label fw-medium text-dark mb-2">
                                    Would you be interested in associating with one? <span class="text-danger">*</span>
                                </label>
                                <div class="d-flex gap-2">
                                    <input type="radio" class="btn-check" name="associate_interest" id="associateYes"
                                        value="yes" autocomplete="off">
                                    <label class="btn btn-outline-secondary px-3 py-1 rounded-pill btn-sm"
                                        for="associateYes">Yes</label>

                                    <input type="radio" class="btn-check" name="associate_interest" id="associateNo"
                                        value="no" autocomplete="off">
                                    <label class="btn btn-outline-secondary px-3 py-1 rounded-pill btn-sm"
                                        for="associateNo">No</label>
                                </div>
                                <div class="invalid-feedback d-block" id="associateError"
                                    style="display:none !important;">Please choose an option.</div>
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-12">
                                <label class="form-label fw-semibold">How would you like to contribute to IIT
                                    Kharagpur?
                                    (Optional)</label>
                                <input type="text" name="contribute" class="form-control"
                                    placeholder="Mentorship, Guest Lectures, Research Collaboration, etc.">
                            </div>
                        </div>

                        <div class="row g-4 mt-1">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Joining Year <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="yoj" class="form-control" min="1951" max="2035"
                                    placeholder="e.g. 2005" required>
                                <div class="invalid-feedback">Please enter a valid joining year.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Graduation Year <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="yog" class="form-control" min="1951" max="2035"
                                    placeholder="e.g. 2009" required>
                                <div class="invalid-feedback" id="yogFeedback">Graduation year must be greater than
                                    or
                                    equal to joining year.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: PAYMENT DETAILS -->
                <div class="step-pane">
                    <div class="section-title-card mb-4">
                        <div class="title-icon">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                        </div>
                        <div class="title-content">
                            <h4>Payment Details</h4>
                            <span>Payment breakdown and registration fee details.</span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Registration Fee Option</th>
                                    <th>Amount (INR)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Per Alumnus / Alumna</td>
                                    <td><strong>₹12,000</strong></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>Per Accompanying Person</td>
                                    <td><strong>₹8,000</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-muted mb-1">
                        <strong>Registration Fee includes Food, Transportation, Registration Kit, etc.</strong>
                    </p>
                    <p class="text-muted mb-4">
                        <strong>Children below 10 years of age accompanying a participant have no registration
                            fee.</strong>
                    </p>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Accompanying Adult Relation <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="acc_relation" id="acc_relation" required>
                                <option value="None" selected>No Accompanying Adult</option>
                                <option value="Spouse">Spouse</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select an option.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold" id="acc_name_label">Accompanying Adult
                                Name</label>
                            <input type="text" class="form-control" id="acc_name" name="acc_name"
                                placeholder="Enter Full Name">
                            <div class="invalid-feedback">Please provide accompanying adult's full name.</div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-5 mb-4">
                            <label class="form-label fw-bold text-center w-100">Calculated Registration Fee
                                (INR)</label>
                            <input type="text" class="form-control text-center fw-bold fs-5 bg-light" id="acp"
                                name="acp" value="12000" readonly>
                        </div>
                    </div>

                    <div class="card shadow border-0 rounded-4">
                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0">Bank Details for Depositing Registration Fees</h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <ul class="list-unstyled fs-6 mb-0">
                                        <li><strong>Bank Name :</strong> HDFC</li>
                                        <li><strong>Account Name :</strong> IIT Kharagpur Alumni Event Fund</li>
                                        <li><strong>Account Number :</strong> 50100856454247</li>
                                        <li><strong>IFSC :</strong> HDFC0010942</li>
                                        <li><strong>MICR :</strong> 721240004</li>
                                        <li><strong>SWIFT Code :</strong> HDFCINBB</li>
                                    </ul>
                                </div>
                                <!-- <div class="col-lg-5 text-center mt-4 mt-lg-0">
                                    <img src="./img/qrCode.jpeg" onerror="this.style.display='none'"
                                        class="img-fluid rounded border p-2" style="max-width:200px;" alt="QR Code">
                                    <p class="mt-2 mb-1 text-muted"><strong>Scan to Pay via UPI</strong></p>
                                </div> -->

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

                <!-- STEP 5: ACCOMMODATION & FOOD -->
                <div class="step-pane">
                    <div class="section-title-card mb-4">
                        <div class="title-icon">
                            <i class="fa-solid fa-hotel"></i>
                        </div>
                        <div class="title-content">
                            <h4>Accommodation & Food</h4>
                            <span>Help us arrange comfortable accommodation and meals for your visit.</span>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Food Preference <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="foodPreference" required>
                                    <option value="" selected disabled>Select Food Preference</option>
                                    <option value="VEG">🥗 Vegetarian</option>
                                    <option value="NONVEG">🍗 Non-Vegetarian</option>
                                    <option value="VEGAN">🥦 Vegan</option>
                                    <option value="OTHER">🍽 Other</option>
                                </select>
                                <div class="invalid-feedback">Please select your meal preference.</div>
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Health Restrictions / Allergies</label>
                                <input type="text" class="form-control" id="medical" name="medical"
                                    placeholder="e.g. Diabetic, Nut Allergies, Gluten-Free (or leave blank)">
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info mt-4">
                        <h5 class="mb-2">Accommodation Note</h5>
                        <p class="mb-0">
                            Campus accommodation is limited and will be allotted on a sharing basis. In case of
                            overflow, participants will be accommodated in nearby guest facilities. Details will be
                            communicated one week prior to the event.
                        </p>
                    </div>
                </div>

                <!-- STEP 6: TRAVEL DETAILS -->
                <div class="step-pane">
                    <div class="section-title-card mb-4">
                        <div class="title-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="title-content">
                            <h4>Travel Details</h4>
                            <span>Share your arrival and departure schedule to help us arrange local
                                transportation.</span>
                        </div>
                    </div>

                    <div class="form-card">
                        <div class="row g-4">
                            <div class="col-12">
                                <label for="modeOfArrival" class="form-label fw-semibold">Mode of Arrival <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="modeOfArrival" name="arrivalMode" required>
                                    <option value="" selected disabled>-- Select Mode of Arrival --</option>
                                    <option value="flight">Flight</option>
                                    <option value="train">Train</option>
                                    <option value="car">Personal Car</option>
                                    <option value="cab">Cab / Taxi</option>
                                    <option value="bus">Bus</option>
                                    <option value="others">Others</option>
                                </select>
                                <div class="invalid-feedback">Please choose your mode of arrival.</div>

                                <div id="modeDescriptionSection" class="mt-3 hidden-section">
                                    <label for="modeDescription" class="form-label fw-semibold">Please specify your
                                        arrival mode <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="modeDescription" name="mode_description"
                                        placeholder="Specify train name/number, flight, etc.">
                                    <div class="invalid-feedback">Please specify your arrival mode details.</div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="text-primary fw-bold mb-3"><i class="fa-solid fa-plane-arrival me-2"></i>Arrival
                            Schedule</h6>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Arrival Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dateOfArr" name="dateOfArr" required>
                                <div class="invalid-feedback">Please select your arrival date.</div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Arrival Time <span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="timeOfArr" required>
                                <div class="invalid-feedback">Please select your arrival time.</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="text-danger fw-bold mb-3"><i class="fa-solid fa-plane-departure me-2"></i>Departure
                            Schedule</h6>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Departure Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dateOfDep" name="dateOfDep" required>
                                <div class="invalid-feedback" id="depDateFeedback">Please select your departure
                                    date.
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Departure Time <span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="timeOfDep" required>
                                <div class="invalid-feedback">Please select your departure time.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wizard-footer">
                <button type="button" class="btn btn-secondary" id="prevBtn" disabled>Previous</button>
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
        const panes = document.querySelectorAll('.step-pane');
        const steps = document.querySelectorAll('.step');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressFill = document.querySelector('.progress-fill');

        let currentStep = 0;

        // --- Step Display Function ---
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

            const progressPct = (step / (steps.length - 1)) * 100;
            if (progressFill) progressFill.style.width = progressPct + '%';

            prevBtn.disabled = step === 0;

            if (step === panes.length - 1) {
                nextBtn.classList.add('d-none');
                submitBtn.classList.remove('d-none');
            } else {
                nextBtn.classList.remove('d-none');
                submitBtn.classList.add('d-none');
            }
        }

        // --- Step Switching Click Handlers ---
        steps.forEach((stepItem, index) => {
            stepItem.addEventListener('click', () => {
                if (index < currentStep) {
                    currentStep = index;
                    showStep(currentStep);
                }
            });
        });

        // --- Email & Phone Validation Helpers ---
        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.trim());
        }

        function validatePhone(phone) {
            return /^[0-9+\-\s]{10,15}$/.test(phone.trim());
        }

        // --- Conditional Logic Handlers ---
        const chapterYes = document.getElementById("chapterYes");
        const chapterNo = document.getElementById("chapterNo");
        const chapterNameSection = document.getElementById("chapterNameSection");
        const associateInterestSection = document.getElementById("associateInterestSection");
        const chapterName = document.getElementById("chapterName");

        function toggleChapterSections() {
            document.getElementById("chapterError").style.setProperty("display", "none", "important");
            if (chapterYes.checked) {
                chapterNameSection.classList.remove("hidden-section");
                associateInterestSection.classList.add("hidden-section");
            } else if (chapterNo.checked) {
                chapterNameSection.classList.add("hidden-section");
                associateInterestSection.classList.remove("hidden-section");
                chapterName.value = "";
                chapterName.classList.remove("is-invalid");
            }
        }

        chapterYes.addEventListener("change", toggleChapterSections);
        chapterNo.addEventListener("change", toggleChapterSections);

        const modeOfArrival = document.getElementById("modeOfArrival");
        const modeDescriptionSection = document.getElementById("modeDescriptionSection");
        const modeDescription = document.getElementById("modeDescription");

        modeOfArrival.addEventListener("change", function() {
            this.classList.remove("is-invalid");
            if (this.value === "others") {
                modeDescriptionSection.classList.remove("hidden-section");
            } else {
                modeDescriptionSection.classList.add("hidden-section");
                modeDescription.value = "";
                modeDescription.classList.remove("is-invalid");
            }
        });

        // --- Accompanying Fee Logic ---
        const accRelation = document.getElementById("acc_relation");
        const accName = document.getElementById("acc_name");
        const accNameLabel = document.getElementById("acc_name_label");

        function calc_cost() {
            let totalCost = 12000;
            const relation = accRelation.value;

            if (relation === "Spouse" || relation === "Other") {
                totalCost += 8000;
                accNameLabel.innerHTML = `Accompanying Adult Name <span class="text-danger">*</span>`;
            } else {
                accNameLabel.innerHTML = `Accompanying Adult Name`;
                accName.classList.remove("is-invalid");
            }
            document.getElementById("acp").value = totalCost;
        }

        accRelation.addEventListener("change", calc_cost);
        accName.addEventListener("input", calc_cost);

        // --- Photo Upload Preview & Validation ---
        const photoInput = document.getElementById("photoInput");
        const photoPreview = document.getElementById("photoPreview");
        const photoFeedback = document.getElementById("photoFeedback");
        const MAX_PHOTO_SIZE = 1 * 1024 * 1024; // 1 MB
        const ALLOWED_TYPES = ["image/jpeg", "image/jpg", "image/png", "image/webp"];

        photoInput.addEventListener("change", function() {
            const file = this.files[0];
            photoFeedback.style.display = "none";
            photoInput.classList.remove("is-invalid");

            if (!file) return;

            if (!ALLOWED_TYPES.includes(file.type)) {
                photoInput.classList.add("is-invalid");
                photoFeedback.innerText = "Only JPG, PNG, or WEBP images are allowed.";
                photoFeedback.style.display = "block";
                resetPhotoPreview();
                return;
            }

            if (file.size > MAX_PHOTO_SIZE) {
                photoInput.classList.add("is-invalid");
                photoFeedback.innerText = "Photo size must be 1 MB or smaller.";
                photoFeedback.style.display = "block";
                resetPhotoPreview();
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });

        function resetPhotoPreview() {
            photoInput.value = "";
            photoPreview.src =
                "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='160' height='160'><rect width='100%25' height='100%25' fill='%23eef4ff'/><text x='50%25' y='50%25' font-size='14' fill='%236b7280' text-anchor='middle' dominant-baseline='middle'>No Photo</text></svg>";
        }

        // --- Comprehensive Step Validation ---
        function validateStep(stepIndex) {
            const currentPane = panes[stepIndex];
            let isValid = true;
            let firstInvalidEl = null;

            function markInvalid(el, message) {
                isValid = false;
                el.classList.add("is-invalid");
                if (message) {
                    const fb = el.parentElement.querySelector(".invalid-feedback");
                    if (fb) fb.innerText = message;
                }
                if (!firstInvalidEl) firstInvalidEl = el;
            }

            // 1. General required inputs & selects (ignore hidden elements)
            const inputs = currentPane.querySelectorAll("input, select, textarea");
            inputs.forEach(el => {
                if (el.closest('.hidden-section') || el.type === "radio") return;

                el.classList.remove("is-invalid");

                if (el.hasAttribute("required") && !el.value.trim()) {
                    markInvalid(el);
                }

                if (el.type === "email" && el.value.trim() && !validateEmail(el.value)) {
                    markInvalid(el, "Please enter a valid email address.");
                }

                if (el.name === "mobile" && el.value.trim() && !validatePhone(el.value)) {
                    markInvalid(el, "Please enter a valid 10-15 digit phone number.");
                }
            });

            if (stepIndex === 0) {
                if (!photoInput.files || photoInput.files.length === 0) {
                    photoInput.classList.add("is-invalid");
                    photoFeedback.innerText = "Please upload a profile photo.";
                    photoFeedback.style.display = "block";
                    isValid = false;
                    if (!firstInvalidEl) firstInvalidEl = photoInput;
                }
            }

            // 2. Step-Specific Extra Checks
            if (stepIndex === 2) {
                // Alumni Chapter Radio Validation
                const chapterRadios = currentPane.querySelectorAll('input[name="nearest_alumni_chapter"]');
                const isChapterChosen = Array.from(chapterRadios).some(r => r.checked);
                const chapterErr = document.getElementById("chapterError");

                if (!isChapterChosen) {
                    isValid = false;
                    chapterErr.style.setProperty("display", "block", "important");
                    if (!firstInvalidEl) firstInvalidEl = chapterRadios[0];
                } else {
                    chapterErr.style.setProperty("display", "none", "important");
                    if (chapterYes.checked && !chapterName.value.trim()) {
                        markInvalid(chapterName);
                    }
                    if (chapterNo.checked) {
                        const associateRadios = currentPane.querySelectorAll(
                            'input[name="associate_interest"]');
                        const isAssocChosen = Array.from(associateRadios).some(r => r.checked);
                        const assocErr = document.getElementById("associateError");
                        if (!isAssocChosen) {
                            isValid = false;
                            assocErr.style.setProperty("display", "block", "important");
                            if (!firstInvalidEl) firstInvalidEl = associateRadios[0];
                        } else {
                            assocErr.style.setProperty("display", "none", "important");
                        }
                    }
                }

                // Years validation
                const yoj = currentPane.querySelector('[name="yoj"]');
                const yog = currentPane.querySelector('[name="yog"]');
                if (yoj && yog && yoj.value && yog.value) {
                    if (parseInt(yog.value) < parseInt(yoj.value)) {
                        markInvalid(yog, "Graduation Year cannot be earlier than Joining Year.");
                    }
                }
            }

            if (stepIndex === 3) {
                // Explicit check for acc_relation
                if (!accRelation.value || accRelation.value === "") {
                    markInvalid(accRelation, "Please select an accompanying relation option.");
                }
                // If relation selected is Spouse or Other, name is mandatory
                if ((accRelation.value === "Spouse" || accRelation.value === "Other") && !accName.value
                    .trim()) {
                    markInvalid(accName);
                }
            }

            if (stepIndex === 5) {
                // Mode of Arrival "Others"
                if (modeOfArrival.value === "others" && !modeDescription.value.trim()) {
                    markInvalid(modeDescription);
                }

                // Travel Date Comparison
                const arrDate = document.getElementById("dateOfArr");
                const depDate = document.getElementById("dateOfDep");
                if (arrDate && depDate && arrDate.value && depDate.value) {
                    if (new Date(depDate.value) < new Date(arrDate.value)) {
                        markInvalid(depDate, "Departure date cannot be earlier than arrival date.");
                    }
                }
            }

            if (!isValid && firstInvalidEl) {
                firstInvalidEl.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                firstInvalidEl.focus();
            }

            return isValid;
        }

        // Live error clearing
        document.querySelectorAll("input, select, textarea").forEach(el => {
            el.addEventListener("input", function() {
                this.classList.remove("is-invalid");
            });
            el.addEventListener("change", function() {
                this.classList.remove("is-invalid");
            });
        });

        // --- Next Button Handler ---
        nextBtn.addEventListener("click", async function() {
            if (!validateStep(currentStep)) return;

            // Step 1: Duplicate check via AJAX
            if (currentStep === 0) {
                const emailField = document.querySelector('[name="email"]');
                const mobileField = document.querySelector('[name="mobile"]');
                const originalText = nextBtn.innerHTML;

                nextBtn.disabled = true;
                nextBtn.innerHTML =
                    `<span class="spinner-border spinner-border-sm me-2"></span>Checking...`;

                try {
                    const formData = new FormData();
                    formData.append("email", emailField.value.trim());
                    formData.append("mobile", mobileField.value.trim());

                    const response = await fetch("check_duplicate.php", {
                        method: "POST",
                        body: formData
                    });

                    if (response.ok) {
                        const result = await response.json();
                        if (result.status === "exists") {
                            if (result.field === "email") emailField.classList.add(
                                "is-invalid");
                            if (result.field === "mobile") mobileField.classList.add(
                                "is-invalid");

                            Swal.fire({
                                icon: "error",
                                title: "Already Registered",
                                text: result.message,
                                confirmButtonColor: "#d33"
                            });
                            return;
                        }
                    }
                } catch (err) {
                    console.warn("Duplicate check bypassed due to network/server response:",
                        err);
                } finally {
                    nextBtn.disabled = false;
                    nextBtn.innerHTML = originalText;
                }
            }

            currentStep++;
            showStep(currentStep);
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });

        // --- Previous Button Handler ---
        prevBtn.addEventListener("click", function() {
            currentStep--;
            showStep(currentStep);
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });

        // --- Final Submit Handler ---
        document.getElementById("wizardForm").addEventListener("submit", function(e) {
            if (!validateStep(currentStep)) {
                e.preventDefault();
            }
        });

        showStep(currentStep);
    });
    </script>
</body>

</html>