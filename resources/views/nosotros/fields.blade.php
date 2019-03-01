<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Texto:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-lg-6" style="padding-top: 30px">
    {!! Form::label('active', 'Activo') !!}
    {!! Form::checkbox('active', '1') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nosotros.index') !!}" class="btn btn-default">Cancelar</a>
</div>
