@extends('web.layout')

@section('content')


    <section class="slider-wrapper">
        <div id="slideshow" class="nivoSlider">
            <a class="nivo-imageLink" href="http://themeforest.net/item/polishop-responsive-ecommerce-html-template/4410285?ref=harnishdesign">
                <img src="{{ asset('template-web/image/slider/slide-1.jpg') }}" alt="slide-1" />
            </a>
            <a class="nivo-imageLink" href="http://themeforest.net/item/polishop-responsive-ecommerce-html-template/4410285?ref=harnishdesign">
                <img src="{{ asset('template-web/image/slider/slide-2.jpg') }}" alt="slide-2" />
            </a>
            <a class="nivo-imageLink" href="http://themeforest.net/item/polishop-responsive-ecommerce-html-template/4410285?ref=harnishdesign">
                <img src="{{ asset('template-web/image/slider/slide-3.jpg') }}" alt="slide-3" />
            </a>
        </div>
    </section>

    <section class="box">
        <div class="box-heading">Productos</div>
        <div class="box-content">
            <div class="box-product">
                <div class="flexslider featured_carousel">
                    <ul class="slides">
                        <li>
                            <div class="slide-inner">
                                <div class="image"><a href="agricultura.html"><img src="{{ asset('template-web/image/product/producto01.jpg') }}" alt="Insecticidas" /></a></div>
                                <div class="name"><a href="agricultura.html">Agricultura</a></div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-inner">
                                <div class="image"><a href="horticultura.html"><img src="{{ asset('template-web/image/product/producto02.jpg') }}" alt="Herbicidas" /></a></div>
                                <div class="name"><a href="horticultura.html">Horticultura</a></div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-inner">
                                <div class="image"><a href="polo.html"><img src="{{ asset('template-web/image/product/producto03.jpg') }}" alt="Fertilizantes" /></a></div>
                                <div class="name"><a href="polo.html">Polo</a></div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-inner">
                                <div class="image"><a href="golf.html"><img src="{{ asset('template-web/image/product/producto04.jpg') }}" alt="Fungicidas" /></a></div>
                                <div class="name"><a href="golf.html">Golf</a></div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-inner">
                                <div class="image"><a href="jardines.html"><img src="{{ asset('template-web/image/product/producto05.jpg') }}" alt="Semillas" /></a></div>
                                <div class="name"><a href="jardines.html">Jardines y espacios verdes</a></div>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <li>
                            <div class="slide-inner">
                                <div class="image"><a href="plagas.html"><img src="{{ asset('template-web/image/product/producto06.jpg') }}" alt="Maquinarias" /></a></div>
                                <div class="name"><a href="plagas.html">Control de plaga</a></div>
                                <div class="clear"></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="carousel">
        <ul class="jcarousel-skin-opencart">
            <li><a href="#"><img src="{{ asset('template-web/image/product/responsive1.jpg') }}"></a></li>
            <li><a href="#"><img src="{{ asset('template-web/image/product/responsive2.jpg') }}"></a></li>
            <li><a href="#"><img src="{{ asset('template-web/image/product/responsive3.jpg') }}"></a></li>
            <li><a href="#"><img src="{{ asset('template-web/image/product/responsive4.jpg') }}"></a></li>
            <li><a href="#"><img src="{{ asset('template-web/image/product/responsive5.jpg') }}"></a></li>
            <li><a href="#"><img src="{{ asset('template-web/image/product/responsive6.jpg') }}"></a></li>
        </ul>
    </section>


@endsection