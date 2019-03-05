@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Marca / Editar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')

       <div class="row">
           <div class="col-lg-4">

               <div class="box box-primary">
                   <div class="box-body">
                       {!! Form::model($marca, ['route' => ['marcas.update', $marca->id], 'method' => 'patch']) !!}

                       @include('marcas.fields')

                       {!! Form::close() !!}
                   </div>
               </div>

           </div>
       </div>

   </div>
@endsection