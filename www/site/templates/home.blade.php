@extends('layouts.master')

@section('content')
			<h1>{{ $page->title()->html() }}</h1>
			@customhtml('test')
			@testdir('test')
			@if ($page->image())
				<img src="{{ $page->image()->resize(10)->url() }}" data-src="{{ $page->image()->url() }}" class="lazyload blur-up" alt="{{ $page->image()->title() }}"/>
			@endif
@endsection