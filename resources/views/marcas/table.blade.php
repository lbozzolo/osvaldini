<table class="table table-responsive" id="categorias-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($marcas as $marca)
        <tr>
            <td>{!! $marca->id !!}</td>
            <td>{!! $marca->name !!}</td>
            <td>
                {!! Form::open(['route' => ['marcas.destroy', $marca->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('marcas.edit', [$marca->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro que desea eliminar esta marca?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>