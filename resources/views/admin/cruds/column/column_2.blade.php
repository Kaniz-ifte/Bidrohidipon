<td>

    @if (isset($column['show-route']))


    <a href="{{route($column['show-route'],$row->id)}}" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success">
        <i class="flaticon2-analytics-2"></i>
    </a>

    @endif


    @if (isset($column['edit-route']))


    <a href="{{route($column['edit-route'],$row->id)}}" class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning">
        <i class="flaticon2-pen"></i>
    </a>

    @endif

    @if (isset($column['destroy-route']))


    <a onclick="Delete('{{route($column['destroy-route'],$row->id)}}')" class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger">
        <i class="flaticon2-trash"></i>
    </a>

    @endif


</td>
