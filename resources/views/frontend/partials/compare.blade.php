<a href="{{ route('compare') }}" class="nav-link search_trigger"><i class="ti-control-shuffle"></i>
    @if(Session::has('compare'))
        <span class="cart_count">{{(isset($cart) && count($cart) > 0) ? count($cart) : 0 }}</span>
    @endif
</a>