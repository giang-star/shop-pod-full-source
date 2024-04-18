@extends('admin.layout.master')
@section('title', 'User')
@section('body')

                <!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    User
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                    <form method="post" action="/admin/user/{{$user->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="position-relative row form-group">
                                            <label for="image"
                                                class="col-md-3 text-md-center col-form-label">Avatar</label>
                                            <div class="col-md-9 col-xl-8">
                                                <img style="height: 200px; cursor: pointer;"
                                                    class="thumbnail rounded-circle" data-toggle="tooltip"
                                                    title="Click to change the image" data-placement="bottom"
                                                    src="front/img/user/{{$user->avatar ?? '_default-user.png'}}" alt="Avatar">
                                                <input name="image" type="file" onchange="changeImg(this)"
                                                    class="image form-control-file" style="display: none;" value="{{$user->avatar}}">
                                                <input type="hidden" name="image_old" value="">
                                                <small class="form-text text-muted">
                                                    Click on the image to change (required)
                                                </small>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-center col-form-label">First Name</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="first_name" id="first_name" placeholder="First Name" type="text"
                                                    class="form-control" value="{{$user->first_name}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="last_name" class="col-md-3 text-md-center col-form-label">Last Name</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="last_name" id="last_name" placeholder="Last Name" type="text"
                                                    class="form-control" value="{{$user->last_name}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="email"
                                                class="col-md-3 text-md-center col-form-label">Email</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="email" id="email" placeholder="Email" type="email"
                                                    class="form-control" value="{{$user->email}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password"
                                                class="col-md-3 text-md-center col-form-label">Password</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password" id="password" placeholder="Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="password_confirmation"
                                                class="col-md-3 text-md-center col-form-label">Confirm Password</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password"
                                                    class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="country"
                                                class="col-md-3 text-md-center col-form-label">Country</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="country" id="country" placeholder="Country"
                                                    type="text" class="form-control" value="{{$user->country}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="street_address" class="col-md-3 text-md-center col-form-label">
                                                Street Address
                                            </label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="street_address" id="street_address"
                                                    placeholder="Street Address" type="text" class="form-control"
                                                    value="{{$user->street_address}}">
                                            </div>
                                        </div>


                                        <div class="position-relative row form-group">
                                            <label for="town_city" class="col-md-3 text-md-center col-form-label">
                                                Town City
                                            </label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="town_city" id="town_city" placeholder="Town City"
                                                    type="text" class="form-control" value="{{$user->town_city}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="phone"
                                                class="col-md-3 text-md-center col-form-label">Phone</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="phone" id="phone" placeholder="Phone" type="tel"
                                                    class="form-control" value="{{$user->phone}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="level"
                                                class="col-md-3 text-md-center col-form-label">Level</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="level" id="level" class="form-control">
                                                    <option value=1 {{$user->level == '1' ? 'selected' : ''}}>
                                                        Admin
                                                    </option>
                                                    <option value=2 {{$user->level == '2' ? 'selected' : ''}}>
                                                        Client
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="description"
                                                   class="col-md-3 text-md-center col-form-label">Description</label>
                                            <div class="col-md-9 col-xl-8">
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="./admin/user" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Cancel</span>
                                                </a>

                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Save</span>
                                                </button>
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