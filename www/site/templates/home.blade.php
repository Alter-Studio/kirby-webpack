@extends('layouts.master')

@section('content')
			<h1>{{ $page->title()->html() }}</h1>
			{{-- Responsive Image --}}
			@if ($page->mainimage()->isNotEmpty())
				@php
					$img = $page->image($page->mainimage());
					$width = $img->dimensions()->width();
					$height = $img->dimensions()->height();
				@endphp
				<div class="ratio-box" style="padding-bottom:calc({{$height}} / {{$width}} * 100%)">
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
			{{--  / Responsive Image --}}
			@icon('twitter')
@endsection
