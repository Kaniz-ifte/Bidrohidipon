{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}

<div class="row">
    {{-- <div class="col-md-12">

         @if (Auth::guard('web')->check())
         <h1>
            I am Logged In as a <strong>USER</strong>
         </h1>
         @else
         <h1>
            I am Logged Out as a <strong>USER</strong>
         </h1>
         @endif



         @if (Auth::guard('admin')->check())
         <h1>
            I am Logged In as a <strong>ADMIN</strong>
         </h1>
         @else
         <h1>
            I am Logged Out as a <strong>ADMIN</strong>
         </h1>
         @endif

         @if(Auth::User()->getRoleNames())
            <h2>My role is {{Auth::User()->getRoleNames()}}</h2>
         @else
         <h2>I have no Role</h2>
         @endif

         <h2>My Permissions</h2>


         @foreach (Auth::User()->getAllPermissions() as $row)

              {{$row->name}}
              <br>

         @endforeach


    </div> --}}
    <div class="col-lg-6 col-xxl-4">
        @include('pages.widgets._widget-1', ['class' => 'card-stretch gutter-b'])
    </div>

    <div class="col-lg-6 col-xxl-4">
        @include('pages.widgets._widget-2', ['class' => 'card-stretch gutter-b'])
    </div>

    <div class="col-lg-6 col-xxl-4">
        @include('pages.widgets._widget-3', ['class' => 'card-stretch card-stretch-half gutter-b'])
        @include('pages.widgets._widget-4', ['class' => 'card-stretch card-stretch-half gutter-b'])
    </div>

    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
        @include('pages.widgets._widget-5', ['class' => 'card-stretch gutter-b'])
    </div>

    <div class="col-xxl-8 order-2 order-xxl-1">
        @include('pages.widgets._widget-6', ['class' => 'card-stretch gutter-b'])
    </div>

    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
        @include('pages.widgets._widget-7', ['class' => 'card-stretch gutter-b'])
    </div>

    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
        @include('pages.widgets._widget-8', ['class' => 'card-stretch gutter-b'])
    </div>

    <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">
        @include('pages.widgets._widget-9', ['class' => 'card-stretch gutter-b'])
    </div>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
