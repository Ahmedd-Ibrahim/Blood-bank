<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Fb Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fb_link', 'Fb Link:') !!}
    {!! Form::text('fb_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Insta Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('insta_link', 'Insta Link:') !!}
    {!! Form::text('insta_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Ytb Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ytb_link', 'Ytb Link:') !!}
    {!! Form::text('ytb_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Twitter Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter_link', 'Twitter Link:') !!}
    {!! Form::text('twitter_link', null, ['class' => 'form-control']) !!}
</div>

<!-- About Us Field -->
<div class="form-group col-sm-6">
    {!! Form::label('about_us', 'About Us:') !!}
    {!! Form::text('about_us', null, ['class' => 'form-control']) !!}
</div>

<!-- Notification Settings Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notification_settings', 'Notification Settings:') !!}
    {!! Form::text('notification_settings', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
</div>
