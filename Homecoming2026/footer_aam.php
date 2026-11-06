<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Students' Alumni Cell, IIT Kharagpur</title>

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <style>

        #footer {
            background: #222;
            padding: 3rem 0;
            color: #bbb;
            font-size: 1rem;
            position: relative;
            /* bottom: 0; */
            height:auto;
        }



        #footer p,
        #footer a {
            font-size: 1.3rem;
        }



        /* Copyright at Bottom */
        .copyright {
            text-align: center;
            margin:0;
            color: #bbb;
            background-color: #014f86;
            position: relative;
            margin: 0 0 0;
        }

        /* Back to Top Button */
        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.35);
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
    </style>
</head>

<body>

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
