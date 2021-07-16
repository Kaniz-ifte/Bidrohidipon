{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{$info->title}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">{{$info->description}}</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{route($info->first_button_route)}}" class="btn btn-light-success font-weight-bolder mr-2">

                <i class="flaticon2-add"></i>

                {{$info->first_button_title}}
            </a>

            <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-light-warning font-weight-bold dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-file-export"></i> Export</a>
                <div class="dropdown-menu dropdown-menu-md py-5" style="">
                    <ul class="navi navi-hover">

                        <li class="navi-item">
                            <a class="navi-link" href="#">
                                <span class="navi-icon">
                                    <i class="fas fa-file-excel text-warning"></i>
                                </span>
                                <span class="navi-text">Xlsx</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a class="navi-link" href="#">
                                <span class="navi-icon">
                                    <i class="fas fa-file-csv text-success"></i>
                                </span>
                                <span class="navi-text">Csv</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a class="navi-link" href="#">
                                <span class="navi-icon">
                                    <i class="fas fa-file-pdf text-danger"></i>
                                </span>
                                <span class="navi-text">Pdf</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a class="navi-link" href="#">
                                <span class="navi-icon">
                                    <i class="fas fa-file-word text-primary"></i>
                                </span>
                                <span class="navi-text">Docs</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">

        @if ($data->count()>0)


        <div class="row">

             @foreach ($data as $row)

             <div class="col-xl-4 float-left">
                 <!--begin::Mixed Widget 16-->
                 <div class="card card-custom gutter-b card-stretch bg-light">

                     <div class="card-banner">
                         <img class="rounded-top" src="{{asset($row->banner)}}" alt="">

                     </div>
                     <!--begin::Header-->
                     <div class="card-header border-0 pt-5">
                         <div class="card-title font-weight-bold">
                             <div class="card-label">{{$row->title}}
                                 <div class="font-size-sm text-muted mt-2">
                                     @if ($row->is_active==1)

                                     <span class="label label-light-success label-inline">Active</span>
                                     @else
                                     <span class="label label-light-danger label-inline">Deactive</span>
                                     @endif
                                 </div>
                             </div>
                         </div>

                     </div>
                     <!--end::Header-->
                     <!--begin::Body-->
                     <div class="card-body d-flex flex-column" style="position: relative;">

                         <!--begin::Items-->
                         <div class="mt-10 mb-10">
                             <div class="row row-paddingless mb-10">

                                 <p> {{$row->description}} </p>

                             </div>

                         </div>
                         <!--end::Items-->

                         <div class="m-auto">

                              <a href="{{route('admin.subscriptions.show',$row->id)}}" class="btn btn-sm btn-icon btn-success">
                                  <i class="flaticon2-analytics-2"></i>
                              </a>
                              <a href="{{route('admin.subscriptions.edit',$row->id)}}" class="btn btn-sm btn-icon btn-warning">
                                  <i class="flaticon2-pen"></i>
                              </a>
                              <a onclick="Delete('{{route('admin.subscriptions.destroy',$row->id)}}')" class="btn btn-sm btn-icon btn-danger">
                                  <i class="flaticon2-trash"></i>
                              </a>

                         </div>

                     </div>
                     <!--end::Body-->
                 </div>
                 <!--end::Mixed Widget 16-->
             </div>

             @endforeach

        </div>

        {{ $data->appends(request()->input())->links('paginate.default') }}



        @else

        <div class="alert alert-custom alert-notice alert-light-success fade show mb-5 text-center" role="alert">
            <div class="alert-icon">
                <i class="flaticon-questions-circular-button"></i>
            </div>
            <div class="alert-text text-dark">
                No Data Found..!
                <a class="btn btn-success btn-sm ml-10" href="{{route($info->first_button_route)}}">
                    Add Now
                </a>
            </div>


        </div>


        @endif


    </div>
    <!--end::Body-->


</div>


<!-- Modal-->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form id="deleteForm" class="form" method="POST">
                @method('DELETE')
                @csrf


                <div class="modal-content">

                    <div class="modal-body">
                        <div class="delete-icon text-center mb-10 mt-5">
                            <div class="bg-gray-200 rounded-circle demo-square demo-square-lg m-auto">

                                <i class="flaticon2-trash icon-5x text-danger"></i>

                            </div>


                        </div>

                        <div class="modal-text text-center mb-10">

                            <h4 class="text-dark font-weight-bolder d-block mb-5"> You are about to delete an item!</h4>
                            <div class="text-muted font-weight-bold font-size-lg">
                                This will delete you item permanently.
                                <br>
                                Are you sure?
                            </div>

                        </div>



                        <div class="modal-bottom text-right">
                            <button type="button" class="btn btn-light-success font-weight-bold btn-sm mr-3 font-size-lg" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger font-weight-bold btn-sm mr-10 font-size-lg">Delete</button>
                        </div>


                    </div>


            </form>
        </div>

    </div>
</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    function Delete(route) {

        var form = document.getElementById('deleteForm');
        var attribute = document.createAttribute("action");
        attribute.value = route;
        form.setAttributeNode(attribute);

        $('#deleteModal').modal('show');
    }
</script>

@endsection
