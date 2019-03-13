@extends('web.layout')


@section('content')

    <main>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-12">

                    <div class="product-details">

                        <div class="basic-details">
                            <div class="row">
                                <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                    <figure class="image-box">
                                        @if($producto->mainImage())
                                            <img src="{{ route('imagenes.ver', $producto->mainImage()->path) }}" class="img-responsive" alt="{!! $producto->mainImage()->title !!}" style="margin: 0px auto;">
                                        @endif
                                    </figure>
                                </div>
                                <div class="info-column col-md-6 col-sm-6 col-xs-12">
                                    @if($producto->name)
                                    <div class="details-header">
                                        <h2>{!! $producto->name !!}</h2>
                                    </div>
                                    @endif
                                    @if($producto->description)
                                    <div class="text">
                                        <p>{!! $producto->description !!}</p>
                                    </div>
                                    @endif
                                    @if($producto->categorias->count())
                                    <div class="text">
                                        <span>Categorías:</span>
                                        <ul class="item-meta">
                                            @foreach($producto->categorias as $categoria)
                                                <li>{!! $categoria->name !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if($producto->code)
                                    <div class="text">
                                        <p>Código: {!! $producto->code !!}</p>
                                    </div>
                                    @endif
                                    @if($producto->price)
                                    <div class="text">
                                        <p>Precio: ${!! $producto->price !!}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div><!--End Basic Details-->

                        {{--<div class="product-info-tabs">--}}

                            {{--<div class="prod-tabs" id="product-tabs">--}}
                                {{--<div class="tab-btns clearfix">--}}
                                    {{--<a href="#prod-description" class="tab-btn active-btn">Descripción del Producto</a>--}}
                                {{--</div>--}}

                                {{--<div class="tabs-container">--}}
                                    {{--<div class="tab active-tab" id="prod-description">--}}

                                        {{--<div class="content">--}}
                                            {{--<p>--}}
                                                {{--Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                    {{--</div><!--End Tab-->--}}


                                {{--</div><!--End tabs-container-->--}}
                            {{--</div><!--End prod-tabs-->--}}
                        {{--</div><!--End product-info-tabs-->--}}

                    </div><!--End Product-details-->
                </div><!--End Col-->

                <!--Sidebar-->
            </div><!--/row-->
        </div><!--/container-->
    </main><!--/main-->

@endsection