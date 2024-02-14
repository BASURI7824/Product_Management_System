<?php
include('assets/includes/connection.php');
include('assets/includes/function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>|| Ptoduct Management :: Index ||</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font-Awesome Icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper {
          position: relative;
            top: 65px;
            width: 100%;
            height: 70vh;
            box-shadow: 1px 2px 4px;
            z-index: 1;
          }

          .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
          }

          .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
          }

          .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
          }
      </style>
  </head>
  <body>

    <?php include('assets/includes/topbar.php'); ?>
    <?php include('assets/includes/navbar.php'); ?>

    

    <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="assets/images/sliders/1.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/2.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/3.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/4.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/5.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/6.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/7.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/8.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/9.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/10.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/11.jpg" alt="">
      </div>
      <div class="swiper-slide">
        <img src="assets/images/sliders/12.jpg" alt="">
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    <div class="autoplay-progress">
      <svg viewBox="0 0 48 48">
        <circle cx="24" cy="24" r="20"></circle>
      </svg>
      <span></span>
    </div>
  </div>

  <!-- Feature -->
  <section id="feature" class="section-p1">
    <div class="feature-box">
      <img src="assets/images/features/f1.png" alt="" height="100" width="140">
        <br> <br>
      <h6>Free Shipping</h6>
    </div>

    <div class="feature-box">
      <img src="assets/images/features/f2.png" alt="" height="100" width="140">
        <br> <br>
      <h6>Online Order</h6>
    </div>

    <div class="feature-box">
      <img src="assets/images/features/f3.png" alt="" height="100" width="140">
        <br> <br>
      <h6>Save Money</h6>
    </div>

    <div class="feature-box">
      <img src="assets/images/features/f4.png" alt="" height="100" width="140">
        <br> <br>
      <h6>Promotions</h6>
    </div>

    <div class="feature-box">
      <img src="assets/images/features/f5.png" alt="" height="100" width="140">
        <br> <br>
      <h6>Happy Sell</h6>
    </div>

    <div class="feature-box">
      <img src="assets/images/features/f6.png" alt="" height="100" width="140">
        <br> <br>
      <h6>24/7 Support</h6>
    </div>
  </section>

  <!-- Banner -->
  <section id="banner" class="section-m1">
    <h4>Repair Service</h4>
    <h2>Up to <span>70% Off</span> - All T-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>
  </section>

  <!-- Products -->
  <section id="categories" class="section-m1" style= "padding: 0 2rem; margin-left: 1rem">
    <h2><span>Popular</span> Products</h2>
    <div class="row" style="justify-content: center;">
      <?php
        getpro()  
          
      ?>
    </div>
  </section>

  <!-- Banner -- 2 -->

        <section id="banner" class="section-m1">
            <h4>Latest Offer</h4>
            <h2>Up to <span>50% Off</span> - All Electronics & Appliances</h2>
            <button class="normal">Explore More</button>
        </section>

  <!-- Small & Text Banner -->

        <section id="small-banner" class="section-p1">
            <div class="banner-box">
                <h4>Crazy Deals</h4>
                <h2>buy 1 get 1 free</h2>
                <span>The best classic dress is on sale at cara</span>
                <button class="normal">Learn More</button>
            </div>

            <div class="banner-box">
                <h4>Spring / Summer</h4>
                <h2>upcomming season</h2>
                <span>The best classic dress is on sale at cara</span>
                <button class="normal">Collection</button>
            </div>
        </section>

        <section id="text-banner" class="section-p1">
            <div class="banner-box">
                <h2>SEASONAL SALE</h2>
                <h3>Winter Collection -50% OFF</h3>
            </div>

            <div class="banner-box">
                <h2>New Winter Collection</h2>
                <h3>Spring/Summer 2023</h3>
            </div>

            <div class="banner-box">
                <h2> Girls Fashion</h2>
                <h3>New Treny Prints</h3>
            </div>
        </section>



        <!-- Contact -->

        <section id="contact-details" class="section-p1">
            <div class="details">
                <span>GET IN TOUCH</span>
                <h2>Visit one of our agency location or contact us today</h2>
                <h3>Head Office</h3>
                <div>
                    <li>
                        <i class="fa fa-map"></i>
                        <p>29, R.N. Das Road, Dhakuria Kolkata- 700031</p>
                    </li>

                    <li>
                        <i class="fa fa-envelope"></i>
                        <p>sannidhya.roy.chowdhury.98@gmail.com</p>
                    </li>

                    <li>
                        <i class="fa fa-mobile"></i>
                        <p>+91 85839 4929</p>
                    </li>

                    <li>
                        <i class="fa fa-clock-o"></i>
                        <p>10:00 - 18:00 Mon - Sat</p>
                    </li>
                </div>
            </div>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.889935881016!2d88.36991237416493!3d22.50831233532559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02712e2780e5af%3A0x508c2e1088f291f7!2s29%2C%20Rama%20Nath%20Das%20Rd%2C%20Dhakuria%2C%20Tanu%20Pukur%2C%20Garfa%2C%20Kolkata%2C%20West%20Bengal%20700031!5e0!3m2!1sen!2sin!4v1695658402707!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <!-- Newsletter -->

        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Sign Up For Newsletters</h4>
                <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
            </div>

            <div class="form">
                <input type="text" name="" id="" placeholder="Your email address">
                <button class="normal">Sign up</button>
            </div>
        </section>

        <!-- Brands -->

        <section id="brand" class="section-p1">
            <div class="row">
                <div class="col-md-2">
                    <div class="image">
                        <img src="assets/images/banner/brand-1.png" alt="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="image">
                        <img src="assets/images/banner/brand-2.png" alt="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="image">
                        <img src="assets/images/banner/brand-3.png" alt="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="image">
                        <img src="assets/images/banner/brand-4.png" alt="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="image">
                        <img src="assets/images/banner/brand-5.png" alt="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="image">
                        <img src="assets/images/banner/brand-6.png" alt="">
                    </div>
                </div>
            </div>
        </section>



    <?php include('assets/includes/footer.php'); ?>


    
    <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        autoplayTimeLeft(s, time, progress) {
          progressCircle.style.setProperty("--progress", 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
      }
    });
  </script>
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>