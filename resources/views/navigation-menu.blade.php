<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
  <div id="header-left" class="flex items-center">
      <div class="text-gray-800 font-semibold">
          <span class="text-primary text-xl">Blog</span> BR
      </div>
      <div class="top-menu ml-10">
          <div class="flex space-x-4">
        
              <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                  {{ __('Home') }}
              </x-nav-link>
              <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                  {{ __('Blog') }}
              </x-nav-link>
        
          </div>
      </div>
  </div>

  <div id="header-right" class="flex items-center md:space-x-6">
      {{-- @guest
          @include('layouts.partials.header-right-guest')
      @endguest

      @auth()
          @include('layouts.partials.header-right-auth')
      @endauth --}}
      @auth
          @include('layouts.partials.header-right-auth')
      @else
          @include('layouts.partials.header-right-guest')
      @endauth

  </div>
</nav>