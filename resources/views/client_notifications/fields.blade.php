<!-- Is Seen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('is_seen', 'Is Seen:') !!}
    <label class="radio-inline">
        {!! Form::radio('is_seen', "['true'", null) !!} ['true'
    </label>

    <label class="radio-inline">
        {!! Form::radio('is_seen', "false']", null) !!} false']
    </label>

</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Notification Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notification_id', 'Notification Id:') !!}
    {!! Form::number('notification_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientNotifications.index') }}" class="btn btn-default">Cancel</a>
</div>
