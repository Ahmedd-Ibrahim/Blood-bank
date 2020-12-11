@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Client Post
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientPost, ['route' => ['clientPosts.update', $clientPost->id], 'method' => 'patch']) !!}

                        @include('client_posts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection