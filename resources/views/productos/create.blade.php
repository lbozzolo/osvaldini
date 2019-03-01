@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Producto / Agrear
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productos.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('productos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script>

        $('.select2').select2({
           multiple: true
        });

    </script>

@endsection