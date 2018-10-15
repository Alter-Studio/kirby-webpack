@extends('layouts.master')

@section('content')
			<h1>{{ $page->title()->html() }}</h1>
			@if ($page->mainimage()->isNotEmpty())
				@php
					$img = $page->image($page->mainimage());
					$dimensions = $img->dimensions();
				@endphp
				<div class="ratio-box" style="padding-bottom:calc({{$img->dimensions()->height()}} / {{$img->dimensions()->width()}} * 100%)">
			    <img
			        data-sizes="auto"
			        data-srcset="{{ $img->resize(175)->url() }} 175w,
			        {{ $img->resize(350)->url() }} 350w,
			        {{ $img->resize(700)->url() }} 700w,
			        {{ $img->resize(1400)->url() }} 1400w"
			        data-src="{{ $img->resize(700)->url() }}"
			        class="lazyload" />
				</div>
			@endif
			@icon('twitter')
@endsection
