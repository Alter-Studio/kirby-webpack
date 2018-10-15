@php
$ignore = array('sitemap', 'error');
// send the right header
header('Content-type: text/xml; charset="utf-8"');
// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach($pages->index() as $p)
  @php
    if(in_array($p->uri(), $ignore)) continue
  @endphp
  <url>
    <loc>{{html($p->url())}}</loc>
    <lastmod>{{$p->modified('c')}}</lastmod>
    <priority>{{($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1)}}</priority>
  </url>
@endforeach
</urlset>
