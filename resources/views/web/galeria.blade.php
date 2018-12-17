@extends('web.layout')


@section('content')

    <section class="parallax_window_in short" data-parallax="scroll" data-image-src="{{ asset('template-web/assets/img/subheader_in_4.jpg') }}" data-natural-width="1400" data-natural-height="400">
        <div id="sub_content_in">
            <div class="container">
                <h1>Galeria de Imágenes</h1>
                <p></p>
            </div>
        </div>
    </section><!-- End section -->

    <div id="position">
        <div class="container">

        </div>
    </div><!-- End position -->

    <main>
        <div class="container margin_60">
            <h2 class="main_title"><em></em>Artículos de dermocosmética en Pinamar<span>Conozca la variedad de productos de dermocosmética que tenemos a su disposición. Recuerde que los productos de higiene y de belleza personal ofrecen un universo de posibilidades para verse siempre mejor, solo se trata de elegir el correcto y para eso puede contar con nosotros, Farmacia Osvaldini, más de 30 años de experiencia nos avala.</span></h2>
            <div class="grid">
                <ul class="magnific-gallery">
                    @forelse($images as $imagen)

                        <li>
                            <figure>
                                <img src="{{ route('imagenes.ver', $imagen->path) }}" class="img-responsive" alt="{!! $imagen->title !!}" style="margin: 0px auto;">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="{{ asset('imagenes/'.$imagen->path) }}" title="Farmacia Osvaldini" data-effect="mfp-zoom-in">
                                            <i class="pe-7s-albums"></i>
                                            <p>Ampliar Imagen</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>

                    @empty
                        <li>
                            <figure>
                                <img src="{{ asset('template-web/assets/img/gallery/1.jpg') }}" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <i class="pe-7s-albums"></i>
                                        <p>Ampliar Imagen</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </li><li>
                            <figure>
                                <img src="{{ asset('template-web/assets/img/gallery/1.jpg') }}" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <i class="pe-7s-albums"></i>
                                        <p>Ampliar Imagen</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </li><li>
                            <figure>
                                <img src="{{ asset('template-web/assets/img/gallery/1.jpg') }}" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <i class="pe-7s-albums"></i>
                                        <p>Ampliar Imagen</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endforelse

                </ul>
            </div>
            <!-- /grid gallery -->
        </div>
        <!--/container-->

        <!-- /bg_color_1 -->
    </main><!--/main-->

@endsection