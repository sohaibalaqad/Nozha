<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('الأسم') }}
            {{ Form::text('name', $path->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'الأسم']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الوصف') }}
            {{ Form::textarea('description', $path->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'الوصف']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('التاريخ') }}
            {{ Form::date('date', $path->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'التاريخ']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('البدء') }}
            {{ Form::time('start', $path->start, ['class' => 'form-control' . ($errors->has('start') ? ' is-invalid' : ''), 'placeholder' => 'البدء']) }}
            {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الإنتهاء') }}
            {{ Form::time('end', $path->end, ['class' => 'form-control' . ($errors->has('end') ? ' is-invalid' : ''), 'placeholder' => 'الإنتهاء']) }}
            {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
        </div>


{{--        <div class="form-group">--}}
{{--            {{ Form::label('photo_url') }}--}}
{{--            {{ Form::text('photo_url', $path->photo_url, ['class' => 'form-control' . ($errors->has('photo_url') ? ' is-invalid' : ''), 'placeholder' => 'Photo Url']) }}--}}
{{--            {!! $errors->first('photo_url', '<div class="invalid-feedback">:message</div>') !!}--}}
{{--        </div>--}}

        <div class="input-group p-2 my-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input{{ $errors->has('photoUrl') ? ' is-invalid' : '' }}" id="inputGroupFile01"  name="photoUrl"  >
                <label class="custom-file-label" for="inputGroupFile01">أضف صورة للمسار</label>
            </div>
        </div>


        {{-- add video --}}
        <div class="input-group p-2">
            <div class="custom-file">
                <input type="file" class="custom-file-input{{ $errors->has('videoUrl') ? ' is-invalid' : '' }}" id="inputGroupFile02"  name="videoUrl"  >
                <label class="custom-file-label" for="inputGroupFile02">أضف فيديو للمكان</label>
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('المسافة') }}
            {{ Form::text('distance', $path->distance, ['class' => 'form-control' . ($errors->has('distance') ? ' is-invalid' : ''), 'placeholder' => 'المسافة']) }}
            {!! $errors->first('distance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('المصاريف') }}
            {{ Form::number('fees', $path->fees, ['class' => 'form-control' . ($errors->has('fees') ? ' is-invalid' : ''), 'placeholder' => 'المصاريف']) }}
            {!! $errors->first('fees', '<div class="invalid-feedback">:message</div>') !!}
        </div>
{{--        <div class="form-group">--}}
{{--            {{ Form::label('الحالة') }}--}}
            {{ Form::hidden('status', $path->status ? 1 : 0 ,   ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'الحالة']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
{{--        </div>--}}
        <div class="form-group">
            {{ Form::label('الموقع') }}
            {{ Form::select('area_id', \App\Models\Area::pluck('name', 'id'), $path->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'الموقع']) }}
            {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('coordinator_id', Auth::user()->id, ['class' => 'form-control' . ($errors->has('coordinator_id') ? ' is-invalid' : ''), 'placeholder' => 'المنسق']) }}
            {!! $errors->first('coordinator_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
