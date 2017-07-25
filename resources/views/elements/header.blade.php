<header>
    <div class="logo left">
        {{-- <img src="{{ asset('img/clues-logo.png') }}" alt="" class="responsive-img"> --}}
        <a href="{{ url('') }}" class="clues">CLUES</a>
        @if (Auth::check())
        <div class="search">
            <form action="{{ url('search') }}" method="GET">
                <span class="glyphicon glyphicon-search red-clues"></span>
                <input placeholder="Cari Soal/User" name="keyword" type="text">
            </form>
        </div>
        @endif
    </div>
    <div class="menu right">
        <ul class="navq">
            @if (Auth::check())
            <li class="action" style="margin: 0 10px;">
                <a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal</a>
            </li>
           {{--  <li class="action" style="margin: 0 10px;">
                <a href="{{ url('search') }}">Kerjakan Soal</a>
            </li> --}}
            <li>
                <a href="#" id="toggle" class="action" style="margin: 0 10px;">
                    @if ($notifcount > 0)
                    <span class="head-notif" style="position: absolute; height: 10px; width: 10px; background-color: #dd7a78; border-radius: 50%;"></span> 
                    @endif
                    <span id="notif" style="margin: 0;" class="glyphicon glyphicon-bell red"></span>
                </a>
                <div class="dropdown-field-notif">
                    <ul class="dropdown-list-notif">
                        @if ($notif->count() == 0)
                        <li class="list" style="margin: 0;">
                            <p class="center">Belum ada notifikasi.</p>
                        </li>
                        @endif
                        @foreach ($notif as $a)
                        <li class="list" style="margin: 0;">
                            <div style="width: 34px; height: 34px; position: absolute; display: inline-block;">
                                <a href="{{ url('user') }}/{{ $a->notifBy->username}}">
                                    <img src="{{ $a->notifBy->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.$a->notifBy->avatar.'') }}" class="responsive-img circle" alt="">
                                </a>
                            </div>
                            <div style="display: inline-block; margin-left: 40px;">
                                @if ($a->type == 'like')
                                <div>
                                    <a href="{{ url('user') }}/{{ $a->notifBy->username}}"><strong>{{$a->notifBy->username}}</strong></a> Menyukai soal anda : <a href="{{ url('user') }}">{{ $a->questionset->name}}</a>
                                </div>
                                @elseif($a->type == 'follow')
                                <div>
                                    <a href="{{ url('user') }}/{{ $a->notifBy->username}}"><strong>{{$a->notifBy->username}}</strong></a> Mengikuti anda.
                                </div>
                                @endif
                                <div class="date-notif">{{$a->created_at->diffForHumans()}}</div>
                            </div>
                            @if ($a->read == '1')
                            <span class="read" data-id="{{$a->id}}" style="position: absolute; height: 10px; right: 7px; top: 18px; width: 10px; cursor: pointer; background-color: #dd7a78; border-radius: 50%;"></span> 
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" id="toggle">
                    <div class="avatar circle">
                        <img class="responsive-img" id="avaPic" src="{{ Auth::user()->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.Auth::user()->avatar.'') }}" alt="">
                    </div>
                </a>
                <div class="dropdown-field">
                    <ul class="dropdown-list">

                        <li><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Soal Baru</a></li>
                        {{-- <li><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Materi" data-body="{{ url('article') }}">Tulis Materi/Artikel</a></li> --}}
                        <div class="divider" style="margin: 3px 0;"></div>
                        <li><a href="{{ url('user') }}">Profile</a></li>
                        <li><a href="{{ url('settings') }}">Pengaturan</a></li>
                        <li><a href="{{ url('logout') }}">Keluar</a></li>
                    </ul>
                </div>
            </li>
            {{-- <li><a href="{{ url('logout') }}">Logout</a></li> --}}
            @else
            <li class="action" style="margin-top: 21px;"><a style="margin: 0 10px;" href="{{ url('login') }}">Masuk</a></li>
            @endif
        </ul>
    </div>
</header>









