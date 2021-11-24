@extends('layouts.main')

@section('content')

<div class="map-section">
  <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6615.06801746328!2d25.66479397835557!3d-34.004501228325736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e6532ceb52c38f9%3A0xc4589f8b1c092372!2sNelson%20Mandela%20University!5e0!3m2!1sen!2sza!4v1628002083591!5m2!1sen!2sza" frameborder="0" allowfullscreen></iframe>
</div>

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>5 Smart Street<br>Sydenham, Port Elizabeth 6001</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>s219292213@mandela.ac.za<br>s215259041@mandela.ac.za</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+27 41 5548 851<br>+27 41 2247 514</p>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group position-relative has-icon-left">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
              </div>
              </div>
              <div class="col-md-6 form-group position-relative has-icon-left mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
              </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection