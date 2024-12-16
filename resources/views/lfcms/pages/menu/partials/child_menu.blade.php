<li class="dd-item" data-id="{{ $child['id'] }}">
  <div class="dd-handle">{{ $child['content'] }}</div>
  
  @if(!empty($child['children']))
      <ol class="dd-list">
          @foreach($child['children'] as $subChild)
              @include('lfcms.pages.menu.partials.child_menu', ['child' => $subChild])
          @endforeach
      </ol>
  @endif
</li>
