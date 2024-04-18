@extends('admin.layout.master')
@section('title', 'Product Rating')
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
                                    Product Rating
                                    <div class="page-title-subheading">
                                        View, delete and manage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr class="header-table">
                                                <th class="pl-4">Product Name</th>
                                                <th>Rating</th>
                                                <th>User</th>
                                                <th>Messages</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productComments as $rating)
                                                <tr>
                                                    <td class="pl-4 text-muted">{{$product->name}}</td>
                                                    <td class="">{{$rating->rating}}</td>
                                                    <td class="">{{$rating->name}}</td>
                                                    <td class="">{{$rating->messages}}</td>
                                                    <td class="text-center">
                                                        <form class="d-inline" action="admin/product/{{$product->id}}/rating/{{$rating->id}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                                type="submit" data-toggle="tooltip" title="Delete"
                                                                data-placement="bottom"
                                                                onclick="return confirm('Do you really want to delete this item?')">
                                                                <span class="btn-icon-wrapper opacity-8">
                                                                    <i class="fa fa-trash fa-w-20"></i>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->

@endsection