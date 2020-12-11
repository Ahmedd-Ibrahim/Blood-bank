<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $clientGovernorate->id }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $clientGovernorate->client_id }}</p>
</div>

<!-- Governorate Id Field -->
<div class="form-group">
    {!! Form::label('governorate_id', 'Governorate Id:') !!}
    <p>{{ $clientGovernorate->governorate_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $clientGovernorate->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $clientGovernorate->updated_at }}</p>
</div>

