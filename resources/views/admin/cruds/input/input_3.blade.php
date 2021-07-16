<label class="col-lg-2 col-form-label text-right" for="{{$input['name']}}">{{$input['title']}}</label>
<div class="col-lg-3">
   <div class="image-input image-input-outline @error($input['name']) is-invalid @enderror" id="{{$input['id']}}">
        <div class="image-input-wrapper" style="width:{{$input['sample_image_width']}};height:{{$input['sample_image_height']}};background-image: url({{isset($input['update']) ? asset($data->{$input['name']}) : asset($input['sample_image'])}})"></div>

        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change {{$input['title']}}">
            <i class="fa fa-pen icon-sm text-muted"></i>
            @if(isset($input['update']))
                 <input type="hidden" name="old_{{$input['name']}}" value="{{ $data->{$input['name']} }}">
            @endif

            <input type="file"  name="{{$input['name']}}"  {{isset($input['required']) ? 'required' : ''}} {{isset($input['disabled']) ? 'disabled' : ''}}/>

        </label>

        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel {{$input['title']}}">
            <i class="ki ki-bold-close icon-xs text-muted"></i>
        </span>
   </div>
   @error($input['name'])
   <div class="invalid-feedback">{{ $message }}</div>
   @enderror
</div>

@section('scripts')

     <script type="text/javascript">
         new KTImageInput("{{$input['id']}}");
     </script>

     @parent

@endsection
