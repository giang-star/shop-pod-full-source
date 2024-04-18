
@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('body')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner" style="    text-align: center;
            padding: 20px;">
              <h3>{{ $sum }}</h3>
    
              <p>Tổng số lượng đơn hàng</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner" style="    text-align: center;
            padding: 20px;">
              <h3>{{ number_format($total) }}đ</h3>
    
              <p>Tổng doanh thu</p>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection