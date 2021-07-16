<td>
   <span class="text-dark-75 font-weight-bold d-block font-size-lg">{{$row->{$column['index']} }}</span>
   <span class="text-muted font-weight-bold">@if ($row->{$column['index_1']}!='') {{date('d M Y',strtotime($row->{$column['index_1']}))}} @else n/a @endif</span>
</td>
