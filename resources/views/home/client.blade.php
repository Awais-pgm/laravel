<section class="client_section">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Team
            </h2>
        </div>
        <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $class = 'active';
                @endphp
                @foreach ($testimonials as $testimonial)
                    <div class="carousel-item {{ $class }}">
                        <div class="box col-lg-10 mx-auto">
                            <div class="img_container">
                                <div class="img-box">
                                    <div class="img_box-inner">
                                        <img src="testimonial-images/{{ $testimonial->image }}"
                                            alt="{{ $testimonial->image }}">
                                    </div>
                                </div>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $testimonial->name }}
                                </h5>
                                <h6>
                                    {{ $testimonial->designation }}
                                </h6>
                                <p>
                                    {{ $testimonial->detail }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @php
                        $class = '';
                    @endphp
                @endforeach
            </div>
            <div class="carousel_btn_box">
                <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>
