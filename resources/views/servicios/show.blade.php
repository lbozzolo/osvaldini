@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Servicio
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('servicios.show_fields')
                    <a href="{!! route('servicios.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
