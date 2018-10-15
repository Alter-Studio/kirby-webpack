<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    {{-- Twitter Meta --}}
    <meta name="twitter:card" content="summary" />
    {{-- Open Graph Meta --}}
    <meta property="og:url" content="{{$page->url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$page->title()}}" />
    @if($page->metadescription()->isNotEmpty())
      <meta property="og:description" content="{{$page->metadescription()}}" />
    @else
      <meta property="og:description" content="{{page('home')->metadescription()}}" />
    @endif
    @if($page->socialimage()->isNotEmpty())
      <meta property="og:image" content="{{$page->image($page->socialimage())->resize(1200)->url()}}" />
    @endif
    {{-- Favicon | Generate here: https://realfavicongenerator.net/ --}}
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/images/favicon/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">

    {{ liveCSS('assets/bundle.css') }}

    {{-- Page Titles --}}
    @if($page->isHomePage())
      <title>{{ $site->title()->html() }}</title>
    @else
      <title>{{ $site->title()->html() }} | {{ $page->title()->html() }}</title>
    @endif
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
    {{-- Google Analytics --}}
    {{ $site->trackingcode()->html() }}
    {{ js('assets/bundle.js') }}
    </body>
</html>
