<!-- Name Field -->
<div class="form-group col-lg-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6" style="padding-top: 30px">
    {!! Form::label('text_active', 'Texto sobre la imagen') !!}<br>
    Activado {!! Form::radio('text_active', '1', null) !!}<br>
    Desactivado {!! Form::radio('text_active', '0', null) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-lg-12" >
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sliders.index') !!}" class="btn btn-default">Cancelar</a>
</div>
