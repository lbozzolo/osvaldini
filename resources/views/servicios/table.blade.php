<table class="table table-responsive" id="servicios-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Texto</th>
            <th style="width: 100px">Action</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    @foreach($servicios as $servicio)
        <tr>
            <td>{!! $servicio->id !!}</td>
            <td>{!! $servicio->title !!}</td>
            <td>{!! $servicio->body !!}</td>
            <td>
                {!! Form::open(['route' => ['servicios.destroy', $servicio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('servicios.show', [$servicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('servicios.edit', [$servicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro que desea eliminar este servicio?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                @if($servicio->active)
                    <span class="label label-success">ACTIVO</span>
                @else
                    <span class="label label-danger pull-right">INACTIVO</span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>