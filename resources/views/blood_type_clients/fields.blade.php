<!-- Blood Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blood_type_id', 'Blood Type Id:') !!}
    {!! Form::number('blood_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bloodTypeClients.index') }}" class="btn btn-default">Cancel</a>
</div>
