<?php !defined('kontrol') ? die('Sayfaya bu şekilde ulaşamazsın!') : null ; ?>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('uploads/eskisehir-01.jpeg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Mustafa Akgül Özgür Yazılım Kış Kampı</h3>
            <p>Eskişehir 2020</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('uploads/eskisehir-02.jpeg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Eskişehir 2020</h3>
            <p>PHP ve MySQL ile Web Programlamaya Giriş Sınıfı</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('uploads/eskisehir-03.jpeg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Nuri AKMAN - Hasan ÇİÇEK</h3>
            <p>Hocalarımız</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>