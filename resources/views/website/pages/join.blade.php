@extends('website.layout.app')

@section('content')


  <section class="page-header bg--cover" style="background-image: url(assets/images/header/bg.jpg);">
        <div class="container">
            <div class="page-header__content text-center">
                <h2 class="text-uppercase">Contact Us</h2>
                <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


      <section class="contact padding-top padding-bottom">
        <div class="container">
            <div class="section-header">
                <div class="section-header__content">
                    <h3>Join the Community</h3>
                    <p>We're Always Eaer To Hear From You!</p>
                </div>
            </div>
            <div class="contact__wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form action="{{ url('register') }}"  method="POST" class="form">
                         @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Your Name*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Your Email*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="phone_number" placeholder="Your Number*" required>
                                </div>
                                 <div class="col-md-6">
                                    <input type="text" name="citizenship" placeholder="Your Citizenship Number*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="occupation" placeholder="Your Occuptation Number*" required>
                                </div>
                                
                               
                                <div class="col-md-6">
                                    <select type="select" placeholder="Gotra*" required> 
                                      <option>Gotra*</option>   
                                      <option>Hello</option>   
                                      <option>Hello</option>    
                                    </select>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="default-btn"><span>Join Now</span></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection