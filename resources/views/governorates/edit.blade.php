@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Governorate
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($governorate, ['route' => ['governorates.update', $governorate->id], 'method' => 'patch']) !!}

                        @include('governorates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection