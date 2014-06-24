<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<head>

    <title>@section('title') Diseño y desarrollo web - juan2ramos @show</title>

    <!-- METAS -->
    <meta charset="utf-8">
    <meta name="author" content="juan2ramos"/>
    <meta name="contact" content="juan2ramos@gmail.com">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1"/>
    <meta name="keywords" content="sitios, paginas, web, bogota, diseño, desarrollo html5, ,portfolio">

    <!-- SCRIPTS -->
    <?php echo HTML::script('js/prefixfree.min.js') ?>

    <!-- STYLES -->
    <?php echo HTML::style('css/normalize.css') ?>
    <?php echo HTML::style('http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic') ?>
    <?php echo HTML::style('css/style.css') ?>
    @yield('css')

    <!-- HUMANS -->
    <link type="text/plain" rel="author" href="juan2ramos.com/humans.txt"/>


    @section('metas')
    <meta property="og:url" content="{{Request::url()}}"/>
    <meta property="og:title" content="Juan2Ramos.com "/>
    <meta property="og:description" content="Portafolio juan2ramos"/>
    <meta property="og:image" content="http://juan2ramos.com/images/ogfacebook.png"/>
    @show

</head>
<body>

<header>

    <div id="logo">

        @include('front.logo')
        <h1>juan2Ramos</h1>
    </div>

</header>
<nav>
    <a href="#diseno" id="diseno-link" data-menu="diseno" class="link"><span class="icon-brush"><p>Diseño</p></span></a>
    <a href="#desarrollo" id="desarrollo-link" data-menu="desarrollo" class="link"><span class="icon-console"><p>
                Desarrollo</p></span></a>
    <a href="#mercadeo" id="mercadeo-link" data-menu="mercadeo" class="link"><span class="icon-stats"><p>Estrategia
                Digital</p></span></a>
    <a href="#metodologia-trabajo" id="metodologia-trabajo-link" data-menu="metodologia-trabajo" class="link"><span
            class="icon-cogs"><p>Método de Trabajo</p></span></a>
    <a href="#destrezas" id="destrezas-link" data-menu="destrezas" class="link"><span class="icon-wrench"><p>
                Destrezas</p></span></a>
    <a href="#portafolio" id="portafolio-link" data-menu="portafolio" class="link"><span class="icon-cabinet"><p>
                Portafolio</p></span></a>
    <a href="#" id="contact-box"><span class="icon-mug"><p>Donde me ubicas?</p></span></a>

</nav>
@yield('contend')


<!-- SCRIPT -->
<?php
echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
echo HTML::script('js/script.js');
?>
@yield('javascript')
</body>
</html>