@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Marca / Agregar
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        <div class="row">
            <div class="col-lg-4">

                <div class="box box-primary">

                    <div class="box-body">
                        <div class="row">
                            {!! Form::open(['route' => 'marcas.store']) !!}

                            @include('marcas.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
