<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Bdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bdate', 'Bdate:') !!}
    {!! Form::text('bdate', null, ['class' => 'form-control','id'=>'bdate']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#bdate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Blood Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blood_type_id', 'Blood Type Id:') !!}
    {!! Form::select('blood_type_id', \App\Models\BloodType::pluck('type','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Last Donation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_donation_date', 'Last Donation Date:') !!}
    {!! Form::text('last_donation_date', null, ['class' => 'form-control','id'=>'last_donation_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#last_donation_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City Id:') !!}
    {!! Form::select('city_id', \App\Models\City::pluck('name','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clients.index') }}" class="btn btn-default">Cancel</a>
</div>
