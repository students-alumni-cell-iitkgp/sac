<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Students' Alumni Cell, IIT Kharagpur</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            width: 100%;
            height:auto;
            font-family: 'Poppins', sans-serif;
        }

        #footer {
            background: #222;
            padding: 3rem 0;
            color: #bbb;
            font-size: 1rem;
            position: relative;
            /* bottom: 0; */
            height:auto;
        }

        #footer h5 {
            font-size: 1.6rem;
            margin-top: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
        }

        #footer a {
            color: #ffdf00;
            transition: all 0.3s ease;
        }

        #footer a:hover {
            color: #fff;
        }

        #footer p,
        #footer a {
            font-size: 1.3rem;
        }

        /* Social Media Icons */
        .social-icons a {
            font-size: 5.6rem;
            margin: 0 10px;
            color: #bbb;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .social-icons a:hover {
            transform: scale(1.2);
        }

        /* Contact Details */
        .contact-details i {
            margin-right: 10px;
            color: #ffdf00;
        }

        /* Embedded Map */
        #map {
            height: 300px;
            width: 100%;
            margin-top: 20px;
            border: 0;
        }

        /* .divider {
            height: 1px;
            background-color: #444;
            margin: 1.5rem 0;
        } */

        /* Center Footer Quote */
        /* #footer-quote {
            text-align: center;
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 2rem;
        } */

        /* Copyright at Bottom */
        .copyright {
            text-align: center;
            margin:0;
            color: #bbb;
            background-color: #222222;
            position: relative;
            margin: 0 0 0;
        }

        /* Back to Top Button */
        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffdf00;
            color: #222;
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            z-index: 999;
            display: none;
        }

        #back-to-top:hover {
            background-color: #fff;
            transform: scale(1.1);
        }
        .content{
            font-size: 18px;
            padding-left: 5px;
            margin-left:5px;
        }

        /* Adjust the layout for small screens */
        @media (min-width: 768px) {
            .footer-content {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            #map {
                width: 48%;
            }

            .social-contact {
                width: 48%;
            }
        }
    </style>
</head>

<body>

    <!-- Footer -->
    <div id="footer" style="height:100%">
        <div class="container">
            <div class="footer-content">
                <!-- Social Media Section -->
                <div class="social-contact">
                    <h5>Get Social With Us</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/iitkgp.alumnicell" target="_blank"><i
                                class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/sac.iitkgp/?hl=en" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://x.com/IITKgpAlumni" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://studentsalumnicell-iitkgp.medium.com/" target="_blank"><i
                                class="fab fa-medium"></i></a>
                        <a href="https://www.linkedin.com/company/sac-iitkgp/mycompany/" target="_blank"><i
                                class="fab fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/c/StudentsAlumniCellIITKharagpur" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    </div>

                    <!-- Contact Section -->
                    <h5>Contact Us</h5>
                    <p class="contact-details">
                        <i class="fas fa-map-marker-alt"></i><span class="content">Office of Alumni Affairs, IIT Kharagpur, 
                            Pin-721302,
                        West Bengal, India</span><br>
                        <i class="fas fa-phone"></i> <span class="content"> Ph: 03222-281860<br></span>
                        <i class="fas fa-envelope"></i> <span class="content"> Email: <a href="mailto:aao@hijli.iitkgp.ac.in">aao@hijli.iitkgp.ac.in</a><span>
                    </p>
                </div>

                <!-- Embedded Google Map using iFrame -->
                <iframe id="map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1775.2760083536493!2d87.30775674853604!3d22.314068267200664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1d4522a211b131%3A0xa841704d3326681b!2sAlumni%20Affairs%20%26%20International%20Relations!5e0!3m2!1sen!2sin!4v1729339099517!5m2!1sen!2sin"
                    height = "500" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Divider and Footer Quote -->
            <div class="divider"></div>
            <!-- <div id="footer-quote">
                "The best way to predict the future is to create it."
            </div> -->

            <!-- <div class="divider"></div> -->
            <!-- Copyright positioned at the bottom -->
        </div>

    </div>
    <p class="copyright">&copy; 2024 Students' Alumni Cell</p>



    <!-- Back to Top Button -->
    <div id="back-to-top" onclick="scrollToTop()">&#8679;</div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9yZV+mxhr9I2D9XsIUQekYT3RZ5fnG8/A8p5U" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        // Show/Hide Back to Top Button
        window.onscroll = function () {
            var topButton = document.getElementById("back-to-top");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                topButton.style.display = "block";
            } else {
                topButton.style.display = "none";
            }
        };

        // Scroll to Top Functionality
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>

</body>

</html>
