<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrp py-2 mr-3">

        <a href="{{$paginator->url(1)}}" class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} btn btn-icon btn-sm btn-light-success mr-2 my-1"><i class="ki ki-bold-double-arrow-back icon-xs"></i></a>
        <a href="{{ $paginator->url($paginator->currentPage()-1) }}" class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} btn btn-icon btn-sm btn-light-success mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>



        @php
        $middle_links=5;
        $links_centers_both_side=(int) round(($middle_links-1)/2);
        $left_dot_count=0;
        $middle_row_count=0;
        $right_dot_count=0;
        @endphp



        @for ($i = 1; $i <= $paginator->lastPage(); $i++)

            @if ($i<=2) <a href="{{ $paginator->url($i) }}" class="btn btn-icon btn-sm border-0 btn-hover-success mr-2 my-1 {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>

                @elseif ($i+2>$paginator->lastPage())

                @if (($paginator->currentPage()+2+$links_centers_both_side)<$paginator->lastPage())

                    @if ($right_dot_count
                    <1) @php
                    $right_dot_count++;
                    @endphp

                    <div class="btn btn-icon btn-sm border-0 btn-hover-success mr-2 my-1 disabled">...</div>

                    @endif

                    @endif

                    <a href="{{ $paginator->url($i) }}" class="btn btn-icon btn-sm border-0 btn-hover-success mr-2 my-1 {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>





                    @else



                    @if (($paginator->currentPage()-(2+$links_centers_both_side))>1)

                    @if ($left_dot_count
                    <1) @php
                    $left_dot_count++;
                    @endphp

                    <div class="btn btn-icon btn-sm border-0 btn-hover-success mr-2 my-1 disabled">...</div>

                    @endif

                    @endif

                    @if ($middle_row_count
                    <$middle_links) @if (($paginator->currentPage()+2+$links_centers_both_side)-$paginator->lastPage()>=0)

                    @php
                    $start_from=$paginator->lastPage()-(2+$middle_links-1);
                    @endphp



                    @else

                    @php
                    $start_from=$paginator->currentPage()-$links_centers_both_side
                    @endphp

                    @endif





                    @if ($i>=$start_from)

                    @php
                    $middle_row_count++;
                    @endphp

                    <a href="{{ $paginator->url($i) }}" class="btn btn-icon btn-sm border-0 btn-hover-success mr-2 my-1 {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>

                    @endif

                    @endif

                    @endif


                    @endfor



                    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} btn btn-icon btn-sm btn-light-success mr-2 my-1"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} btn btn-icon btn-sm btn-light-success mr-2 my-1"><i class="ki ki-bold-double-arrow-next icon-xs"></i></a>
    </div>
    <div class="d-flex align-items-center py-3">
        {{-- <div class="d-flex align-items-center">
            <div class="mr-2 text-muted">Loading...</div>
            <div class="spinner spinner-success mr-10"></div>
        </div> --}}

        <form class="form-inline" id="form_perpage" method="GET" action="{{url()->current()}}">

            <select name="perPage" onchange="event.preventDefault(); document.getElementById('form_perpage').submit();" class="form-control form-control-sm text-success font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                <option value="10" {{$paginator->perPage()==10 ? "selected" : ""}}>10</option>
                <option value="20" {{$paginator->perPage()==20 ? "selected" : ""}} {{$paginator->perPage()=="" ? "selected" : ""}}>20</option>
                <option value="30" {{$paginator->perPage()==30 ? "selected" : ""}}>30</option>
                <option value="50" {{$paginator->perPage()==50 ? "selected" : ""}}>50</option>
                <option value="100" {{$paginator->perPage()==100 ? "selected" : ""}}>100</option>
            </select>
        </form>

        <span class="text-muted">Displaying <span class="label label-lg label-inline label-success">{{$paginator->firstItem()}}</span> - <span class="label label-lg label-inline label-success">{{$paginator->lastItem()}}</span>
            of <span class="label label-lg label-inline label-light-success">{{$paginator->total()}}</span> records</span>
    </div>
</div>
