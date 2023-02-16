@extends('home.app')

@section('content')
    <!--Section: Contact v.2-->
    <div class="container">
        <section class="mb-4">
            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center text-danger my-4">Contact us</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5 w-75">Do you have any questions? Please do not hesitate to
                contact us
                directly. Our team will come back to you within
                a matter of hours to help you.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="save/contact/us" method="POST">
                        @csrf
                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Your name</label>
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Your email</label>
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Subject</label>
                                </div>
                                @error('subject')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Your message</label>
                                </div>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!--Grid row-->
                        <div class="text-center text-md-left">
                            <button class="btn btn-danger text-light">Send</button>
                        </div>
                </div>
                </form>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x text-danger"></i>
                            <p>Basti Roshan Din, P/O chak nadir shah, Rabnawaz Pura, Bahawalnagar.</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x text-danger"></i>
                            <p>+92 300 792 6926</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x text-danger"></i>
                            <p>awaistayyab27@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
    </div>
    <!--Section: Contact v.2-->
@endsection
