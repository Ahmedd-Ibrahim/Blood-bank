@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Blood Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bloodType, ['route' => ['bloodTypes.update', $bloodType->id], 'method' => 'patch']) !!}

                        @include('blood_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection