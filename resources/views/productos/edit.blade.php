@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Producto / Editar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <div class="col-lg-12" id="form-fields">
                       <div class="row">
                           {!! Form::model($producto, ['route' => ['productos.update', $producto->id], 'method' => 'patch']) !!}

                                @include('productos.fields')

                           {!! Form::close() !!}
                       </div>
                   </div>
                   <div class="col-lg-12">

                       {!! Form::label('Imágenes') !!}
                       @include('productos.images')

                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection


@section('scripts')

    <script src="{{ asset('croppie/croppie.js') }}"></script>
    <script src="{{ asset('exif-js/exif.js') }}"></script>
    <script src="{{ asset('js/croppie-file.js') }}"></script>

    <script>

        $('.select2').select2({
            multiple: true
        });

    </script>

@endsection