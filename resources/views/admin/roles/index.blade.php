@extends('layout.default')


@section('content')

<!--begin::Accordion-->
<div class="accordion accordion-solid accordion-panel accordion-svg-toggle mb-10" id="faq">

    @php
    $serial=0;
    @endphp


    @foreach ($roles as $row)
    @php
    $serial++;

    @endphp

    <!--begin::Item-->
    <div class="card p-6">
        <!--begin::Header-->
        <div class="card-header" id="roleHeading{{$serial}}">
            <div class="card-title font-size-h4 text-dark @if($serial==1) @else collapsed @endif" data-toggle="collapse" data-target="#role{{$serial}}" aria-expanded="
            @if($serial==1) true
            @else false
            @endif" aria-controls="role{{$serial}}" role="button">
            <div class="card-label">

                <div class="d-flex align-items-center">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                             fill="#000000"></path>
                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Text-->
                    <div class="d-flex flex-column font-weight-bold">
                        <div class="text-dark text-hover-primary mb-1">
                            {{$row->name}}</div>
                        <span class="text-muted font-size-sm">Guard: <strong>{{$row->guard_name}}</strong></span>
                    </div>
                    <!--end::Text-->
                </div>


            </div>
            <span class="svg-icon svg-icon-primary">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                             fill="#000000" fill-rule="nonzero" />
                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                             fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div id="role{{$serial}}" class="collapse @if($serial==1) show @endif" aria-labelledby="roleHeading{{$serial}}" data-parent="#faq">
    <div class="card-body pt-3 font-size-h6 font-weight-normal text-dark-50">

        <div class="form-group row mt-5">

            <div class="col-4">
                <label class="col-form-label font-weight-bold font-size-lg" for="">
                    Permission
                </label>
            </div>

            <div class="col-2">
                <label class="col-form-label font-weight-bold font-size-lg" for="">
                    View
                </label>
            </div>

            <div class="col-2">
                <label class="col-form-label font-weight-bold font-size-lg" for="">
                    Create
                </label>
            </div>
            <div class="col-2">
                <label class="col-form-label font-weight-bold font-size-lg" for="">
                    Update
                </label>
            </div>
            <div class="col-2">
                <label class="col-form-label font-weight-bold font-size-lg" for="">
                    Delete
                </label>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form" action="{{route('admin.roles.update',$row->id)}}" method="post" enctype="multipart/form-data">
             @method('PUT')
             @csrf
             <input type="hidden" name="guard_name" value="{{$row->guard_name}}">
            @php
            $base_permissions=array();
            $get_permissions=PermissionsByRole($row->id);
            @endphp

            @foreach ($permissions[$row->guard_name] as $row)

            @php
            $base_permission = substr($row->name,0,strrpos($row->name, '-', -1));
            @endphp

            @if (in_array($base_permission, $base_permissions))

            @else
            @php

            array_push($base_permissions,$base_permission);

            @endphp

            <div class="form-group row">
                <div class="col-4">
                    <label class="col-form-label font-size-lg text-capitalize" for="">
                        {{str_replace('-',' ',$base_permission)}}
                    </label>
                </div>

                <div class="col-2">
                    <span class="switch switch-outline switch-icon switch-primary">

                        <label>
                             <input type="hidden" value="0" name="{{$base_permission.'-view'}}">
                            <input type="checkbox" value="1" @if(in_array($base_permission.'-view',array_column($get_permissions, 'name'))) checked="checked" @endif name="{{$base_permission.'-view'}}"/>
                            <span></span>
                        </label>
                    </span>
                </div>

                <div class="col-2">
                    <span class="switch switch-outline switch-icon switch-success">
                        <label>
                             <input type="hidden" value="0" name="{{$base_permission.'-create'}}">
                            <input type="checkbox" value="1" @if(in_array($base_permission.'-create',array_column($get_permissions, 'name'))) checked="checked" @endif name="{{$base_permission.'-create'}}" />
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-2">
                    <span class="switch switch-outline switch-icon switch-warning">
                        <label>
                             <input type="hidden" value="0" name="{{$base_permission.'-update'}}">
                            <input type="checkbox" value="1" @if(in_array($base_permission.'-update',array_column($get_permissions, 'name'))) checked="checked" @endif name="{{$base_permission.'-update'}}" />
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-2">
                    <span class="switch switch-outline switch-icon switch-danger">
                        <label>
                             <input type="hidden" value="0" name="{{$base_permission.'-delete'}}">
                            <input type="checkbox" value="1" @if(in_array($base_permission.'-delete',array_column($get_permissions, 'name'))) checked="checked" @endif name="{{$base_permission.'-delete'}}" />
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>


            @endif

            @endforeach

            <div class="row">
                 <div class="col-10"></div>
                 <div class="col-2 mt-5">
                    <button type="submit" class="btn btn-success mr-2">Update</button>
                 </div>
            </div>


        </form>
        <!--end::Form-->

    </div>

</div>
<!--end::Body-->
</div>

@endforeach

</div>
<!--end::Accordion-->

@endsection
