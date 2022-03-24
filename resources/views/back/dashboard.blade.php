@extends('layouts.back')
@section('title','Dashboard | Form Pembelian Urgent')

@section('content')
<div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $daily_request->count() }}</h3>
                <p>Daily Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $monthly_request->count() }}</h3>
                <p>Monthly Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $yearly_request->count() }}</h3>
                <p>Yearly Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
        </div>
@endsection
