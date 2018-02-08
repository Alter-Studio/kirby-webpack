<div class="header-mobile">
  <a href="{{ html($site->url()) }}">
    {{ $site->title()->html() }}
  </a>
  <div class="hamburger">
    <button>
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</div>
<div class="menu-mobile">
  <nav>
    <ul>
      <li>
        <a href="{{ html($site->url()) }}">
          {{ $site->title()->html() }}
        </a>
      </li>
      @php($items = $pages->not('home')->visible())
      @if ($items->count())
        @foreach ($items as $item)
          <li>
            <a{{ e($item->isOpen(), ' class="active"') }} href="{{ $item->url() }}">
              {{ $item->title()->html() }}
            </a>
          </li>
        @endforeach
      @endif
    </ul>
  </nav>
</div>