<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Governorate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('governorate_id', 'Governorate Id:') !!}
    {!! Form::number('governorate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientGovernorates.index') }}" class="btn btn-default">Cancel</a>
</div>
