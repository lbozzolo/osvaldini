@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Productos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('productos.create') !!}">Agregar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-4">

                <div class="box box-primary">
                    <div class="box-body">

                        <ul class="list-unstyled">
                            @foreach($productos as $producto)
                                <li class="list-group-item">
                                    {!! $producto->name !!}
                                    <div class="pull-right">
                                        {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            <a href="{!! route('productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro que desea eliminar este producto?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        {{--@include('productos.table')--}}
                        
                    </div>
                </div>
                <div class="text-center">

                </div>

            </div>
        </div>


    </div>
@endsection
