<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('path_id') }}
            {{ Form::text('path_id', $pathSubscription->path_id, ['class' => 'form-control' . ($errors->has('path_id') ? ' is-invalid' : ''), 'placeholder' => 'Path Id']) }}
            {!! $errors->first('path_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subscription_id') }}
            {{ Form::text('subscription_id', $pathSubscription->subscription_id, ['class' => 'form-control' . ($errors->has('subscription_id') ? ' is-invalid' : ''), 'placeholder' => 'Subscription Id']) }}
            {!! $errors->first('subscription_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>