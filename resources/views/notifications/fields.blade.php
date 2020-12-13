<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Donation Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('donation_order_id', 'Donation Order Id:') !!}
    {!! Form::select('donation_order_id',\App\Models\DonationOrder::pluck('name','id'), null,['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('notifications.index') }}" class="btn btn-default">Cancel</a>
</div>
