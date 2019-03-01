<div class="row">

    <div class="col-lg-5">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td>{!! Form::label('id', 'Id:') !!}</td>
                    <td><p>{!! $producto->id !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('highlight', 'Producto destacado:') !!}</td>
                    <td><p>{!! ($producto->highlight)? 'Destacado' : 'No destacado' !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('name', 'Nombre:') !!}</td>
                    <td><p>{!! $producto->name !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('description', 'Descripción:') !!}</td>
                    <td><p>{!! $producto->description !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('principio_activo', 'Principio Activo:') !!}</td>
                    <td><p>{!! $producto->principio_activo !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('presentacion', 'Presentación:') !!}</td>
                    <td><p>{!! $producto->presentacion !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('code', 'Código:') !!}</td>
                    <td><p>{!! $producto->code !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('price', 'Precio:') !!}</td>
                    <td><p>$ {!! $producto->price !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('categorias', 'Categorías:') !!}</td>
                    <td>
                        @forelse($producto->categorias as $categoria)
                            <span class="label label-default">{!! $categoria->name !!}</span>
                        @empty
                            <small class="text-muted"><em>no hay categorías especificadas</em></small>
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <td>{!! Form::label('created_at', 'Created At:') !!}</td>
                    <td><p>{!! $producto->fecha_creado !!}</p></td>
                </tr>
                <tr>
                    <td>{!! Form::label('updated_at', 'Updated At:') !!}</td>
                    <td><p>{!! $producto->fecha_editado !!}</p></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-7">

        <div class="form-group">
            {!! Form::label('images', 'Imágenes') !!}
            <ul class="list-inline" style="border: 2px dotted lightgrey; padding: 5px">
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
        </div>

        @foreach($producto->images as $imagen)

            <div class="modal fade" id="modalVerImage{!! $imagen->id !!}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ route('imagenes.ver', $imagen->path) }}" class="img-responsive" alt="{!! $imagen->title !!}" style="margin: 0px auto">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

</div>


