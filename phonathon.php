<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students' Alumni Cell | Phonathon</title>
    <link rel="stylesheet" href="css/phonathon.css">
    <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon" />

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
    <div class="header" style="background-image: url(img/phonathon2019.webp);background-size: 100% 100%;background-position: center">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-7 col-sm-12  text-white">
                    <h1 style="text-align: left;"></h1>
                    <!--spacing for any headimg if needed-->
                    <h6 style="text-align: left;"></h6>
                </div>
            </div>
        </div>
    </div>
    <script>
        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".gsapx", {
            scrollTrigger: {
                trigger: ".gsapx",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 2
        });
    </script>
    <section class="section-2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="panel text-center">
                        <h1 class="gsap1">ABOUT</h1>
                        <div class="progress" style="height: 0.4rem;">
                            <div id="two" class="progress-bar" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 0.4rem;"></div>
                        </div>
                        <p class="pt-3 gsap1" style="opacity: 1" align="justify">
                            Phonathon is an initiative of Students’ Alumni Cell which helps in Institute development
                            under the Endowment Campaign while serving as a platform for the alumni to give back to
                            the alma mater. In various avenues like developing centers of excellence for innovative
                            research, recruiting world-class faculties, students scholarships etc; this event
                            benefits the institute. In our continuous efforts to expand the alumni network, bringing
                            forward conversations of first year students with the alumni supports our efforts as
                            well as provides the students with a unique opportunity to interact with the alumni as
                            well as contribute to the development of the institute.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Scroll animations for above section-->
    <script>
        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".gsap1", {
            scrollTrigger: {
                trigger: ".gsap1",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 2
        });
    </script>
    <section class="section-2">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="panel text-center">
              <h1 class="x gsap2">Phonathon 4.0</h1>
              <div class="progress gsap2" style="height: 0.4rem;">
                <div id="two" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                       aria-valuemin="0" aria-valuemax="100" style="height: 0.4rem;">
                </div>
              </div>
              <br>
              <!-- Photo Grid -->
            <div id="gallery_row" class="row align-items-center gsap2">
                <div class="col-12 text-center">
                    <img class="img-fluid phonathon4_images" src="img/phonathon/phonathon41.webp" height="auto">
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--animations of Phonathon 4.0-->
    <script>
        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".gsap2", {
            scrollTrigger: {
                trigger: ".gsap2",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 2
        });

    </script>
     <section class="section-2">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="panel text-center">
              <h1 class="x gsap2">Phonathon 3.0</h1>
              <div class="progress gsap2" style="height: 0.4rem;">
                <div id="two" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                       aria-valuemin="0" aria-valuemax="100" style="height: 0.4rem;">
                </div>
              </div>
              <br>
              <!-- Photo Grid -->
              <div id="gallery_row" class="row align-items-center gsap2">
                <div class="col-12 text-center">
                    <img class="img-fluid phonathon4_images" src="img/phonathon/phonathon31.webp" height="auto">
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
                    <div class="panel text-center px-5">
                        <h1 class="x">Testimonials</h1>
                        <div class="progress" style="height:0.4rem;">
                            <div id="three" class="progress-bar" role="progressbar" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                        </div>
                        <br>
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 align-items-center">
                                            <img src="img/phonathon/2.0/9(cropped).webp" width="100%" height="auto"
                                                class="testimonial3_images">
                                            <h2 class="font-weight-bold">Shrinath Dakare</h1>
                                            <h3 class="font-weight-bold" style="color: grey;">batch
                                                of '20</h2>
                                            <p class="card-text">
                                                "One of the alumnus from 1965 batch asked me top 20 in what? India? I
                                                told him that kgp is already among top 5 in India, and he was
                                                amazed. He told me that he is keen to visit IITKGP again, as he
                                                never visited kgp back after his graduation."
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-6 align-items-center">
                                            <img src="img/phonathon/2.0/5(cropped).webp" width="100%" height="auto"
                                                class="testimonial3_images">
                                            <h2 class="font-weight-bold">Md Zaman Khan</h1>
                                            <h3 class="font-weight-bold" style="color: grey;">batch
                                                of '20</h2>
                                            <p class="card-text">
                                                "Varied feedbacks but most of the alumni were pretty concerned about
                                                the
                                                expected hike in the tuition fee.""
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 align-items-center">
                                            <img src="img/phonathon/2.0/2(cropped).webp" width="100%" height="auto"
                                                class="testimonial3_images">
                                                <h2 class="font-weight-bold">Aman Verma</h1>
                                            <h3 class="font-weight-bold" style="color: grey;">batch
                                                of '20</h2>
                                            <p class="card-text">
                                                "It was an awesome experience , where I got to talk to the alumni and
                                                also got to learn a lot of things. I had really interesting
                                                conversations with the
                                                alumni, which made the whole event a lot of fun."
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-6 align-items-center">
                                            <img src="img/phonathon/2.0/8(cropped).webp" width="100%" height="auto"
                                                    class="testimonial3_images">
                                            <h2 class="font-weight-bold">Neerav Jain</h1>
                                            <h3 class="font-weight-bold" style="color: grey;">batch
                                                of '20</h2>
                                            <p class="card-text">
                                                "It was a pretty good talk with one of the alumni. We could connect
                                                well, him being from the same town as mine. Overall, it was a great
                                                experience."
                                            </p>   
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 align-items-center">
                                            <img src="img/phonathon/2.0/7(cropped).webp" width="100%" height="auto"
                                                class="testimonial3_images">
                                                <h2 class="font-weight-bold">Hamdan Iftikhar</h1>
                                            <h3 class="font-weight-bold" style="color: grey;">batch
                                                of '20</h2>
                                            <p class="card-text">
                                                "Being a part of phonathon 2.0 was indeed an amazing experience. From
                                                that nervousness before making the first call, to the 'peace' later,
                                                it all felt great. I made a lot of new friends in the process, both
                                                from my batch and seniors alike. I was glad to know the impression
                                                IIT Kharagpur has left on the alumni, and their willingness to
                                                support and give back to their Alma Mater. A special thanks to
                                                Students' Alumni Cell for giving me the chance to be a part of it."
                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-6 align-items-center">
                                                <img src="img/phonathon/2.0/6(cropped).webp" width="100%" height="auto"
                                                    class="testimonial3_images">
                                                    <h2 class="font-weight-bold">Anmol Thakkar</h1>
                                                <h3 class="font-weight-bold" style="color: grey;">batch
                                                    of '20</h2>
                                                <p>
                                                    "It was quite a funda session for me with an
                                                    alumnus who is an
                                                    entrepreneur. He shared some of the insights and his own
                                                    experiences.Do you have a
                                                    dream? he asked. Don't worry about success or failure | Jump
                                                    in | This is the time of
                                                    your life when you
                                                    should take risks. He was stressing the fact that it's you
                                                    who matters. Its in the
                                                    little steps that you
                                                    take,result into success."
                                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
    <!-- <?php include 'preloader.php' ?> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    <script src="js/SAMP.js"></script>
    <script>
        $("#one,#two,#three,#four").each(function () {
            $(this).addClass("progress-bar-purple");
        });
        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".testimonial_images", {
            scrollTrigger: {
                trigger: ".testimonial_images",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 1.5,
            x: -200,
            stagger: 0.4
        });
        gsap.from(".testimonial2-images1", {
            scrollTrigger: {
                trigger: ".testimonial2-images1",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 1.5,
            x: 1200,
            stagger: 0.4
        });
        gsap.from(".testimonial2-images1b", {
            scrollTrigger: {
                trigger: ".testimonial2-images1b",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 1.5,
            x: 1200,
            stagger: 0.4
        });
        gsap.from(".testimonial3_images", {
            scrollTrigger: {
                trigger: ".testimonial3_images",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 1.5,
            x: -200,
            stagger: 0.1
        });
        gsap.from(".testimonial3-images1", {
            scrollTrigger: {
                trigger: ".testimonial3-images1",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 1.5,
            x: 1200,
            stagger: 0.1
        });
        gsap.from(".testimonial3-images1b", {
            scrollTrigger: {
                trigger: ".testimonial3-images1b",
                start: "top center",
                toggleActions: "play play play play"
            },
            opacity: 0,
            duration: 1.5,
            x: 1200,
            stagger: 0.1
        });
    </script>

</body>

</html>