@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Donation Order
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($donationOrder, ['route' => ['donationOrders.update', $donationOrder->id], 'method' => 'patch']) !!}

                        @include('donation_orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection