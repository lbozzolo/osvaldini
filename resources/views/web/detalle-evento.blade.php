@extends('web.layout')


@section('content')

    <!-- Main Content -->
    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">
                        <!-- PROJECT DETAIL -->
                        <div class="row-project-detail">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobile="60" data-smobile="60"></div>
                                        <div class="detail-inner-wrap">
                                            <div class="detail-info">
                                                <div class="content-info">
                                                    <div class="themesflat-headings style-2 clearfix">
                                                        <h2 class="heading line-height-62">{!! $evento->title !!}</h2>
                                                        <div class="sep has-width w80 accent-bg clearfix">
                                                        </div>
                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="34" data-mobile="35" data-smobile="35"></div>
                                                    <p>{!! $evento->body !!}</p>
                                                </div><!-- /.content-info -->


                                                <div class="themesflat-spacer clearfix" data-desktop="46" data-mobile="35" data-smobile="35"></div>


                                            </div>
                                            <div class="detail-gallery">
                                                <div class="themesflat-spacer clearfix" data-desktop="21" data-mobile="21" data-smobile="21"></div>
                                                <div class="themesflat-gallery style-2 has-arrows arrow-center arrow-circle offset-v-82 has-thumb w185 clearfix" data-gap="0" data-column="1" data-column2="1" data-column3="1" data-auto="false">
                                                    <div class="owl-carousel owl-theme">

                                                        @foreach($evento->images_ordered as $imagen)


                                                            <div class="gallery-item" >
                                                                <div class="inner">
                                                                    <div class="thumb">
                                                                        <img src="{{ route('imagenes.ver', $imagen->path) }}" alt="{!! $imagen->title !!}">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @endforeach

                                                    </div>
                                                </div><!-- /.themesflat-cousel-box -->
                                            </div>
                                        <div class="themesflat-spacer clearfix" data-desktop="58" data-mobile="60" data-smobile="60"></div>
                                    </div>
                                </div><!-- /.row -->

                            </div><!-- /.container -->
                        </div>
                        <!-- END PROJECT DETAIL -->
                    </div><!-- /.page-content -->

                </div><!-- /#inner-content -->
            </div><!-- /#site-content -->
        </div><!-- /#content-wrap -->
    </div><!-- /#main-content -->

@endsection