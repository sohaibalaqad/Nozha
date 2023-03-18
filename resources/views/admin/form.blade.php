<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('الإسم') }}
            {{ Form::text('name', $admin->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'الإسم']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('اسم المستخدم') }}
            {{ Form::text('username', $admin->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'اسم المستخدم']) }}
            {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('البريد الإلكتروني') }}
            {{ Form::text('email', $admin->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'البريد الإلكتروني']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(request()->is('*/create'))
            <div class="form-group">
                {{ Form::label('كلمة المرور') }}
                {{ Form::text('password', $admin->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'كلمة المرور']) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('النوع') }}
            {{ Form::select('super_admin', ['1' => 'مدير عام', '0' => 'مدير مساعد'],  $admin->super_admin, ['class' => 'form-control' . ($errors->has('super_admin') ? ' is-invalid' : ''), 'placeholder' => 'النوع']) }}
            {!! $errors->first('super_admin', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
