<table class="table table-responsive" id="empresas-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Texto</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th style="width: 100px">Action</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nosotros as $nosotro)
        <tr>
            <td>{!! $nosotro->id !!}</td>
            <td>{!! $nosotro->title !!}</td>
            <td>{!! $nosotro->body !!}</td>
            <td>{!! $nosotro->created_at !!}</td>
            <td>{!! $nosotro->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['nosotros.destroy', $nosotro->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nosotros.show', [$nosotro->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nosotros.edit', [$nosotro->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro que desea eliminar esta entrada?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                @if($nosotro->active)
                    <span class="label label-success">ACTIVO</span>
                @else
                    <span class="label label-danger pull-right">INACTIVO</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>