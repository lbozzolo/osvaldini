@extends('layouts.app')

@section('content')
    <section class="content-header col-lg-4">
        <h1 class="pull-left">Marcas</h1>
        <span class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('marcas.create') !!}">Agregar</a>
        </span>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-4">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('marcas.table')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

