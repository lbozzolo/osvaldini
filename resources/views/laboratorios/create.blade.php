@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Laboratorio / Agregar
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        <div class="row">
            <div class="col-lg-4">

                <div class="box box-primary">

                    <div class="box-body">

                            {!! Form::open(['route' => 'laboratorios.store']) !!}

                            @include('laboratorios.fields')

                            {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
