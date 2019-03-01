@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nosotros / Editar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                    <div class="col-lg-6">
                        <div class="row">
                            {!! Form::model($nosotros, ['route' => ['nosotros.update', $nosotros->id], 'method' => 'patch']) !!}

                            @include('nosotros.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>

               </div>
           </div>
       </div>
   </div>
@endsection