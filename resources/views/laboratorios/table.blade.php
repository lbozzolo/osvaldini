<table class="table table-responsive" id="servicios-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th style="width: 100px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($laboratorios as $laboratorio)
        <tr>
            <td>{!! $laboratorio->id !!}</td>
            <td>{!! $laboratorio->name !!}</td>
            <td>
                {!! Form::open(['route' => ['laboratorios.destroy', $laboratorio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('laboratorios.edit', [$laboratorio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro que desea eliminar este laboratorio?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>