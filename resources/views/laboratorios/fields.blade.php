<!-- Title Field -->
<div class="form-group" >
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('laboratorios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
