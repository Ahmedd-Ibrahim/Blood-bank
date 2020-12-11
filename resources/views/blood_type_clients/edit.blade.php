@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Blood Type Client
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bloodTypeClient, ['route' => ['bloodTypeClients.update', $bloodTypeClient->id], 'method' => 'patch']) !!}

                        @include('blood_type_clients.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection