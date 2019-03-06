
<section class="hsecond">
    <div id="logo"><a href="index.html"><img src="{{ asset('template-web/image/logo01.png') }}"></a></div>
    <div class="clear"></div>
</section>

<nav id="menu">
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="categories_hor"><a href="{{ route('web.nosotros') }}">Nosotros</a></li>
        <li><a href="#">Productos</a>
            <div>
                @if(isset($productos))
                <ul>
                    @forelse($productos as $producto)
                        <li><a href="{{ route('web.producto.detalle', $producto->id) }}">{!! $producto->name !!}</a></li>
                    @empty
                    @endforelse
                    {{--<li><a href="{{ route('web.nosotros') }}">Agricultura</a></li>--}}
                    {{--<li><a href="horticultura.html">Horticultura</a></li>--}}
                    {{--<li><a href="polo.html">Polo</a></li>--}}
                    {{--<li><a href="golf.html">Golf</a></li>--}}
                    {{--<li><a href="jardines.html">Jardines y espacios verdes</a></li>--}}
                    {{--<li><a href="plagas.html">Control de Plagas</a></li>--}}
                </ul>
                @endif
            </div>
        </li>
        <li><a href="{{ route('web.contacto') }}">Contactanos</a></li>
        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li><a href="mailto:ventas@fortinagropecuaria.com.ar">ventas@fortinagropecuaria.com.ar</a></li>
        <li><a href="#">Tel: 02304-430150</a></li>
    </ul>
</nav>

<nav id="menu" class="m-menu"> <span>Menu</span>
    <ul>
        <li class="categories"><a href="index.html">Home</a>
            <div>
                <div class="column"> <a href="#">Home</a>
                </div>
                <div class="column"> <a href="nosotros.html">Nosotros</a>

                </div>
                <div class="column"> <a href="#">Productos</a>
                    <div>
                        <ul>
                            <li><a href="agricultura.html">Agricultura</a></li>
                            <li><a href="horticultura.html">Horticultura</a></li>
                            <li><a href="polo.html">Polo</a></li>
                            <li><a href="golf.html">Golf</a></li>
                            <li><a href="jardines.html">Jardines y espacios verdes</a></li>
                            <li><a href="plagas.html">Control de Plagas</a></li>
                        </ul>
                    </div>
                </div>

                <div class="column"><a href="contacto.html">Contactanos</a></div>
                <div class="column"><a href="mailto:ventas@fortinagropecuaria.com.ar">ventas@fortinagropecuaria.com.ar</a></div>
                <div class="column"><a href="#">Tel: 02304-430150</a></div>
            </div>
        </li>
    </ul>
</nav>