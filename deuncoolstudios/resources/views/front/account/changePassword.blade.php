@extends('front.layout.master')
@section('title', 'Change Password')
@section('body')
                <!-- Main -->
                <div class="app-main__inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="p-0 m-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session('notification'))
                                    <div class="alert alert alert-success">{{session('notification')}}</div>
                                    @endif
                                    <form method="post" action="/account/changePassword" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="position-relative row form-group">
                                            <label for="password"
                                                class="col-md-3 text-md-center col-form-label">Mật khẩu cũ</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="old_password" id="old_password" placeholder="Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="password"
                                                class="col-md-3 text-md-center col-form-label">Mật khẩu mới</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password" id="password" placeholder="New Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password_confirmation"
                                                class="col-md-3 text-md-center col-form-label">Nhập lại mật khẩu mới</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="container">
                                                <div class="row" style="justify-content: space-around;">

                                                    <a href="./account/manage" class="border-0 btn btn-danger mr-1">
                                                        <span>Hủy</span>
                                                    </a>
    
                                                    <button type="submit"
                                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                                            <i class="fa fa-download fa-w-20"></i>
                                                        </span>
                                                        <span>Đổi mật khẩu</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection