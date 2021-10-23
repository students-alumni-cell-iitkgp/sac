<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Alumni Talks</title>

  <!--CSS only-->
  <link rel="stylesheet" href="css/alumni_talks.css">
	 <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js"></script>
</head>

<body>
<?php include 'navbar.php' ?>
  <div class="header" style="background-image: url(img/talks.jpg);background-size: 100% 100%;background-position: center">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <h1 style="text-align: left;"></h1><!--spacing for any headimg if needed-->
          <h6 style="text-align: left;"></h6>
        </div>
      </div>
    </div>
</div>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel text-center">
            <h1 class ="x">ABOUT</h1>
            <div class="progress" style="height:0.4rem;">
              <div class="progress-bar" id= "one" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>

            </div>
            <p class="pt-3 x" style="opacity: 1" align="justify">
              Since its inception in 1951, IIT Kharagpur has mentored some of the most eminent personalities in the
              history of the nation. The Alumni Talks provide a medium for the alumni to give back to the institute by
              imparting their experience to the students and preparing them for the real world. The topics of these
              guest lectures are spread all over ranging from personality development to department-related technical
              lectures. The guest lectures pave a way for interaction between the alumni and the current students.
              Alumni Talks form a crucial part of the working of Students' Alumni Cell by bridging the gap between the
              alumni and students and bringing them closer together.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel panel1 text-center">
            <h1 class="x">Alumni Talks</h1>
            <div class="progress" style="height:0.4rem;">
              <div id="two" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <h4 class="x">Pursuit for Higher Education</h4>
                  <div class="row">
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/LakshyaJain.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Lakshya Jain</h5>
                      <h6 class="x">Mech. Enginner-Tesla</h6>
                    </div>
					<div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/VishalKumar.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Vishal Kumar</h5>
                      <h6 class="x">Founder LearningWhileTraveling</h6>
                    </div>
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/SnehaBiswas.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Sneha Biswas</h5>
                      <h6 class="x">Founder & CEO Early Step Academy</h6>
                    </div>
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/AnupamSahai.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Anupam Sahai</h5>
                      <h6 class="x">VP & CTO,Unisys</h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
				  <h4 class="x">Analytics</h4>
                  <div class="row">
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/ManuveeranSinghSandhu.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Manuveeran Singh Sandhu</h5>
                      <h6 class="x">Data Engineer JPMorgan Chase & Co.</h6>
                    </div>
					<div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/RituTak.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Ritu Tak</h5>
                      <h6 class="x">Vice President JPMorgan Chase & Co.</h6>
                    </div>
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/HarsheelSinghSoin.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Harsheel Singh Soin</h5>
                      <h6 class="x">Data Scientist Audible,Inc.</h6>
                    </div>
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/AlumniTalk/RujutaKulkarni.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Rujuta Kulkarni</h5>
                      <h6 class="x">Data Engineer Facebook</h6>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon prev1" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon next1" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel panel1 text-center">
            <h1 class="x">Alumni Talks</h1>
            <div class="progress" style="height:0.4rem;">
              <div id="two" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <h4 class="x">Speakers from McKinsey & Company:</h4>
                  <div class="row">
                    <div class="col-12 col-sm-4 align-items-center">
                      <img src="img/guest-lecture/aditya_agarwal.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Aditya Agarwal</h5>
                      <h6 class="x">(Associate)</h6>
                    </div>
                    <div class="col-12 col-sm-4 align-items-center">
                      <img src="img/guest-lecture/abhishek_narain.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Abhishek Narain</h5>
                      <h6 class="x">(Associate)</h6>
                    </div>
                    <div class="col-12 col-sm-4 align-items-center">
                      <img src="img/guest-lecture/jitesh_khanna.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Jitesh Khanna</h5>
                      <h6 class="x">(Associate Partner)</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-4 offset-sm-2 align-items-center">
                      <img src="img/guest-lecture/amit_gupta.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">Amit Gupta</h5>
                      <h6 class="x">(Associate Partner)</h6>
                    </div>
                    <div class="col-12 col-sm-4 align-items-center">
                      <img src="img/guest-lecture/kanakvi_aggarwal.jpg" class="image img-responsive img-fluid"
                        style="width: 20em;">
                      <h5 class="x">kanakvi Aggarwal</h5>
                      <h6 class="x">(Business Analyst)</h6>
                    </div>
                    <div class="col-2 col-sm-2 align-items-center">
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-12 col-sm-6 align-items-center">
                      <img class="image" src="img/guest-lecture/talk_MCK/a.jpg" class="image img-responsive img-fluid"
                        style="width: 100%; padding: 5%;">
                    </div>
                    <div class="col-12 col-sm-6">
                      <img class="image" src="img/guest-lecture/talk_MCK/b.jpg" class="image img-responsive  img-fluid"
                        style="width: 100%; padding: 5%;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-6 align-items-center">
                      <img class="image" src="img/guest-lecture/talk_MCK/c.jpg" class="image img-responsive img-fluid"
                        style="width: 100%; padding: 5%;">
                    </div>
                    <br>
                    <div class="col-12 col-sm-6 align-items-center">
                      <img class="image" src="img/guest-lecture/talk_MCK/d.jpg" class="image img-responsive img-fluid"
                      style="width: 100%; padding: 5%;">
                    </div>
                  </div>
                  <br>
                  <h5 class="x"></h5>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon prev1" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon next1" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel panel2 text-center">
            <h1 class="x">Guest Lectures</h1>
            <div class="progress" style="height:0.4rem;">
              <div id="three" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <h4 class="x">Mr. Mark Richard (President and COO at DatabaseUSA)</h4>
                  <div class="row">
                    <div class="col-12 col-sm-6 align-items-center">
                      <img src="img/guest-lecture/Mr_Mark_Richard/3.jpg" class="image img-fluid" style="width:100%;">

                    </div>
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/guest-lecture/Mr_Mark_Richard/2.jpg" class="image img-fluid" style="width:100%;">
                      <br>
                      <img src="img/guest-lecture/Mr_Mark_Richard/5.jpg" class="image img-fluid" style="width:100%;">

                    </div>
                    <div class="col-12 col-sm-3 align-items-center">
                      <img src="img/guest-lecture/Mr_Mark_Richard/4.jpg" class="image img-fluid" style="width:100%;">
                      <br>
                      <img src="img/guest-lecture/Mr_Mark_Richard/1.jpg" class="image img-fluid" style="width:100%;">

                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <h4 class="x">Mr Veerendra Jaitly</h4>
                  <h4 class="x">(Founder C_CUBE Consultants | RTD.Commander of Indian Navy)</h4>
                  <br>
                  <div class="row">
                    <div class="col-12 col-sm-4 align-items-center">
                      <img class="image" src="img/guest-lecture/Mr_Veerendra_Jaitly/a.jpg" class="image img-fluid"
                        style="width: 100%; padding: 5%;">
                    </div>
                    <div class="col-12 col-sm-4">
                      <img class="image" src="img/guest-lecture/Mr_Veerendra_Jaitly/b.jpg" class="image img-fluid"
                        style="width: 100%; padding: 5%;">
                    </div>
                    <div class="col-12 col-sm-4">
                      <img class="image" src="img/guest-lecture/Mr_Veerendra_Jaitly/c.jpg" class="image img-fluid"
                        style="width: 100%; padding: 5%;">
                    </div>
                  </div>
                  <br>
                  <h5 class="x"></h5>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel text-center">
            <h1 class="x">Tips from Top</h1>
            <div class="progress" style="height:0.4rem;">
              <div id="four" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-12 col-sm-4 align-items-center">
                <img src="img/guest-lecture/Tips_from_Top/a.jpg" class="image img-fluid" style="width:100%">
                <h5 class="x">Mr. Vineet Goyal</h5>
                <h6 class="x">(IPS, Addl. Commissioner of Police, Kolkata)</h6>
              </div>
              <div class="col-12 col-sm-4 align-items-center">
                <img src="img/guest-lecture/Tips_from_Top/b.jpg" class="image img-fluid" style="width:100%">
                <h5 class="x">Prof Parameshwar P. Iyer</h5>
                <h6 class="x">(Principal research scientist at IISc. Bangalore)</h6>
              </div>
              <div class="col-12 col-sm-4 align-items-center">
                <img src="img/guest-lecture/Tips_from_Top/c.jpg" class="image img-fluid" style="width:100%">
                <h5 class="x">Mr. Maneesh Bhandari</h5>
                <h6 class="x">(Director of Center for Innovation Incubation and Entrepreneurship, IIM Ahmedabad)</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel text-center">
            <h1 class="x">Kgp & Beyond</h1>
            <div class="progress" style="height:0.4rem;">
              <div id="five" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-12 col-sm-4 align-items-center">
                <img src="img/guest-lecture/kgp_beyond/a.jpg" class="image img-fluid" style="width:100%">
              </div>
              <div class="col-12 col-sm-4 align-items-center">
                <img src="img/guest-lecture/kgp_beyond/b.jpg" class=" image img-fluid" style="width:100%">
              </div>
              <div class="col-12 col-sm-4 align-items-center">
                <img src="img/guest-lecture/kgp_beyond/c.jpg" class=" image img-fluid" style="width:100%">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-2">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="panel text-center">
            <h1 class="x">Videos</h1>
            <div class="progress" style="height:0.4rem;">
              <div id="six" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100" style="height:0.4rem;"></div>
            </div>
            <br>
            <div class="row">
			  <div class="col-12 col-sm-3 align-items-center iframe-container">
                <iframe class="image" width="100%" src="https://www.youtube.com/embed/kfCtl0tazKE" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
				  <iframe class="image" width="100%" src="https://www.youtube.com/embed/OpQI9aVbPeQ" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
                
              </div>
              <div class="col-12 col-sm-3 align-items-center iframe-container">
			    <iframe class="image" width="100%" src="https://drive.google.com/file/d/1H8wHV_sxPbIb8GZkmHULTXkVEtzeLtmN/preview?usp=sharing" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
                <iframe class="image" width="100%" src="https://www.youtube.com/embed/-xeGNz5P5F4" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>
              <div class="col-12 col-sm-3 align-items-center iframe-container">
                <iframe class="image" width="100%" src="https://www.youtube.com/embed/v8xICuf_yAs" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>

                <iframe class="image" width="100%" src="https://www.youtube.com/embed/oDPfzLblZ1c" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>
              <div class="col-12 col-sm-3 align-items-center iframe-container">
                <iframe class="image" width="100%" src="https://www.youtube.com/embed/D96tjgVG1kQ" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>

                <iframe class="image" width="100%" src="https://www.youtube.com/embed/_mZLjVCMrrc" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </main>

 
	<!-- <?php include 'preloader.php' ?> -->
    <?php include 'footer.php' ?>

	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
  <script>
  	$( "#one,#two,#three,#four,#five,#six").each(function( ) {
   $(this).addClass("progress-bar-purple");
});
    gsap.from('header', { opacity: 0, duration: 1 })
    gsap.from('header h1', { opacity: 0, duration: 2, x: -200 })
    gsap.from('header h6', { opacity: 0, duration: 2, x: -500 })

    gsap.registerPlugin(ScrollTrigger);

    gsap.from('.nav-item', {
      scrollTrigger: {
        trigger: '.nav-item',
        toggleActions: "play none none none"
      },
      opacity: 0,
      duration: 1,
      x: -200
    });


    gsap.from('.section-1 h1', {
      scrollTrigger: {
        trigger: '.section-1 h1',
        toggleActions: "play none none none"
      },
      opacity: 0,
      duration: 1,
      x: -200
    });

    gsap.from('.section-1 p', {
      scrollTrigger: {
        trigger: '.section-1 p',
        toggleActions: "play none none none"
      },
      opacity: 0,
      duration: 2.0,
    });

    gsap.from('.section-1 img', {
      scrollTrigger: {
        trigger: '.section-1 img',
        toggleActions: "play none none none"
      },
      opacity: 0,
      duration: 1.5,
      x: 200
    });

    var arr = document.getElementsByClassName("x");
    for (var i = 0; i < arr.length; i++) {

      gsap.from(arr[i], {
        scrollTrigger: {
          trigger: arr[i],
          toggleActions: "play none none none"
        },
        opacity: 0,
        duration: 1.5,
        x: -200
      });

    }
    var img_arr = document.getElementsByClassName("image");
    for (var i = 0; i < img_arr.length; i++) {

      gsap.from(img_arr[i], {
        scrollTrigger: {
          trigger: img_arr[i],
          start: "top center",
          toggleActions: "play none none none",
        },
        opacity: 0,
        duration: 1.5,
      });

    }
    gsap.utils.toArray('#panel').forEach((panel, i) => {
      ScrollTrigger.create({
        trigger: panel,
        start: "top top",
        pin: true,
        pinSpacing: false
      });
    });
  </script>
</body>
</html>