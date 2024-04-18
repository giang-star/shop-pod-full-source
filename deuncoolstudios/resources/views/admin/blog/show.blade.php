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

                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a href="./admin/blog/{{$blog->id}}/edit" class="nav-link">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-edit fa-w-20"></i>
                                </span>
                                <span>Edit</span>
                            </a>
                        </li>

                        <li class="nav-item delete">
                            <form action="./admin/blog/{{$blog->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="nav-link btn" type="submit"
                                    onclick="return confirm('Do you really want to delete this item?')">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body display_data">
                                    <div class="position-relative row form-group">
                                        <label for="image" class="col-md-3 text-md-center col-form-label">Image</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>
                                                <img style="height: 200px;" class="" data-toggle="tooltip"
                                                    title="Image" data-placement="bottom"
                                                    src="front/img/blog/{{$blog->image ?? '_default-user.png'}}" alt="Image">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-md-3 text-md-center col-form-label">
                                            Title
                                        </label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$blog->title}}</p>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="category" class="col-md-3 text-md-center col-form-label">
                                            Category
                                        </label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$blog->category}}</p>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="description"
                                            class="col-md-3 text-md-center col-form-label">Content</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$blog->content}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection