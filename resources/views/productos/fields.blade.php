<!-- Name Field -->
<div class="form-group col-lg-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-lg-6">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('principio_activo', 'Principio activo:') !!}
    {!! Form::text('principio_activo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('presentacion', 'Presentación:') !!}
    {!! Form::text('presentacion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('caracteristicas', 'Características:') !!}
    {!! Form::text('caracteristicas', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('laboratorio_id', 'Laboratorio:') !!}
    {!! Form::select('laboratorio_id', $laboratorios, null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-lg-6">
    {!! Form::label('code', 'Código:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('pdf_file', 'Archivo PDF') !!}
    {!! Form::file('pdf_file', ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-lg-6">
    {!! Form::label('price', 'Precio:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-6">
    {!! Form::label('categorias[]', 'Categorías') !!}
    @if(isset($producto))
    <select name="categorias[]" class="select2 form-control" placeholder="" multiple style="width: 100%">
        @foreach ($categorias as $key => $value)
            <option value="{{ $key }}" @if ($producto->categorias->contains($key)) selected @endif>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @else
        {!! Form::select('categorias[]', $categorias, null, ['class' => 'form-control select2', 'placeholder' => '', 'multiple', 'style: width: 100%']) !!}
    @endif
</div>

<!-- Hightlight Field -->
<div class="form-group col-lg-6">
    {!! Form::label('highlight', 'Destacar') !!}
    {!! Form::checkbox('highlight', '1') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
