<!-- Id Field -->
<div class="form-group">
    {!! Form::label('active', 'Estado:') !!}
    <p>{!! ($nosotros->active)? 'Activo' : 'Inactivo' !!}</p>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $nosotros->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{!! $nosotros->title !!}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Texto:') !!}
    <p>{!! $nosotros->body !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $nosotros->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $nosotros->updated_at !!}</p>
</div>


