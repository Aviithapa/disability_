
@extends('website.layout.app')

@section('content')
   

    <!-- ================> Page header start here <================== -->
    <section class="page-header bg--cover" style="background-image: url('{{ asset('assets/images/disability.jpeg') }}');">
        <div class="container">
            <div class="page-header__content text-center">
                <h2 class="text-uppercase">Sign In</h2>
                <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ================> Page header end here <================== -->




    <!-- ==========signin Section start Here========== -->
    <div class="account padding-top padding-bottom">
        <div class=" container">
            <div class="row g-5 align-items-center flex-md-row-reverse">
                <div class="col-lg-5">
                    <div class="account__wrapper">
                        <h3 class="title">Sign In</h3>
                       <form action="{{ url('/login') }}" method="POST">
                            <div class="form-floating mb-4">
                                <input type="email" name="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password"  class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <div class="checkgroup">
                                        {{-- <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember Me</label> --}}
                                    </div>
                                    {{-- <a href="forgot-pass.html">Forgot Password?</a> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="d-block default-btn move-top"><span>Signin Now</span></button>
                            </div>
                        </form>
                        <div class="account-bottom">
                            {{-- <p class="d-block cate pt-10">Don’t Have any Account? <a href="signup.html"> Sign
                                    Up</a></p> --}}

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="account-img">
                        <img src="{{  asset('assets/images/disability-login.jpeg') }}" alt="shape-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========signin Section ends Here========== -->

@endsection