
{{--{!! Form::open(['url' => route('images.save', ['id' => $producto->id, 'class' => 'Producto']), 'method' => 'post', 'files' => true]) !!}--}}

{{--<div class="form-group">--}}
    {{--{!! Form::label('img', 'Images') !!}--}}
    {{--{!! Form::file('img') !!}--}}
{{--</div>--}}
{{--<div class="form-group">--}}
    {{--{!! Form::label('title', 'Descripción') !!}<br>--}}
    {{--{!! Form::text('title') !!}--}}
    {{--{!! Form::submit('Subir imagen', ['class' => 'btn btn-info btn-sm']) !!}--}}
{{--</div>--}}
<ul class="list-inline" id="list-images" style="border: 2px dotted lightgrey; padding: 5px">
    @forelse($producto->images as $imagen)

        <li>
            <span style="display: inline-block">
                <a href="" data-toggle="modal" data-target="#modalVerImage{!! $imagen->id !!}">
                    <img src="{{ route('imagenes.ver', $imagen->path) }}" alt="{!! $imagen->title !!}" class="img-responsive" style="{!! ($imagen->main == 0)? 'opacity: 0.5;' : '' !!} height: 80px">
                </a>
            </span>
        </li>

    @empty

        <li class="text-muted"><i class="fa fa-meh-o"></i> <small><em>No hay imágenes para mostrar.</em></small> </li>

    @endforelse
</ul>

{{--{!! Form::close() !!}--}}


<div class="">
    <div class="box-body">

        <span id="producto-id" data-producto-id="{!! route('subir.imagen', ['id' => $producto->id, 'class' => 'Producto']) !!}"></span>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="d-flex p-3">
            <div class="text-center">
                <div>
                    <div>
                        <input type="file" class="file-upload form-control" id="file-upload" name="img" accept="image/*">
                    </div>
                </div>
            </div>
        </div>

        <div id="croppie-image" style="display: none; padding: 20px">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="lead text-center">
                    ¿Desea cortar y subir esta imagen?
                    <button class="btn btn-primary" id="upload" >Aceptar</button>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-default mt-3">Cancelar</a>
                </div>

                <div id="resizer2" style="padding-top: 10px;">
                    <button class="btn btn-default rotate pull-left" data-deg="90"><i class="fa fa-rotate-left" style="font-size: 2em"></i></button>
                    <button class="btn btn-default rotate pull-right" data-deg="-90"><i class="fa fa-rotate-right" style="font-size: 2em"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>


@foreach($producto->images as $imagen)

    <div class="modal fade" id="modalVerImage{!! $imagen->id !!}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ route('imagenes.ver', $imagen->path) }}" class="img-responsive" alt="{!! $imagen->title !!}" style="margin: 0px auto">
                </div>
                <div class="modal-footer">

                    @if($imagen->main == 0)
                        <a href="{{ route('images.main', ['id' => $producto->id, 'class' => 'Producto', 'imagen' => $imagen->id]) }}" class="btn btn-primary" title="Marcar como principal">Marcar como principal</a>
                    @else
                        <a href="#" class="btn btn-primary" disabled title="Marcar como principal">Marcar como principal</a>
                    @endif
                    <button class="btn btn-danger" title="Eliminar foto" data-toggle="modal" data-target="#modalDeleteImage{!! $imagen->id !!}">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <div class="modal fade text-left" id="modalDeleteImage{!! $imagen->id !!}">
                        <div class="modal-dialog">
                            <div class="modal-content col-lg-6 col-lg-offset-3">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Eliminar imagen</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="text-red">¿Está seguro que desea eliminar la imagen?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                    {!! Form::open(['method' => 'DELETE', 'url' => route('images.destroy', $imagen->id)]) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach


