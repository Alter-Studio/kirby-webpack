<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    {{ $page->metaTags() }}
    <meta name="keywords" content="{{ $site->keywords()->html() }}">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    {{ liveCSS('assets/bundle.css') }}
    <title>{{ $site->title()->html() }} | {{ $page->title()->html() }}</title>
</head>

<body>
    <div class="sprites">
        @php
        $svg_file = file_get_contents('./assets/icons/sprites.svg');
        echo $svg_file;
        @endphp
    </div>
    <header>
        @include('snippets.header-desktop')
        @include('snippets.header-mobile')
    </header>
    <div id="main" class="container">
        <div class="wrapper js-current" data-namespace="{{ $page->intendedTemplate() }}">
            @yield('content')
        </div>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $site->trackingcode()->html() }}"></script>
    <script>
    const trackingCode = '{{ $site->trackingcode()->html() }}';
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', trackingCode);
    </script>    
    {{ js('assets/bundle.js') }}
    </body>
</html>
