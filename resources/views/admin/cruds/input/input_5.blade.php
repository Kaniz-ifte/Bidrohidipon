<label class="col-lg-2 col-form-label text-right" for="{{$input['name']}}">{{$input['title']}}</label>
<div class="col-lg-3">

   <span class="switch switch-outline switch-icon switch-success @error($input['name']) is-invalid @enderror">
        <label>
             <input type="hidden" value="0" name="{{$input['name']}}">
            <input type="checkbox" value="1" @if (isset($input['update'])) {{$data->{$input['name']}=='1' ? 'checked' : '' }} @else {{isset($input['checked']) ? 'checked' : ''}}

            @endif  name="{{$input['name']}}" {{isset($input['disabled']) ? 'disabled' : ''}}>

            <span></span>
        </label>
   </span>

   @error($input['name'])
   <div class="invalid-feedback">{{ $message }}</div>
   @enderror
</div>
