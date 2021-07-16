<td>
   <span class="text-dark-75 font-weight-bold d-block font-size-lg">{{date('h:i A',strtotime($row->{$column['index']}))}}</span>
   <span class="text-muted font-weight-bold">@if ($row->{$column['index']}!='') {{date('d M Y',strtotime($row->{$column['index']}))}}@else n/a @endif</span>
</td>
