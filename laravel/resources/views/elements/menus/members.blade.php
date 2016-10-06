<div class="avatar-area">
  <div class="avatar avatar-small">
    <img src="{{ asset('images/profils/'.(!Auth::user()->profile_pic ? DEFAULT_PROFILE_PIC : Auth::user()->profile_pic)) }}" alt="Image de profil" />
  </div>
  <div>
    <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
    <small>{{ Auth::user()->pseudo }}</small>
  </div>
</div>
<div id="member-actions">
  <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-sign-out" title="Logout"></i></a>
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
  <a href="{{ route('user.dashboard') }}"><i class="fa-home" title="Dashboard"></i></a>
  <a href="{{ route('user.preferences') }}"><i class="fa-sliders" title="Preferences"></i></a>
  <a href="{{ route('user.personnal_infos') }}"><i class="fa-pencil" title="Personnal informations"></i></a>
</div>
<ul >
  <li><a href="{{ route('user.comment.index') }}"><i class="fa fa-fw fa-list"></i> Manage comments</a></li>
  <li><a href="{{ route('user.tag.index') }}"><i class="fa fa-fw fa-list"></i> Manage my tags</a></li>
  <li><a href="{{ route('user.vote.index') }}"><i class="fa fa-fw fa-list"></i> Manage my votes</a></li>
  @role(('photograph'))
  <li class="title">Events</li>
  <li><a href="{{ route('user.event.index') }}"><i class="fa fa-fw fa-list"></i> Manage the events</a></li>
  <li><a href="{{ route('user.event.create') }}"><i class="fa fa-fw fa-plus"></i> Add</a></li>
  <li class="title">Photos</li>
  <li><a href="{{ route('user.photo.index') }}"><i class="fa fa-fw fa-list"></i> Manage</a></li>
  <li><a href="{{ route('user.photo.create') }}"><i class="fa fa-fw fa-list"></i> Add</a></li>
  @endrole
</ul>
