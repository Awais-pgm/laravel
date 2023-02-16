<section class="slider_section ">
    <div class="slider_bg_box">
        <img src="home/images/slider-bg.jpg" alt="">
    </div>
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>
                                    <span>
                                        {{$slider->heading1}}
                                    </span>
                                    <br>
                                    
                                </h1>
                                <p>
                                    {{$slider->detail1}}
                                </p>
                                <div class="btn-box">
                                    <a href="/showAllProducts" class="btn1">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>
                                    <span>
                                        {{$slider->heading2}}
                                    </span>
                                </h1>
                                <p>
                                    {{$slider->detail2}}
                                </p>
                                <div class="btn-box">
                                    <a href="/showAllProducts" class="btn1">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>
                                    <span>
                                        {{$slider->heading3}}
                                    </span>
                                </h1>
                                <p>
                                    {{$slider->detail3}}
                                </p>
                                <div class="btn-box">
                                    <a href="/showAllProducts" class="btn1">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>
</section>
