@extends('layouts.layout')
@section('content')
<!-- Contact Section Begin -->
<section class="contact spad">
        <div class="container">
            <div class="contact__text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h2>Contact</h2>
                            <div class="breadcrumb__option">
                                <a href="#">Home</a>
                                <span>Contact</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96748.5538666784!2d-74.25209557318462!3d40.73139236772185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25370329a0e1d%3A0xe1bcdc2adcfee473!2sNewark%2C%20NJ%2C%20USA!5e0!3m2!1sen!2sbd!4v1585643782289!5m2!1sen!2sbd"
                                height="350" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                        <div class="contact__widget">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>John Doe, 123 Main St Chicago, IL 60626</span>
                                </li>
                                <li>
                                    <i class="fa fa-mobile"></i>
                                    <span>Phone: 258-556-189</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>Email: info@greenorganic.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <div class="contact__form__title">
                                <h2>gET IN TOUCH</h2>
                                <p>My experience with Realy is absolutely positive. The themes are beautifully designed
                                    and well documented. Realy theme provides quick support.</p>
                            </div>
                            <form action="#">
                                <input type="text" placeholder="Name">
                                <input type="text" placeholder="Email">
                                <input type="text" placeholder="Website">
                                <textarea placeholder="Message"></textarea>
                                <button type="submit" class="site-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection