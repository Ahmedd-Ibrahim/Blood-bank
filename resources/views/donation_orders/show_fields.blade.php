<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $donationOrder->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $donationOrder->name }}</p>
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $donationOrder->age }}</p>
</div>

<!-- Blood Count Field -->
<div class="form-group">
    {!! Form::label('blood_count', 'Blood Count:') !!}
    <p>{{ $donationOrder->blood_count }}</p>
</div>

<!-- Hospital Address Field -->
<div class="form-group">
    {!! Form::label('hospital_address', 'Hospital Address:') !!}
    <p>{{ $donationOrder->hospital_address }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $donationOrder->phone }}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $donationOrder->notes }}</p>
</div>

<!-- City Id Field -->
<div class="form-group">
    {!! Form::label('city_id', 'City Id:') !!}
    <p>{{ $donationOrder->city_id }}</p>
</div>

<!-- Blood Type Id Field -->
<div class="form-group">
    {!! Form::label('blood_type_id', 'Blood Type Id:') !!}
    <p>{{ $donationOrder->blood_type_id }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $donationOrder->client_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $donationOrder->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $donationOrder->updated_at }}</p>
</div>

