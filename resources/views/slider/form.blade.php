<div class="box box-info padding-1">
    <div class="box-body">

{{--        <div class="form-group">--}}
{{--            {{ Form::label('الصورة') }}--}}
{{--            {{ Form::text('image_url', $slider->image_url, ['class' => 'form-control' . ($errors->has('image_url') ? ' is-invalid' : ''), 'placeholder' => 'الصورة']) }}--}}
{{--            {!! $errors->first('image_url', '<div class="invalid-feedback">:message</div>') !!}--}}
{{--        </div>--}}

        <div class="input-group p-2 my-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input{{ $errors->has('photoUrl') ? ' is-invalid' : '' }}" id="inputGroupFile01"  name="photoUrl"  >
                <label class="custom-file-label" for="inputGroupFile01">أضف صورة</label>
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('العنوان') }}
            {{ Form::text('title', $slider->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'العنوان']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الوصف') }}
            {{ Form::textarea('description', $slider->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'الوصف']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">ادخال</button>
    </div>
</div>
