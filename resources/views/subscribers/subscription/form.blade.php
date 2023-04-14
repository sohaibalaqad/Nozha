<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('المستخدم') }}
            {{ Form::select('user_id', \App\Models\User::pluck('name', 'id'), $subscription->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'المستخدم']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ملاحظات') }}
            {{ Form::textarea('note', $subscription->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'ملاحظات']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('المبلغ') }}
            {{ Form::number('balance', $subscription->balance, ['class' => 'form-control' . ($errors->has('balance') ? ' is-invalid' : ''), 'placeholder' => 'المبلغ']) }}
            {!! $errors->first('balance', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</div>
