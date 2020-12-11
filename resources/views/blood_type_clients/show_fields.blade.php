<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $bloodTypeClient->id }}</p>
</div>

<!-- Blood Type Id Field -->
<div class="form-group">
    {!! Form::label('blood_type_id', 'Blood Type Id:') !!}
    <p>{{ $bloodTypeClient->blood_type_id }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $bloodTypeClient->client_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bloodTypeClient->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bloodTypeClient->updated_at }}</p>
</div>

