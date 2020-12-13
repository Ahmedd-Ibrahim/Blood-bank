<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Governorate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('governorate_id', 'Governorate Id:') !!}
    {!! Form::select('governorate_id', \App\Models\Governorate::pluck('name','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cities.index') }}" class="btn btn-default">Cancel</a>
</div>
