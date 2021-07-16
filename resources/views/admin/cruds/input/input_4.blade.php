<label class="col-lg-2 col-form-label text-right" for="{{$input['name']}}">{{$input['title']}}</label>
<div class="col-lg-3">
    <textarea name="{{$input['name']}}" class="form-control @error($input['name']) is-invalid @enderror"
    rows="{{isset($input['rows']) ? $input['rows'] : '3'}}" cols="{{isset($input['rows']) ? $input['rows'] : '80'}}" {{isset($input['required']) ? 'required' : ''}} {{isset($input['disabled']) ? 'disabled' : ''}}> {{isset($input['update']) ? $data->{$input['name']} : ''}}  </textarea>

    @error($input['name'])
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
