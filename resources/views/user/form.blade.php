<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('الإسم') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'الإسم']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('إسم المستخدم') }}
            {{ Form::text('username', $user->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'إسم المستخدم']) }}
            {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('البريد الإلكتروني') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'البريد الإلكتروني']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(request()->is('*/create'))
            <div class="form-group">
                {{ Form::label('كلمة المرور') }}
                {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'كلمة المرور']) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('رقم الهاتف') }}
            {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'رقم الهاتف']) }}
            {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('العنوان') }}
            {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'العنوان']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الحالة') }}
            {{ Form::select('status', ['active' => 'نشط', 'inactive' => 'غير نشط'], $user->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'الحالة']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">إدخال</button>
    </div>
</div>
