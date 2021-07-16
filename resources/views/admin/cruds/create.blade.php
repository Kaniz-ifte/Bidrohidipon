{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">{{$info->title}}</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <a href="{{route($info->first_button_route)}}" class="btn btn-light-warning font-weight-bolder mr-2">

                            <i class="flaticon2-list"></i>

                            {{$info->first_button_title}}
                        </a>
                    </div>
                </div>
            </div>
            <form class="form" action="{{route($info->form_route)}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="card-body">
                    <div class="form-group row">

                        @php
                        $count=0;
                        @endphp

                        @foreach ($info->form_inputs as $input)
                        @php
                        $count++;
                        @endphp

                        @if (isset($input['design']) && $input['design']!="")


                        @include('admin.cruds.input.input_'.$input['design'])

                        @endif

                        @if ($count%2==0)
                    </div>
                    <div class="form-group row">

                        @endif

                        @endforeach



                    </div>





                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>

@endsection

@section('styles')

@parent

@endsection

@section('scripts')

@parent

@endsection
