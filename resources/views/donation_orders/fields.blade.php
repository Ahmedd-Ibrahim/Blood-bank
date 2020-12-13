<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Blood Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blood_count', 'Blood Count:') !!}
    {!! Form::number('blood_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Hospital Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hospital_address', 'Hospital Address:') !!}
    {!! Form::text('hospital_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>
<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::select('city_id', \App\Models\City::pluck('name','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Blood Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blood_type_id', 'Blood Type Id:') !!}
    {!! Form::select('blood_type_id',\App\Models\BloodType::pluck('type','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::select('client_id',\App\Models\Client::pluck('name','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('donationOrders.index') }}" class="btn btn-default">Cancel</a>
</div>
