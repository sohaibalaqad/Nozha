<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('الأسم') }}
            {{ Form::text('name', $area->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'الأسم']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الوصف') }}
            {{ Form::textarea('description', $area->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'الوصف']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
{{--        <div class="form-group">--}}
{{--            {{ Form::label('صورة') }}--}}
{{--            {{ Form::text('photo_url', $area->photo_url, ['class' => 'form-control' . ($errors->has('photo_url') ? ' is-invalid' : ''), 'placeholder' => 'صورة']) }}--}}
{{--            {!! $errors->first('photo_url', '<div class="invalid-feedback">:message</div>') !!}--}}
{{--        </div>--}}

        @for($i = 1; $i <= 5; $i++)
            <div class="input-group p-2">
                <div class="custom-file">
                    <input type="file" class="custom-file-input{{ $errors->has('photoUrl'.$i) ? ' is-invalid' : '' }}" id="inputGroupFile{{$i}}"  name="photoUrl{{$i}}"  >
                    <label class="custom-file-label" for="inputGroupFile{{$i}}">أضف صورة {{$i}} للمكان </label>
                </div>
            </div>
        @endfor


{{--        <div class="form-group">--}}
{{--            {{ Form::label('فيديو') }}--}}
{{--            {{ Form::text('video_url', $area->video_url, ['class' => 'form-control' . ($errors->has('video_url') ? ' is-invalid' : ''), 'placeholder' => 'فيديو']) }}--}}
{{--            {!! $errors->first('video_url', '<div class="invalid-feedback">:message</div>') !!}--}}
{{--        </div>--}}

        <div class="input-group p-2">
            <div class="custom-file">
                <input type="file" class="custom-file-input{{ $errors->has('videoUrl') ? ' is-invalid' : '' }}" id="inputGroupFile02"  name="videoUrl"  >
                <label class="custom-file-label" for="inputGroupFile02">أضف فيديو للمكان</label>
            </div>
        </div>

{{--        <div class="form-group">--}}
{{--            {{ Form::label('الحالة') }}--}}
{{--            {{ Form::text('status', $area->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'الحالة']) }}--}}
{{--            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}--}}
{{--        </div> --}}

        <div class="form-group">
            {{ Form::label('الحالة') }}
            {{ Form::select('status', ['1' => 'نشط', '0' => 'غير نشط'], $area->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'الحالة']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::hidden('user_id', \Illuminate\Support\Facades\Auth::user()->id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'المستخدم']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">إدخال</button>
    </div>
</div>
