<div class="header-desktop">
    <nav>
      <ul class="menu-desktop">
        <li class="menu-desktop__item">
          <a href="{{ html($site->url()) }}">
            {{ $site->title()->html() }}
          </a>
        </li>
        @php($items = $pages->not('home')->visible())
        @if ($items->count())
          @foreach ($items as $item)
            <li class="menu-desktop__item">
              <a{{ e($item->isOpen(), ' class="active"') }} href="{{ $item->url() }}">
                {{ $item->title()->html() }}
              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </nav>
</div>
