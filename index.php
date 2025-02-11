<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon" />
    <title>Students' Alumni Cell</title>


    <!-- CSS only -->
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Pathway Font -->
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Source+Sans+Pro:400" rel="stylesheet">

    <!-- Bootstrap 4 Stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"
        integrity="sha256-cVd/tGoi+gMVBrq5xd20ZA447xChtJWaESiLQc5LB1c=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="css/homepagenew.css">
    <link rel="stylesheet" type="text/css" href="css/homepage1new.css">

    <style>
        .btn-outline-primary:hover,
        .btn-outline-primary:active,
        .btn-outline-primary:visited {
            background-color: #00416d !important;
            border-color: #00416d !important;
            color: white !important;
        }

        .btn-outline-primary {
            color: #00416d !important;
            border-color: white !important;
        }

        .hero-carousel .carousel-item .carousel-image {
            background-size: 100% 100%;
        }

        .carousel-control-nexti,
        .carousel-control-previ {
            background-color: none;
            width: fit-content;
            height: fit-content;
            font-size: 2rem;
            color: rgba(0, 0, 0, 0.74);
            position: absolute;
            top: 30%;
            left: 2%;
            opacity: 0.6;

        }

        .carousel-control-nexti {
            left: auto;
            right: 2%;
        }

        .carousel-control-nexti:hover,
        .carousel-control-previ:hover {
            color: black;
            transition: ease-in-out;
        }

        @media only screen and (max-width:500px) {
            .hero-carousel .carousel-item {
                height: 350px;
            }

            .hero-carousel .carousel-item .carousel-image {
                height: 350px;
            }

        }
    </style>
    <script>
        function resizeframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + "px";
        }
    </script>

</head>


<body>
    <?php include 'navbar.php' ?>
    <div id="carouselExampleIndicators" style="width:100%; height:100%" class="carousel slide hero-carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <!--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>-->
        </ol>
        <div class="carousel-inner" style="width:100%; height:100%">
            <div class="carousel-item active">
                <div class="carousel-image" style="background-image:url('webcover21.jpg');background-size:100% 100%"></div>

                <!--</div>
             <div class="carousel-item" style>
                <div class="carousel-image" style="background-image:url('img/indexslider/phonathon2019.webp');"></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image:url('img/indexslider/alvida.webp');" ></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image:url('img/indexslider/convocation.webp');"></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image:url('img/indexslider/imprint.webp');"></div>
            </div>
             <div class="carousel-item"> 
            <div class="carousel-image" style="background-image:url('img/indexslider/sac-logo.webp');"></div>
            </div> 
            <div class="carousel-item">
                <div class="carousel-image" style="background-image:url('img/indexslider/homecoming.webp')"></div>
            </div> -->
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
        </div>
    </div>
    <main>
        <section class="section-1 justify-content-center" style="display:flex;overflow:hidden">
            <div class="container" style="margin:18px">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="panel text-left">
                            <h1>ABOUT US</h1>
                            <div class="progress" style="height: 0.4rem;">
                                <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;">
                                </div>
                            </div>
                            <p class="pt-4" style="opacity: 1" align="justify">
                                The Students' Alumni Cell, IIT Kharagpur is a voluntary student body working under the
                                aegis of the Dean, Outreach. It strives to bridge
                                the gap between IIT Kharagpur and its esteemed alumni community.

                                The Students' Alumni Cell continuously endeavours to strengthen the relations of the
                                alumni of this Institute and their alma mater. It has been instrumental in organising
                                the Annual Alumni Meet, Regional Student Alumni Meet, regular guest lectures by
                                distinguished alumni in the campus, publishing the annual literary magazine (Yearnings
                                of Yore) & the annual yearbook. The Students' Alumni Cell also operates the Student -
                                Alumni Mentorship Programme, My Imprint (Giving Back - Alumni contribution) and
                                organises Alvida (the annual farewell dinner).

                            </p>
                        </div>
                    </div>
                    <br>
                    <div id="x" class="col-md-3 col-12" style="position:relative">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fiitkgp.alumnicell&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" style="border:none;position:absolute;top:0;right:0;left:0;bottom:0;height:100% !important;width:100% !important" scrolling="no" onload="resizeframe(this)" frameborder="0" allowTransparency="true" allow="encrypted-media">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <section id="timeline">

        <div class="tl-item">

            <div class="tl-bg" style="background-image: url(img/marathon1.webp)"></div>

            <div class="tl-year">
                <p class="f2"><u>What We Do</u></p>
                <br>
                <p class="f2 heading --sanSerif">For Alumni</p>
            </div>

            <div class="tl-content">
                <h1></h1>
                <p>The Cell helps the alumni in staying connected to their alma mater. Through regular interactions with
                    the students, the alumni get a chance to share their experiences and impart the knowledge they have
                    acquired to the next generation of KGPians. Also, with this interchange, they get a glimpse of the
                    young minds of the nation.</p>
            </div>

        </div>

        <div class="tl-item">

            <div class="tl-bg" style="background-image: url(img/IIT.webp)"></div>

            <div class="tl-year">
                <p class="f2"><u>What We Do</u></p>
                <br>
                <p class="f2 heading--sanSerif">For Institute</p>
            </div>

            <div class="tl-content">
                <h1 class="f3 text--accent ttu"></h1>
                <p>Students' Alumni Cell reconnects the Institute and alumni, providing the alumni with an avenue to
                    give back to their alma mater. The Institution Development Programme (IDP) aims to promote the
                    Institute's domestic ranking while simultaneously improving the international stature.</p>
            </div>

        </div>

        <div class="tl-item">

            <div class="tl-bg" style="background-image: url(img/imprint.webp)"></div>

            <div class="tl-year">
                <p class="f3 text --accent ttu"><u>What We Do</u></p>
                <br>
                <p class="f2 heading--sanSerif">For Students</p>
            </div>

            <div class="tl-content">
                <h1 class="f3 text--accent ttu"></h1>
                <p>Students' Alumni Cell works in conjunction with the student administration bodies and is therefore
                    constantly in touch with the needs and wants of the students. It connects the students with the
                    alumni, giving them a chance to interact with some of the most eminent personalities in all fields
                    of work. It works towards making their learning experience more holistic.</p>
            </div>

        </div>

    </section>

    <section class="section-3">
        <div class="container-fluid">
            <h1 class="text-center" style="font-family: 'Raleway', sans-serif">News & Updates</h1>
        </div>
    </section>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div id="inam" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <!--New Update added dated 10/04/22-->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <!-- <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/y1.webp" style="height: 300px;"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">We aim to democratise access to overseas education for 10 million global citizens</h5>
                                                <p class="card-text">To empower students across the spectrum by making quality global education accessible for all, built a customer-focused online platform that offers end-to-end services for students.... <br><br><button type="button" class="btn btn-outline-primary"><a
                                                            href="https://yourstory.com/2022/04/democratising-overseas-education-access-10-million-global-citizens/amp"
                                                            target="_blank"
                                                            style="color:white">More...</a></button>
                                                </p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/atal.png" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">The Yogic Avabodha – Atal</h5>
                                                <p class="card-text">The spirit of a warrior, the body of iron and a heart of gold, yes we are talking about an explorer of life, Mr. Atal Agarwal, an alumnus of IIT Kharagpur, who graduated in 2017 and became one among the few IITians who represented Indian Institute of Technology (IIT) as an Alum in the prestigious title of Ironman athlete competition.....<br><br><button type="button" class="btn btn-outline-primary"><a href="https://kgpchronicle.iitkgp.ac.in/the-yogic-avabodha-atal/" target="_blank" style="color:white">More...</a></button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/boult-affinity-final.jpg" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">Affinity Programme 2022: Enjoy exciting offers on all Boult Audio Products.</h5>
                                                <p class="card-text">We are thrilled to collaborate with Boult Audio, a global leader in the audio equipment market, under our Affinity Programme. Enjoy exclusive offers like flat 15% off, extended warranty and other special benefits. Use your Institute email id and coupon code: IITKGP15BA.
                                                    <br><br><button type="button" class="btn btn-outline-primary">
                                                        <a href="affinity.php" style="color:white">More...</a></button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="pic1.jpg" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">Not satisfied with DRDO performance, govt appoints Samir Kamat as new DRDO chief</h5>
                                                <p class="card-text">According to an order by the Appointments Committee of Cabinet, “Appointment of Samir V. Kamat, Distinguished Scientist and Director General, Naval Systems & Materials as Secretary, Department of Defence Research and Development and Chairman, DRDO.....<br><br><button type="button" class="btn btn-outline-primary"><a href="https://www.indiatoday.in/india/story/govt-appoints-samir-kamat-as-new-drdo-chief-1992625-2022-08-26" target="_blank" style="color:white">More...</a></button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="pic2.jpg" style="height: 300px;"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">Forbes 30 Under 30 – Alumnus Prof. Srijan Kumar</h5>
                                                <p class="card-text">Prof. Kumar is an Assistant Professor at the Georgia Institute of Technology. He is a specialist in
                                                AI, ML, and Data Science. In his attempt to make the internet a safer place he is involved in
                                                developing Data Science and Machine Learning .....<br><br><button type="button" class="btn btn-outline-primary"><a
                                                            href="https://kgpchronicle.iitkgp.ac.in/forbes-30-under-30-alumnus-prof-srijan-kumar/"
                                                            target="_blank"
                                                            style="color:white">More...</a></button>
                                                </p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!--New Update added eneded dated 10/04/22-->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/07.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">COVID-19: IIT Kharagpur Alumni Foundation starts fundraiser for 20 ICU beds</h5>
                                                <p class="card-text">With an aim of improving the hospital infrastructure and helping Kharagpur to fight against the COVID wave, the IIT Kharagpur has started a fundraiser to supply beds to the institute’s new hospital with with 20 ICU beds and 80 ward beds..... <br><br><button type="button" class="btn btn-outline-primary"><a href="https://news.careers360.com/covid-19-iit-kharagpur-alumni-foundation-starts-fundraiser-for-20-icu-beds" target="_blank" style="color:white">More...</a></button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/08.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IITians Spearheading The AI Revolution In India</h5>
                                                <p class="card-text"> The IITians are making a mark in the domain of artificial intelligence. we are celebrating 20 IIT alumni currently leading AI in India. While some hold key positions in tech companies, others have chosen the entrepreneurial journey.....<br><br><button type="button" class="btn btn-outline-primary"><a href="https://analyticsindiamag.com/iitians-spearheading-the-ai-revolution-in-india/" target="_blank" style="color:white">More...</a></button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/09.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IIT Kharagpur Alumnus Mix Board Games With Augmented Reality</h5>
                                                <p class="card-text">PlayShifu, an Augmented Reality (AR) toymaker founded by IIT Kharagpur alumnus Vivek Goyal and Dinesh Advani, has its presence in over 35 countries and a customer base of over 7 lakh.....<br><br><button type="button" class="btn btn-outline-primary"><a href="https://www.thebetterindia.com/259139/playshifu-artificial-reality-stem-game-toymaker-made-in-india/" target="_blank" style="color:white">More...</a></button></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/01.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IIT-KGP Alumni hold online quiz to raise funds for campus workers</h5>
                                                <p class="card-text">With the pandemic and lockdown raising question mark over the next semester, students and alumni got together to help alleviate the distress of informal workers on campus... <br><br><button type="button" class="btn btn-outline-primary"><a href="https://indianexpress.com/article/cities/kolkata/rs-90-lakh-and-50-yrs-iit-kgp-alumni-hold-online-quiz-to-raise-funds-for-campus-workers-6480765/" target="_blank" style="color:white">More...</a></button>
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/05.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">Coronavirus: Startups by IIT-KGP alumni unveil tech to fight pandemic</h5>
                                                <p class="card-text">IIT Kharagpur alumnus Debayan Saha has collaboratively developed Airlens Minus Corona, a device which may help sanitise large areas...<br><br><button type="button" class="btn btn-outline-primary"><a href="https://economictimes.indiatimes.com/small-biz/startups/newsbuzz/coronavirus-start-ups-by-iit-kgp-alumni-unveil-tech-to-fight-pandemic/articleshow/75179928.cms" target="_blank" style="color:white">More...</a></button>
                                                </p>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/03.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IIT Alumnus Launches Mission 10k Khushiyan; 10,000 Children To Receive Educational Play Boxes</h5>
                                                <p class="card-text">As part of this campaign -- Mission 10K Khushiyaan, Anthill Creations seeks to deliver 10,000 underprivileged children with educational boxes. The educational boxes will provide the children an opportunity to learn via structured games...<br><br><button type="button" class="btn btn-outline-primary"><a href="https://www.ndtv.com/education/iit-alumnus-launches-mission-10k-khushiyan-10000-children-receive-educational-play-boxes" target="_blank" style="color:white">More...</a></button></p>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/06.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">How an IIT Kharagpur alumnus, investment banker, and traveller started a trekking company</h5>
                                                <p class="card-text">Trekmunk is a Delhi-NCR based bootstrapped startup. Apart from regular treks, it hosts trail cleaning treks and escorts doctors to high altitudes to treat the less fortunate...<br><br><button type="button" class="btn btn-outline-primary"><a href="https://yourstory.com/2020/09/iit-kharagpur-alumnus-investment-banker-traveller-trekking-startup" target="_blank" style="color:white">More...</a></button></p>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/02.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IIT & Super30 alumni launch Uber-like study help app FILO for K12 students</h5>
                                                <p class="card-text">FILO is a sachet education app that aims to bridge the foundational divide for millions of deserving students of India with a lifeline - a simple video call that connects students with expert teachers...<br><br><button type="button" class="btn btn-outline-primary"><a href="https://www.livemint.com/brand-post/iit-super30-alumni-launch-uber-like-study-help-app-filo-for-k12-students-11606311047505.html" target="_blank" style="color:white">More...</a></button></p>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/04.webp" style="height: 300px;" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">Lockdown: IIT Kharagpur alumni to provide financial aid to 10,500 unorganised sector workers</h5>
                                                <p class="card-text">The beneficiaries, who will receive financial assistance for six months, include daily wagers in eateries, ward boys of the hostels, laundrymen, tea stall owners, rickshaw-pullers, domestic workers and labourers engaged in construction projects, it said...<br><br><button type="button" class="btn btn-outline-primary"><a href="https://www.hindustantimes.com/education/lockdown-iit-kharagpur-alumni-to-provide-financial-aid-to-10-500-unorganised-sector-workers/story-QBr2qCFZQ84qWgAaBM93rN.html" target="_blank" style="color:white">More...</a></button></p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/Alumina.jpg" style="height: 300px;"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IIT Kharagpur develops cutting-edge technology to reduce Red Mud by Alumina refining</h5>
                                                <p class="card-text">IIT Kharagpur and Vedanta Aluminium have developed a process to significantly reduce the generation of bauxite residue, commonly known as red mud, in the alumina refining process. The patented process...<br><br><button type="button" class="btn btn-outline-primary"><a
                                                            href="https://kgpchronicle.iitkgp.ac.in/iit-kharagpur-develops-cutting-edge-technology-to-reduce-red-mud-by-alumina-refining/"
                                                            target="_blank"
                                                            style="color:white">More...</a></button></p>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/grp_photo.jpg" style="height: 300px;"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">'Our classes were held where freedom fighters were locked up,' says Narasimhan Venkatesan Patel, Alumnus of the First Batch at IIT KGP</h5>
                                                <p class="card-text">Mr. Narasimhan Venkatesan Patel, Former Member of the Railway Board and an Electrical Engineering Alumnus (1951-55) of IIT Kharagpur, shares some interesting anecdotes about the faculty...<br><br><button type="button" class="btn btn-outline-primary"><a
                                                            href="https://kgpchronicle.iitkgp.ac.in/our-classes-were-held-where-freedom-fighters-were-locked-up-says-narasimhan-venkatesan-patel-alumnus-of-the-first-batch-at-iit-kgp/"
                                                            target="_blank"
                                                            style="color:white">More...</a></button></p>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="card" style="height: 100% !important;">
                                            <img src="img/news&updates/mou.jpg" style="height: 300px;"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">IIT Kharagpur Signs MoU with Uneverse Mobilty, a Kolkata based Startup, for the Development & Commercialization of Sodium Ion Batteries in India</h5>
                                                <p class="card-text">Indian Institute of Technology Kharagpur signed a Memorandum of Understanding (MoU) with Uneverse Mobility Pvt Ltd, a Kolkata based startup focusing on next generation battery technology...<br><br><button
                                                        type="button" class="btn btn-outline-primary"><a
                                                            href="https://kgpchronicle.iitkgp.ac.in/iit-kharagpur-signs-mou-with-uneverse-mobilty-a-kolkata-based-startup-for-the-development-commercialization-of-sodium-ion-batteries-in-india/"
                                                            target="_blank"
                                                            style="color:white">More...</a></button></p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>
                    <span class="carousel-control-previ fas fa-chevron-circle-left fa-2x" data-target="#inam" data-slide="prev"></span>
                    <span class="carousel-control-nexti fas fa-chevron-circle-right fa-2x" data-target="#inam" data-slide="next"></span>

                </div>

            </div>

        </div>

    </div>

    <br><br>

    <?php include 'footer.php' ?>
    <!-- <?php include 'preloader.php' ?> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $("#one").each(function() {
            $(this).addClass("progress-bar-purple");
        });
        (function($) {
            "use strict";

            // manual carousel controls
            $('.next').click(function() {
                $('.carousel').carousel('next');
                return false;
            });
            $('.prev').click(function() {
                $('.carousel').carousel('prev');
                return false;
            });

        })(jQuery);

        (function($) {

            $(document).ready(function() {
                // Pause hero carousel
                $('.hero-carousel').carousel('pause');
            });

        })(jQuery);
    </script>

</body>