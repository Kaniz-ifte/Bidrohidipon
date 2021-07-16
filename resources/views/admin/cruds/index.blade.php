{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

@if(session()->has('success'))

    <div id="alert-success" class="alert alert-custom alert-light-success d-inline-flex px-10 py-3 shadow-lg" role="alert" style="position: fixed;top: 64px;left: 650px;z-index: 9999;">
        <div class="alert-icon"><i class="far fa-check-circle"></i></div>
        <div class="alert-text">{{ session()->get('success') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>

    @section('scripts')

    <script type="text/javascript">
        $("#alert-success").delay(4000).fadeOut(500, function() {
            $(this).alert('close');
        });
    </script>
    @parent

    @endsection

    @endif

    @if(session()->has('fail'))

        <div id="alert-fail" class="alert alert-custom alert-light-danger d-inline-flex px-10 py-1 shadow-lg" role="alert" style="position: fixed;top: 64px;left: 650px;z-index: 9999;">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{ session()->get('fail') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>

        @section('scripts')

        <script type="text/javascript">
            $("#alert-fail").delay(4000).fadeOut(500, function() {
                $(this).alert('close');
            });
        </script>
        @parent

        @endsection

        @endif

    @if(session()->has('warning'))

        <div id="alert-warning" class="alert alert-custom alert-light-warning d-inline-flex px-10 py-1 shadow-lg" role="alert" style="position: fixed;top: 64px;left: 650px;z-index: 9999;">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{ session()->get('warning') }}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>

        @section('scripts')

        <script type="text/javascript">
            $("#alert-warning").delay(4000).fadeOut(500, function() {
                $(this).alert('close');
            });
        </script>
        @parent

        @endsection

        @endif

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
                                    <a class="navi-link" onclick="Export('xlsx')">
                                        <span class="navi-icon">
                                            <i class="fas fa-file-excel text-warning"></i>
                                        </span>
                                        <span class="navi-text">Xlsx</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a class="navi-link" onclick="Export('csv')">
                                        <span class="navi-icon">
                                            <i class="fas fa-file-csv text-success"></i>
                                        </span>
                                        <span class="navi-text">Csv</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a class="navi-link" onclick="Export('pdf')">
                                        <span class="navi-icon">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                        </span>
                                        <span class="navi-text">Pdf</span>
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

                <div class="form-group row">
                    <label class="col-lg-4"></label>
                    <div class="input-group col-lg-4">
                        <input type="text" id="search" value="{{isset($info->search) ? $info->search : '' }}" class="form-control" placeholder="Search for..." onsubmit="Search()">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="Search()">Search!</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card card-custom gutter-b">
            <div class="card-header border-0 py-5">
            </div>
            <div class="card-body pt-0 pb-3">

                @if ($data->count()>0)

                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                        <thead>
                            <tr class="bg-gray-100 text-left">

                                @foreach ($info->table_columns as $column)

                                <th>
                                    {{$column['title']}}
                                </th>

                                @endforeach


                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $serial=1;
                            $serial=$data->firstItem();
                            @endphp

                            @foreach ($data as $row)



                            <tr>
                                @foreach ($info->table_columns as $column)

                                @if (isset($column['design']) && $column['design']!="")


                                @include('admin.cruds.column.column_'.$column['design'])

                                @endif




                                @endforeach

                            </tr>

                            @php
                            $serial++;
                            @endphp

                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!--end::Table-->

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

            function Search() {

                var search = document.getElementById('search').value;

                var url = window.location.pathname + '?search=' + search;
                console.log(url);
                window.location.replace(url);

            }

            function Export(format) {
                var url = window.location.pathname + '?export=' + format;
                window.location.replace(url);

            }
        </script>

        @parent

        @endsection
