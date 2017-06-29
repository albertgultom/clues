<header>
    <div class="logo left">
        {{-- <img src="{{ asset('img/clues-logo.png') }}" alt="" class="responsive-img"> --}}
        <a href="{{ url('') }}" class="clues">CLUES</a>
    </div>
    <div class="menu right">
        <ul class="navq">
            @if (Auth::check())
            <li class="action" style="margin: 0 38px;">
                @if (Auth::user()->status == 'guru')
                <a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal</a>
                @else
                <a href="{{ url('question') }}">Kerjakan Soal</a>
                @endif
            </li>
            <li class="avatar">
                <a href="#" id="toggle">
                    @if (Auth::user()->avatar == '')
                    <img class="responsive-img circle" id="avaPic" src="{{ asset('images/default_pic.png') }}" alt="">
                    @else
                    <img class="responsive-img circle" src="{{ Auth::user()->avatar }}" alt="">
                    @endif
                </a>
                <div class="dropdown-field">
                    <ul class="dropdown-list">
                        @if (Auth::user()->status == 'guru')
                        <li><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Soal Baru</a></li>
                        <li><a href="{{ url('question') }}">Lihat Soal</a></li>
                        <div class="divider" style="margin: 3px 0;"></div>
                        @else
                        <li><a href="{{ url('question') }}">Lihat Soal</a></li>
                        <div class="divider" style="margin: 3px 0;"></div>
                        @endif
                        <li><a href="{{ url('user') }}">Profile</a></li>
                        <li><a href="{{ url('settings') }}">Pengaturan</a></li>
                        <li><a href="{{ url('logout') }}">Keluar</a></li>
                    </ul>
                </div>
            </li>
            {{-- <li><a href="{{ url('logout') }}">Logout</a></li> --}}
            @else
            <li><a href="{{ url('register') }}">Daftar</a></li>
            <li><a href="{{ url('login') }}">Masuk</a></li>
            @endif
        </ul>
    </div>
</header>