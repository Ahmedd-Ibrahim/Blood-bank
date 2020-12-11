<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_id', 'Post Id:') !!}
    {!! Form::number('post_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientPosts.index') }}" class="btn btn-default">Cancel</a>
</div>
