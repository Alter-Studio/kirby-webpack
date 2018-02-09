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

c::set('blade.directives', [
	'customhtml' => function($value){return "<p>Some custom HTML</p>";},
	'testdir' => function($value){ return '<p>TEST DIRECTIVE</p>';}
]);