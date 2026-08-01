<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
 <section id="contact-section">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">

               <h2 class="stitle">التواصل <span>معنا</span></h2>
               <div class="sline"></div>
               <p class="sdesc mx-auto" style="max-width:480px;">
            هل لديك سؤال، ملاحظة، أو ترغب في الاستفسار عن منتجاتنا؟ يسعدنا أن نسمع منك.</p>
            </div>
            <div class="row g-4">
               <div class="col-lg-4" data-aos="fade-right">
                  <div class="ctdark">
                     <h4>Let's Talk</h4>
                     <p class="ctsub">We typically respond within 2 hours during business hours.</p>
                     <div class="ctitem">
                        <div class="cticon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="ctinfo"><strong>Address</strong><span>42 Flavor Street, Manhattan,<br/>New York, NY 10001</span></div>
                     </div>
                     <div class="ctitem">
                        <div class="cticon"><i class="fas fa-phone-alt"></i></div>
                        <div class="ctinfo"><strong>Phone</strong><span>+1 (800) 123-4567</span></div>
                     </div>
                     <div class="ctitem">
                        <div class="cticon"><i class="fas fa-envelope"></i></div>
                        <div class="ctinfo"><strong>Email</strong><span>hello@sarabfood.com</span></div>
                     </div>
                     <div class="ctitem">
                        <div class="cticon"><i class="fas fa-clock"></i></div>
                        <div class="ctinfo"><strong>Working Hours</strong><span>Wed - Sun: 9 AM - 11 PM</span></div>
                     </div>
                     <div class="ctsocrow">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8" data-aos="fade-left">
                  <div class="fcard">
                     <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="flbl">اسمك *</label>
                            <input type="text" class="fctrl" />
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">البريد الالكتروني *</label>
                            <input type="email" class="fctrl" placeholder="you@email.com"/>
                        </div>
                        <div class="col-sm-6">
                            <label class="flbl">رقم الهاتف</label>
                            <input type="tel" class="fctrl" placeholder="+"/>
                        </div>

                        <div class="col-12">
                            <label class="flbl">الرسال *</label>
                            <textarea class="fctrl" rows="5" placeholder="Write your message here...">
                            </textarea>
                        </div>
                        <div class="col-12"><button class="btn-red" id="ctcBtn"><i class="fas fa-paper-plane"></i>ارسال</button></div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </section>
</div>
