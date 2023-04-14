<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('العنوان') }}
            {{ Form::text('title', $service->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'العنوان']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('الوصف') }}
            {{ Form::text('description', $service->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'الوصف']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="input-group p-2 my-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input{{ $errors->has('photoUrl') ? ' is-invalid' : '' }}" id="inputGroupFile01"  name="photoUrl"  >
                <label class="custom-file-label" for="inputGroupFile01">أضف صورة للمسار</label>
            </div>
        </div>

    </div>
        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
</div>
