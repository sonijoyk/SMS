@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
            <div class="d-none d-md-block main-nav-links">
              <ul class="nav nav-pills nav-fill form-tabs" role="tablist">
                <li class="nav-item">
                    <a class="main-link nav-link active orders" data-toggle="tab" href="#orders" role="tab">
                        <span>New Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="main-link nav-link picked_orders" data-toggle="tab" href="#picked_orders" role="tab">
                        <span>Picked Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="main-link nav-link my_orders" data-toggle="tab" href="#my_orders" role="tab">
                        <span>Delivered Orders</span>
                    </a>
                </li>
              </ul>
            </div>
            <div class="d-none d-md-block">
              <div class="tab-content mt-2">
           
              </div>                     
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection