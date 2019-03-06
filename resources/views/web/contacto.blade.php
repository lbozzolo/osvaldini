@extends('web.layout')


@section('content')


    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3289.795865299594!2d-58.923984595503164!3d-34.457329413252694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bc832c9f974c1b%3A0x963bee59c65ecdf4!2sEstanislao+L%C3%B3pez+1138%2C+B1629GVV+Pilar+Centro%2C+Pcia+de+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1536682823547" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

    <div class="content">
        <h2><b>Contactactanos</b></h2>

        {!! Form::open(['url' => route('web.post.contacto'), 'method' => 'post', 'class' => 'form']) !!}

            <div style="padding:5px">
                {!! Form::label('nombre', 'Nombre') !!}<br>
                {!! Form::text('nombre', null, ['class' => 'large_field', 'style' => 'width: 98%']) !!}
            </div>
            <div style="padding:5px">
                {!! Form::label('email', 'Email') !!}<br>
                {!! Form::email('email', null, ['class' => 'large_field', 'style' => 'width: 98%; padding: 5px ']) !!}
            </div>
            <div style="padding:5px">

                {!! Form::label('comentario', 'Comentario') !!}<br>
                {!! Form::textarea('comentario', null, ['style' => 'width: 98%', 'rows' => '5']) !!}
            </div>

            {!! Form::submit('Enviar', ['style' => 'background-color: darkblue; padding: 5px 10px; border-radius: 5px; color: white; cursor: pointer']) !!}

        {!! Form::close() !!}

        <div class="clear"></div>

    </div>

@endsection