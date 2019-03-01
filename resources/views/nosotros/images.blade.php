
{!! Form::open(['url' => route('images.save', ['id' => $farmacia->id, 'class' => 'Farmacia']), 'method' => 'post', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('img', 'Images') !!}
        {!! Form::file('img') !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Descripción') !!}<br>
        {!! Form::text('title') !!}
        {!! Form::submit('Subir imagen', ['class' => 'btn btn-info btn-sm']) !!}
    </div>
    <ul class="list-inline" style="border: 2px dotted lightgrey; padding: 5px">
        @forelse($farmacia->images as $imagen)

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

{!! Form::close() !!}


@foreach($farmacia->images as $imagen)

    <div class="modal fade" id="modalVerImage{!! $imagen->id !!}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ route('imagenes.ver', $imagen->path) }}" class="img-responsive" alt="{!! $imagen->title !!}" style="margin: 0px auto">
                </div>
                <div class="modal-footer">

                    @if($imagen->main == 0)
                        <a href="{{ route('images.main', ['id' => $farmacia->id, 'class' => 'Empresa', 'imagen' => $imagen->id]) }}" class="btn btn-primary" title="Marcar como principal">Marcar como principal</a>
                    @else
                        <a href="#" class="btn btn-primary" disabled title="Marcar como principal">Marcar como principal</a>
                    @endif
                    <button class="btn btn-danger" title="Eliminar foto" data-toggle="modal" data-target="#modalDeleteImage{!! $imagen->id !!}">Eliminar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <div class="modal fade text-left" id="modalDeleteImage{!! $imagen->id !!}">
                        <div class="modal-dialog">
                            <div class="modal-content">
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
                                    {!! Form::submit('Eliminar de todos modos', ['class' => 'btn btn-danger']) !!}
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


