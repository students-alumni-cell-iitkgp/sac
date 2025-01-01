<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students' Alumni Cell | Yearbook</title>
    <link rel="stylesheet" href="css\yearbook.css">
    <link rel="stylesheet" href="css/SAM_mobile-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="shortcut icon" href="..\img\favicon_io\Logo2.2.ico" type="image/x-icon" />

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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
            border-color: #00416d !important;
        }

        .swiper-slide {
            width: 300px;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transform-style: preserve-3d;
            transition: transform 0.5s ease-in-out;
        }

        /* Center Slide */
        .swiper-slide-active {
            transform: scale(1.1) rotateY(0deg);
            z-index: 2;
        }

        /* Left Slide */
        .swiper-slide-prev {
            transform: scale(0.9) rotateY(-15deg);
            opacity: 0.8;
            z-index: 1;
        }

        /* Right Slide */
        .swiper-slide-next {
            transform: scale(0.9) rotateY(15deg);
            opacity: 0.8;
            z-index: 1;
        }

        .image {
            border-radius: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);

            border-radius: 50%;

            width: 50px;

            height: 50px;

            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;


        }

        /* For hidden slides */
        .swiper-slide:not(.swiper-slide-active):not(.swiper-slide-prev):not(.swiper-slide-next) {
            opacity: 0;
            transform: scale(0.8);
        }

        @media screen and (max-width: 426px) {
            .swiper-slide {
                width: 162px;
            }
        }
    </style>
</head>

<body>


    <?php include 'navbar.php' ?>

    <main>
        <section class="section-1">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="panel text-left">
                            <h1 class="text-center">YearBook</h1>
                            <div class="progress" style="height:0.4rem;">
                                <div id="one" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                            </div>
                            <p class="pt-4">
                                The yearbook is a dedicated volume that captures the
                                nostalgic memories of the graduating batch of our Institute.
                                The beautiful years spent in the Institute are engraved and expressed via photos
                                and writeups which is given as a souvenir of departure from the Institute. Few years down the road when
                                they will walk down the memory lane,
                                the yearbook will be
                                the light which will lit up the faded memories and show the path through the old forgotten ways
                            </p>
                            <div class="row text-center">
                                <div class="col-12">
                                    <a href="https://sac.iitkgp.ac.in/yearbook/" target="blank">
                                        <button class="btn btn-outline-primary justify-content-center" href="https://sac.iitkgp.ac.in/yearbook/"><i class="fa fa-book"></i> YearBook</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $slides2 = [
            ['img' => 'img\yearbook\yb25.jpg', 'year' => '2025', 'ug_link' => 'https://drive.google.com/file/d/11JMCrMjqva8K-rXeKoLEINiOgDgQjT_s/view?usp=drivesdk', 'pg_link' => 'https://drive.google.com/file/d/122XdfGZEV0x5WizT_r2TyxVRJhAUbeW_/view?usp=drivesdk', 'rs_link' => 'https://drive.google.com/file/d/11BWQSDHFjvDG2YYgr9kmEUsH3TC4uPv_/view?usp=drivesdk'],
            ['img' => 'img\yearbook\yb23.webp', 'year' => '2023', 'ug_link' => 'https://drive.google.com/file/d/11kLKdt3w43L-sP9JtaRE2VCxCvIjG4-t/view', 'pg_link' => 'https://drive.google.com/file/d/11r-DqsC8tAXcdDyiRJDpBNHCVyYxaaHE/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1R8w67KQpKHouNd2K0uoA2d03DAVPhrYr/view?usp=sharing'],
            ['img' => 'img\yearbook\yb22.webp', 'year' => '2022', 'ug_link' => 'https://drive.google.com/file/d/1VDv6ZPSi5InMHslYi5GcgL-m7qRg5uk2/view?usp=sharing', 'pg_link' => 'https://drive.google.com/file/d/1bySSeBraeOOGl9JEV3P185tksQAlyc70/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1Fgs_aHGfoOgXp8sbU72sbSek06PhA1LB/view?usp=sharing'],
            ['img' => 'img\yearbook\yb21.webp', 'year' => '2021', 'ug_link' => 'https://drive.google.com/file/d/11kLKdt3w43L-sP9JtaRE2VCxCvIjG4-t/view', 'pg_link' => 'https://drive.google.com/file/d/1PS8mphnhebo3Nh02-KhH0ex8ifmKihJh/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1znzxL9NovFMb8_HjflOlC-DQmyjsa8JD/view?usp=sharing'],
            ['img' => 'img\yearbook\year2020.webp', 'year' => '2020', 'ug_link' => 'https://drive.google.com/file/d/1v8SiIwCqeIzERMoYXC9bxKQu7pPz3muP/view?usp=sharing', 'pg_link' => 'https://drive.google.com/file/d/1qhRMxn9StnsPWs1C1-f6gfllCViSYlnB/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1jelTjKSsrS7LnZDniAiC4yqjeZ-yOjgb/view?usp=sharing'],
            ['img' => 'img\yearbook\year2019.webp', 'year' => '2019', 'ug_link' => 'https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing', 'pg_link' => 'https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing'],
            ['img' => 'img\yearbook\year2018.webp', 'year' => '2018', 'ug_link' => 'https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing', 'pg_link' => 'https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing'],
            ['img' => 'img\yearbook\year2017.webp', 'year' => '2017', 'ug_link' => 'https://drive.google.com/file/d/1WvuLhTKNVHc-owJhFxJS5CWLjBfKDrC1/view?usp=sharing', 'pg_link' => 'https://drive.google.com/file/d/1WvuLhTKNVHc-owJhFxJS5CWLjBfKDrC1/view?usp=sharing', 'rs_link' => 'https://drive.google.com/file/d/1WvuLhTKNVHc-owJhFxJS5CWLjBfKDrC1/view?usp=sharing'],
            ['img' => 'img\yearbook\year2016.webp', 'year' => '2016', 'ug_link' => 'https://drive.google.com/file/d/0B2DrxeNIhpL0dGNlc0RpYjhXcFk/view?ts=59fd5ae5&resourcekey=0-tv1hLGs35PN1uAhH8ZqvMQ', 'pg_link' => 'https://drive.google.com/file/d/0B2DrxeNIhpL0dGNlc0RpYjhXcFk/view?ts=59fd5ae5&resourcekey=0-tv1hLGs35PN1uAhH8ZqvMQ', 'rs_link' => 'https://drive.google.com/file/d/0B2DrxeNIhpL0dGNlc0RpYjhXcFk/view?ts=59fd5ae5&resourcekey=0-tv1hLGs35PN1uAhH8ZqvMQg'],
            ['img' => 'img\yearbook\year2015.webp', 'year' => '2015', 'ug_link' => 'https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ', 'pg_link' => 'https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ', 'rs_link' => 'https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ'],
            ['img' => 'img\yearbook\year2014.webp', 'year' => '2014', 'ug_link' => 'https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ', 'pg_link' => 'https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ', 'rs_link' => 'https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ'],


        ]
        ?>

        <section class="section-3">
            <div class="container-fluid">
                <h1 class="text-center" style="color:white;">Exhibition Corner</h1>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-sm-12 col-lg-8">
                        <div class="progress" style="height:0.4rem;">
                            <div id="two" class="progress-bar-pink" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($slides2 as $slide): ?>
                            <div class="swiper-slide" style="cursor: pointer;">
                                <img class="image" width="100%" height="260px"
                                    src="<?php echo $slide['img']; ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                >
                                <h2 class="text-center">Yearbook <?php echo $slide['year']; ?>....</h2>
                                <div class="row ">
                                    <div class="img-txt ">
                                        <a href="<?php echo $slide['ug_link'] ?>" target="_blank" style="color:black">UG</a>
                                    </div>
                                    <div class="img-txt">
                                        <a href="<?php echo $slide['pg_link'] ?>" target="_blank" style="color:black"> PG</a>
                                    </div>
                                    <div class="img-txt">
                                        <a href="<?php echo $slide['rs_link'] ?>" target="_blank" style="color:black"> RS</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- <div class="row">

                    <div class="col-sm-12">
                        <div id="inam" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-sm-12 col-lg-4">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\yb23.webp" class="h-img">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Yearbook 2023...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/11kLKdt3w43L-sP9JtaRE2VCxCvIjG4-t/view" target="_blank" style="color:black"> UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/11r-DqsC8tAXcdDyiRJDpBNHCVyYxaaHE/view?usp=sharing" target="_blank" style="color:black"> PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1R8w67KQpKHouNd2K0uoA2d03DAVPhrYr/view?usp=sharing" target="_blank" style="color:black"> RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-4">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\yb22.webp" class="h-img">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Yearbook 2022...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/1VDv6ZPSi5InMHslYi5GcgL-m7qRg5uk2/view?usp=sharing" target="_blank" style="color:black"> UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1bySSeBraeOOGl9JEV3P185tksQAlyc70/view?usp=sharing" target="_blank" style="color:black"> PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1Fgs_aHGfoOgXp8sbU72sbSek06PhA1LB/view?usp=sharing" target="_blank" style="color:black"> RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-4">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\yb21.webp" class="h-img">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Yearbook 2021...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/1CiV2B1W2XB6GA5mydYmLg2ke34Fo_Z6T/view?usp=sharing" target="_blank" style="color:black"> UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1PS8mphnhebo3Nh02-KhH0ex8ifmKihJh/view?usp=sharing" target="_blank" style="color:black"> PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1znzxL9NovFMb8_HjflOlC-DQmyjsa8JD/view?usp=sharing" target="_blank" style="color:black"> RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-4 curved-slide">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2020.webp" class="h-img">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Yearbook 2020...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/1v8SiIwCqeIzERMoYXC9bxKQu7pPz3muP/view?usp=sharing" target="_blank" style="color:black"> UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1qhRMxn9StnsPWs1C1-f6gfllCViSYlnB/view?usp=sharing " target="_blank" style="color:black"> PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1jelTjKSsrS7LnZDniAiC4yqjeZ-yOjgb/view?usp=sharing " target="_blank" style="color:black"> RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-4 curved-slide">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2019.webp" class="h-img">
                                                    <div class="card-body">
                                                        <h4 class="card-title">YearBook 2019...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing" target="_blank" style="color:black"> UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing" target="_blank" style="color:black"> PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1h0Opa3GNGR20Hpiw71EwhwwjcDIwj7DJ/view?usp=sharing" target="_blank" style="color:black"> RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-4 curved-slide">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2018.webp" class="card-img-top">
                                                    <div class="card-body">
                                                        <h4 class="card-title">YearBook 2018...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/1WvuLhTKNVHc-owJhFxJS5CWLjBfKDrC1/view?usp=sharing" target="_blank" style="color:black">UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1WvuLhTKNVHc-owJhFxJS5CWLjBfKDrC1/view?usp=sharing" target="_blank" style="color:black">PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/1WvuLhTKNVHc-owJhFxJS5CWLjBfKDrC1/view?usp=sharing" target="_blank" style="color:black">RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-3 curved-slide">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2017.webp" class="card-img-top">
                                                    <div class="card-body">
                                                        <h4 class="card-title">YearBook 2017...</h4>
                                                        <div class="row">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/0ByPZPiiPCG8_aFFtN1VRRU5lb00/view?usp=sharing&resourcekey=0-wity-gekXThY6oNZ4Iya4A" target="_blank" style="color:black"> UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/0ByPZPiiPCG8_aC1kaHRyNDEtUG8/view?usp=sharing&resourcekey=0-gvQo-b-rsfrSRYFqpjM-ZA" target="_blank" style="color:black"> PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/0ByPZPiiPCG8_d2ZfVGw5TTNMekE/view?usp=sharing&resourcekey=0-QyxYHUpYEfDgNLi3txyZ1w" target="_blank" style="color:black">RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-lg-3 curved-slide">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2016.webp" class="card-img-top">
                                                    <div class="card-body">
                                                        <h4 class="card-title">YearBook 2016...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/0B2DrxeNIhpL0dGNlc0RpYjhXcFk/view?ts=59fd5ae5&resourcekey=0-tv1hLGs35PN1uAhH8ZqvMQ" target="_blank" style="color:black">UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/0B2DrxeNIhpL0dGNlc0RpYjhXcFk/view?ts=59fd5ae5&resourcekey=0-tv1hLGs35PN1uAhH8ZqvMQ" target="_blank" style="color:black">PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/0B2DrxeNIhpL0dGNlc0RpYjhXcFk/view?ts=59fd5ae5&resourcekey=0-tv1hLGs35PN1uAhH8ZqvMQ" target="_blank" style="color:black">RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-3 curved-slide">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2015.webp" class="card-img-top">
                                                    <div class="card-body">
                                                        <h4 class="card-title">YearBook 2015...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <a href="https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ" target="_blank" style="color:black">UG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ" target="_blank" style="color:black">PG</a>
                                                            </div>
                                                            <div class="img-txt">
                                                                <a href="https://drive.google.com/file/d/0B29Q9s5AMUD7Zl83cklZdEV5bzQ/view?ts=59fd6a04&resourcekey=0-wfnygWgzFZqUTMIQCDcrnQ" target="_blank" style="color:black">RS</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-3 ">
                                                <div class="card" style="height: 100% !important;">
                                                    <img src="img\yearbook\year2014.webp" class="card-img-top">
                                                    <div class="card-body">
                                                        <h4 class="card-title">YearBook 2014...</h4>
                                                        <div class="row ">
                                                            <div class="img-txt ">
                                                                <h6>UG</h6>
                                                            </div>
                                                            <div class="img-txt">
                                                                <h6>PG</h6>
                                                            </div>
                                                            <div class="img-txt">
                                                                <h6>RS</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                </div>


                            </div>


                        </div>
                        <a href="#inam" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark"></span>
                        </a>
                        <a href="#inam" class="carousel-control-next" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark"></span>
                        </a>

                    </div>

                </div> -->

            </div>

            </div>
        </section>
        <?php
        $slides = [
            ["video" => "https://www.youtube.com/embed/3E0qhmFI4_c", 'year' => '2024'],
            ["video" => "https://www.youtube.com/embed/J4VI-DbfcSM", 'year' => '2023'],
            ["video" => "https://www.youtube.com/embed/MKdLSCjaVVk", 'year' => '2022'],
            ["video" => "https://www.youtube.com/embed/6rawoOAt0SU", 'year' => '2021'],
            ["video" => "https://www.youtube.com/embed/9L_8Jqizhcw", 'year' => '2020'],
            ["video" => "https://www.youtube.com/embed/BMbMHIVlyjI", 'year' => '2019'],
            ["video" => "https://www.youtube.com/embed/eVt_KHFRPmY", 'year' => '2018'],
        ];
        ?>
        <section class="section-1">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="panel text-left" style="background-color: transparent;">
                            <h1 class="text-center" style="color: white;">Class Songs</h1>
                            <div class="progress" style="height:0.4rem;">
                                <div id="two" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height:0.4rem;"></div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-4 col-xs-12 py-4 px-md-5">
                                    <iframe class="image" width="100%" height="300px" src="https://www.youtube.com/embed/MKdLSCjaVVk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p class="text-center">Class Song of 2022</p>
                                </div>
                                <div class="col-md-4 col-xs-12 py-4 px-md-5">
                                    <iframe class="image" width="100%" height="300px" src="https://www.youtube.com/embed/BMbMHIVlyjI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p class="text-center">Class Song of 2019</p>
                                </div>
                                <div class="col-md-4 col-xs-12 py-4 px-md-5">
                                    <iframe class="image" width="100%" height="300px" src="https://www.youtube.com/embed/eVt_KHFRPmY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p class="text-center">Class Song of 2018</p>
                                </div>
                            </div> -->
                            <div class="swiper" style="position: relative;top:30px">
                                <div class="swiper-wrapper">
                                    <?php foreach ($slides as $slide): ?>
                                        <div class="swiper-slide">
                                            <iframe class="image" width="100%" height="300px"
                                                src="<?php echo $slide['video']; ?>"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                            </iframe>
                                            <h6 class="text-center" style="padding:auto;margin:auto">Class Song of <?php echo $slide['year']; ?></h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Navigation Buttons -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="height:100px">
        </section>
    </main>
    <!-- 		Footer start -->
    <?php include 'footer.php' ?>
    <!-- <?php include 'preloader.php' ?> -->
    <!--        Footer end -->
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 3, // Show 3 slides at a time
            spaceBetween: 16, // Space between slides
            centeredSlides: true, // Center the active slide
            loop: false, // Enable looping
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'coverflow', // Enable the coverflow effect
            coverflowEffect: {
                rotate: -28, // Degree of rotation for slides
                stretch: 0, // Space between slides along the axis
                depth: 100, // Depth perspective
                modifier: 1, // Effect multiplier
                slideShadows: true, // Disable shadows on slides
            },
        });
    </script>


    <script>
        $("#one,#two").each(function() {
            $(this).addClass("progress-bar-purple");
        });
        gsap.from('header', {
            opacity: 0,
            duration: 1
        })
        gsap.from('header h1', {
            opacity: 0,
            duration: 2,
            x: -200
        })
        gsap.from('header h6', {
            opacity: 0,
            duration: 2,
            x: -500
        })


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

        var img_txt = document.getElementsByClassName("img-txt");
        var card = document.getElementsByClassName("card");

        for (let i = 0; i < card.length; i++) {
            gsap.from(card[i], {
                scrollTrigger: {
                    trigger: card[i],
                    toggleActions: "play none none none"
                },
                opacity: 0,
                duration: 1.5,
                x: -200
            });
            $(card[i]).on('mouseenter', function(e) {
                for (let j = 0; j < 3; j++) {
                    gsap.to($(img_txt[i * 3 + j]), 1, {
                        opacity: 1,
                        ease: Sine.easeInOut
                    });
                }
            });
            $(card[i]).on('mouseleave', function(e) {
                for (let j = 0; j < 3; j++) {
                    gsap.to($(img_txt[i * 3 + j]), 1, {
                        opacity: 0,
                        ease: Sine.easeInOut
                    });
                }
            });
        }
        for (let i = 0; i < img_txt.length; i++) {
            $(img_txt[i]).on('mouseenter', function(e) {
                gsap.to($(img_txt[i]), 0.5, {
                    y: -8,
                    ease: Sine.easeInOut
                });
            });
            $(img_txt[i]).on('mouseleave', function(e) {
                gsap.to($(img_txt[i]), 1, {
                    y: 0,
                    ease: Sine.easeInOut
                });
            });
        }
    </script>
</body>

</html>