<table class="table table-responsive" id="insumos-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Laboratorio</th>
            <th>Categorías</th>
            <th>Principio Activo</th>
            <th>Presentación</th>
            <th>Características</th>
            <th>PDF</th>
            <th>Precio</th>
            <th>Creado</th>
            <th>Ultima edición</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->id !!}</td>
            <td>{!! $producto->name !!}</td>
            <td>{!! $producto->code !!}</td>
            <td>{!! $producto->laboratorio->name !!}</td>
            <td>
                @forelse($producto->categorias as $categoria)
                    <span class="label label-default">{!! $categoria->name !!}</span>
                @empty
                    --
                @endforelse
            </td>
            <td>{!! $producto->principio_activo !!}</td>
            <td>{!! $producto->presentacion !!}</td>
            <td>{!! $producto->caracteristicas !!}</td>
            <td>
                @if($producto->pdf_file == '')
                    <i class="fa fa-file-pdf-o" title="no hay pdf para este paquete"></i>
                @else
                    <a href="{{ route('admin.ver.pdf', $producto->pdf_file) }}" title="Ver pdf" target="_blank"><i class="fa fa-file-pdf-o"></i> </a>
                @endif
            </td>
            <td>$ {!! $producto->price !!}</td>
            <td>{!! $producto->fecha_creado !!}</td>
            <td>{!! $producto->fecha_editado !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro que desea eliminar este producto?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>