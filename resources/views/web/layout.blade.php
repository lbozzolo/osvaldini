<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    @include('web.partials.head')
    @yield('css')

</head>
<body>
    <div class="wrapper-box">
        <div class="main-wrapper">

            <header id="header">

                @include('web.partials.header')

            </header>
            <div id="container">
                <div id="content">

                    @yield('content')

                </div>
                <div class="clear"></div>
            </div>

        </div>
        <footer id="footer">

            @include('web.partials.footer')

        </footer>

    </div>

    @include('web.partials.scripts')

</body>
</html>