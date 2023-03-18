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


        {{--                <div class="form-group">--}}
        {{--                    {{ Form::label('الأيقونة') }}--}}
        {{--                    {{ Form::text('icon', $service->icon, ['class' => 'form-control' . ($errors->has('icon') ? ' is-invalid' : ''), 'placeholder' => 'الأيقونة']) }}--}}
        {{--                    {!! $errors->first('icon', '<div class="invalid-feedback">:message</div>') !!}--}}
        {{--                </div>--}}


        <div class="form-group">
            {{ Form::label('الأيقونة') }}
            {{ Form::select('icon', config('icons') , $service->icon, ['class' => 'form-control' . ($errors->has('icon') ? ' is-invalid' : ''), 'placeholder' => 'الأيقونة', 'id' => 'icon-dropdown']) }}
            {!! $errors->first('icon', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</div>
