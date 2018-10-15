<?php

@include __DIR__ . DS . 'license.php';

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/



/*

---------------------------------------
Panel
---------------------------------------

*/


c::set('panel.install', true);
c::set('debug', true);
c::set('rewrite', true);


/*
---------------------------------------
Meta Tags
---------------------------------------

For use with https://github.com/pedroborges/kirby-meta-tags

*/

// c::set('meta-tags.default', [
//     'title' => function($page) {
//         return $page->isHomePage()
//             ? site()->title()
//             : site()->title() . ' | ' . $page->title();
//     },
//     'meta' => [
//         'description' => function($page) { if($page->metadescription()){return $page->metadescription();}else{return site()->description();}; }
//     ],
//     'link' => [
//         'canonical' => function($page) { return $page->url(); }
//     ],
//     'og' => [
//         'title' => function($page) {
//             return $page->isHomePage()
//                     ? site()->title()
//                     : site()->title() . ' | ' . $page->title();
//         },
//         'description' => site()->description(),
//         'type' => 'website',
//         'site_name' => site()->title(),
//         'url' => function($page) { return $page->url(); },
//         'image' => function($page) { return $page->twittercard()->toFile() ? $page->twittercard()->toFile()->url() : page('home')->twittercard()->toFile()->url(); }
//     ],
//     'twitter' => [
//     'card' => 'summary',
//     'site' => site()->title(),
//     'title' => site()->title(),
//     'description' => site()->description(),
//     'namespace:image' => function($site) {
//         return [
//             'image' => function($page) { return $page->twittercard()->toFile() ? $page->twittercard()->toFile()->url() : page('home')->twittercard()->toFile()->url(); },
//             'alt' => function($page) {
//                 return $page->isHomePage()
//                     ? site()->title()
//                     : site()->title() . ' | ' . $page->title();
//             }
//         ];
//     }
// ]
// ]);




/*

---------------------------------------
SSL
---------------------------------------

*/

//c::set('ssl', true);


/*

---------------------------------------
Cache
---------------------------------------

*/


// c::set('cache', true);
// c::set('cache.driver', 'file');
//c::set('cache.ignore', array('sitemap'));


/*

---------------------------------------
Panel CSS
---------------------------------------

*/


// c::set('panel.stylesheet', 'assets/styles/panel.css');


/*

---------------------------------------
Blade Directives
---------------------------------------

*/

c::set('blade.directives', [
	'icon' => function($value){
        $value = preg_replace('/(\'|&#0*39;)/', '', $value);
        $output = '<svg viewBox="0 0 100 100" class="icon icon--' . $value . '">';
        $output .= '<use xlink:href="#'.$value.'"></use>';
        $output .= '</svg>';
        return $output;
    }
]);
