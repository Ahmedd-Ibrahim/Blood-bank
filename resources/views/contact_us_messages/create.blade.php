@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contact Us Message
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'contactUsMessages.store']) !!}

                        @include('contact_us_messages.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
