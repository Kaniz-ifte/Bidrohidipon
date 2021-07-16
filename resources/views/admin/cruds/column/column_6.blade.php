<td class="pl-0 py-8">
   <div class="d-flex align-items-center">
        <div class="symbol symbol-50 flex-shrink-0 mr-4">
            <div class="symbol-label" style="background-image: url('{{ asset( $row->{$column['index']} ) }}')"></div>
        </div>
        <div>
            <span class="text-dark-75 font-weight-bold mb-1 font-size-lg" data-toggle="tooltip" data-theme="dark" title="{{ $row->{$column['index_1']} }}">{{ TrimString( $row->{$column['index_1']} , 15) }}</span>
            <span class="text-muted font-weight-bold d-block" data-toggle="tooltip" data-theme="dark" title="{{ $row->{$column['index_2']} }}">{{ TrimString( $row->{$column['index_2']} , 15) }}</span>
        </div>
   </div>
</td>
