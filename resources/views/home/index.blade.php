
<!DOCTYPE html>
<html lang="ar" dir="rtl">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Sarab">
      <meta name="description" content="Sarab - Fast Food & Restaurant HTML Template">
      <title>Sarab - Fast Food & Restaurant HTML Template</title>

      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet"/>
      <!-- Bootstrap 5.3 -->
      <!-- <link href="home/css/bootstrap.min.css" rel="stylesheet"/> -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <!-- AOS Animate on Scroll -->
      <link href="{{ asset('home/css/aos.css') }}" rel="stylesheet"/>
      <!-- Swiper -->
      <link href="{{ asset('home/css/swiper-bundle.min.cs') }}s" rel="stylesheet"/>
      <!-- all min css -->
      <link rel="stylesheet" href="{{ asset('home/css/all.min.css') }}"/>
      <!-- magnific CSS -->
      <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}"/>
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" />
      <!-- Scripts -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
@livewireStyles

   </head>
   <body>

      <!-- ============================================================
         NAVBAR
         ============================================================ -->
   @livewire("home.nav")
      <!--  -->
     <!-- SPECIAL OFFER -->
      <!-- <section id="special">
         <div class="spbg"></div>
         <div class="container" style="position:relative;z-index:2;">
            <div class="row align-items-center g-5">
               <div class="col-lg-6" data-aos="fade-right">
                  <div class="sptag"><i class="fas fa-bolt me-1"></i>Limited Time Offer</div>
                  <h2 class="sptitle">Get 30% Off<br/>Our Signature<br/><span>Burger</span> Meal</h2>
                  <p class="spdesc">Don't miss our weekend special - grab our award-winning signature burger combo with loaded fries and a premium shake at an unbeatable price.</p>
                  <div class="cdwrap">
                     <div class="cditem"><span class="cdnum" id="cdH">08</span><span class="cdlbl">Hours</span></div>
                     <div class="cditem"><span class="cdnum" id="cdM">45</span><span class="cdlbl">Minutes</span></div>
                     <div class="cditem"><span class="cdnum" id="cdS">30</span><span class="cdlbl">Seconds</span></div>
                  </div>
                  <a href="#menu" class="btn-red"><i class="fas fa-shopping-cart"></i>Grab the Deal</a>
               </div>
               <div class="col-lg-6" data-aos="fade-left">
                  <div class="spimgw">
                     <div class="spglow"></div>
                     <div class="sppbdg"><span class="old">$24.99</span><span class="np">$17.49</span></div>
                     <img src="img/off-img.jpg" alt="Special Burger"/>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
      <!-- ============================================================
         HERO
         ============================================================ -->
      <section id="hero">
         <div class="container">
            <div class="row align-items-center g-5" style="min-height:88vh;">
               <div class="col-lg-6">

                  <h1 class="htitle">الحصري  <span class="hl">للعسل الطبيعي</span><br/>14 سنة من <br> الثقة و الجودة</h1>
                  <p class="hdesc">
                    اجود انواع العسل لبلدي و المستورد بالاضافة الى منتجات
                  </p>
                  <div class="d-flex flex-wrap gap-3 mb-2">
                     <a href="#menu" class="btn-red"><i class="fas fa-utensils"></i>تصفح منتجاتنا</a>
                     <!-- FIX 2: Magnific popup video trigger -->
					 <!-- <a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup btn-play popup-youtube">
						<div class="pico"><i class="fas fa-play"></i></div>
						<span>Watch Our Story</span>
					 </a> -->
                  </div>

               </div>
               <div class="col-lg-6">
                  <div style="position:relative;text-align:center;">
                     <div class="hcircle">
                        <img src="home/img/sa3id.jpeg" alt="Burger"/>
                     </div>



                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- CATEGORY -->
    <!-- @livewire('home.categories') -->

      <!-- ============================================================
         MENU � FIX 3 (filter works) + FIX 4 (plus opens popup)
         ============================================================ -->
     @livewire('home.menu')

      <!-- ============================================================
         FIX 6 � CONTACT FORM
         ============================================================ -->
     <!-- @livewire('home.contact') -->

      <!-- FOOTER -->
      @livewire('home.footer')
      <!-- Floating cart -->
      <!-- <div class="cartfl"><i class="fas fa-shopping-cart"></i><span>My Cart</span><div class="ccount" id="cartCount">0</div></div> -->
      <!-- Back to top -->
      <button id="btt" onclick="window.scrollTo({top:0,behavior:'smooth'})"><i class="fas fa-chevron-up"></i></button>
   @livewireScripts
	<!-- jQuery -->

      <script src="home/js/jquery-3.7.1.min.js"></script>
      <!-- Bootstrap 5 -->
      <script src="home/js/bootstrap.bundle.min.js"></script>
       <!-- <script src="https://cdn
       .jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx
       9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
      <!-- AOS -->
      <script src="home/js/aos.js"></script>
      <!-- Swiper -->
      <script src="home/js/swiper-bundle.min.js"></script>
      <!-- CounterUp -->
      <script src="home/js/jquery.magnific-popup.min.js"></script>
      <!-- Main js -->
      <script src="home/js/main.js"></script>

   </body>
</html>
