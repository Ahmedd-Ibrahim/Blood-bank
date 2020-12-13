<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::select('client_id',\App\Models\Client::pluck('name','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Post Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_id', 'Post Id:') !!}
    {!! Form::select('post_id', \App\Models\Post::pluck('title','id'),null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('clientPosts.index') }}" class="btn btn-default">Cancel</a>
</div>
