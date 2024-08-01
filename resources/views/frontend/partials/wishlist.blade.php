<a href="{{ route('wishlists.index') }}" class="nav-link search_trigger"><i class="ti-heart"></i>
    @if(Auth::check() && count(Auth::user()->wishlists)>0)
        <span class="cart_count">{{ count(Auth::user()->wishlists)}}</span>
    @endif
</a>
