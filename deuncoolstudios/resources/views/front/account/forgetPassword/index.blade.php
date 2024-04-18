@extends('front/layout.master')


@section('title', 'Reset Password')
    

@section('body')

        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Trang chủ</a>
                            <span>Quên mật khẩu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section End -->

        <!-- Registry Section Begin -->
    
        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4" style="box-shadow: 1px 1px 10px rgba(0 0 0 /.7);">
                        <div class="login-form">
                            <h2 class="mt-2">Quên mật khẩu</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="p-0 m-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('notification'))
                                <h6 class="alert alert-warning" role="alert">
                                    {{ session('notification') }}
                                </h6>
                            @endif
                            @if (session('success'))
                            <h6 class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </h6>
                            @endif
                            <form action="" method="post">
                                @csrf
                                <div class="group-input">
                                    <label for="email">Địa chỉ email *</label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <button type="submit" class="site-btn login-btn mb-5">Gửi yêu cầu lấy lại mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registry Section End -->

        <!-- Partner Logo Section Begin -->
    
    @endsection