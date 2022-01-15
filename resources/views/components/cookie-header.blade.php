<div>
    <nav class="navbar navbar-expand-lg navbar-light {{ ($status === 'success') ? 'bg-light' : 'bg-danger'}}">
        <div class="container-fluid">
            <span class="navbar-brand">CookieS</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @foreach($links as $rout => $link)
                        <a class="nav-link {{ ($link['selected']) ? 'active' : '' }}" href="{{ route($rout)  }}">{{ $link['langName'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
</div>
