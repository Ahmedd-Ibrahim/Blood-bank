<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $client->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $client->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $client->email }}</p>
</div>

<!-- Bdate Field -->
<div class="form-group">
    {!! Form::label('bdate', 'Bdate:') !!}
    <p>{{ $client->bdate }}</p>
</div>

<!-- Blood Type Id Field -->
<div class="form-group">
    {!! Form::label('blood_type_id', 'Blood Type Id:') !!}
    <p>{{ $client->blood_type_id }}</p>
</div>

<!-- Last Donation Date Field -->
<div class="form-group">
    {!! Form::label('last_donation_date', 'Last Donation Date:') !!}
    <p>{{ $client->last_donation_date }}</p>
</div>

<!-- City Id Field -->
<div class="form-group">
    {!! Form::label('city_id', 'City Id:') !!}
    <p>{{ $client->city_id }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $client->phone }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $client->password }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $client->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $client->updated_at }}</p>
</div>

