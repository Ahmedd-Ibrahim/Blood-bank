<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $clientNotification->id }}</p>
</div>

<!-- Is Seen Field -->
<div class="form-group">
    {!! Form::label('is_seen', 'Is Seen:') !!}
    <p>{{ $clientNotification->is_seen }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $clientNotification->client_id }}</p>
</div>

<!-- Notification Id Field -->
<div class="form-group">
    {!! Form::label('notification_id', 'Notification Id:') !!}
    <p>{{ $clientNotification->notification_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $clientNotification->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $clientNotification->updated_at }}</p>
</div>

