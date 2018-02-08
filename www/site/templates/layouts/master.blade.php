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
    <header>
        @include('snippets.header-desktop')
        @include('snippets.header-mobile')
    </header>
    <div id="main">
        <div class="wrapper js-current" data-namespace="{{ $page->intendedTemplate() }}">
            @yield('content')
        </div>
    </div>
    {{ $site->trackingcode()->html() }}
    {{ js('assets/bundle.js') }}
    </body>
</html>
