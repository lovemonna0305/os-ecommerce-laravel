<a href="{{ route('compare') }}" class="nav-link search_trigger"><i class="ti-control-shuffle"></i>
    @if(Session::has('compare'))
        <span class="cart_count">{{ count(Session::get('compare'))}}</span>
    @endif
</a>