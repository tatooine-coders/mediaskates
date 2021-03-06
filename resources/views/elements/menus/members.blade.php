<div class="avatar-area">
  <div class="avatar avatar-small">
    <img src="{{ asset(PROFILE_PICS_FOLDER . (!Auth::user()->profile_pic ? DEFAULT_PROFILE_PIC : Auth::user()->profile_pic)) }}" alt="Image de profil" />
  </div>
  <div>
    <div>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
    <small>{{ Auth::user()->pseudo }}</small>
  </div>
</div>
<div id="member-actions">
  <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-sign-out" title="Déconnexion"></i></a>
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
  <a href="{{ route('user.dashboard') }}"><i class="fa-home" title="Tableau de bord"></i></a>
  <a href="{{ route('user.preferences') }}"><i class="fa-sliders" title="Préférences"></i></a>
  <a href="{{ route('user.personnal_infos') }}"><i class="fa-pencil" title="Informations personnelles"></i></a>
</div>
<ul >
  <li><a href="{{ route('user.comment.index') }}"><i class="fa fa-fw fa-list"></i> Commentaires</a></li>
  <li><a href="{{ route('user.tag.index') }}"><i class="fa fa-fw fa-list"></i> Mes tags</a></li>
  <li><a href="{{ route('user.vote.index') }}"><i class="fa fa-fw fa-list"></i> Mes votes</a></li>
  @role(('photograph'))
  <li class="title">Evènements</li>
  <li><a href="{{ route('user.event.index') }}"><i class="fa fa-fw fa-list"></i> Liste des évènements</a></li>
  <li><a href="{{ route('user.event.create') }}"><i class="fa fa-fw fa-plus"></i> Nouvel évènement</a></li>
  <li class="title">Photos</li>
  <li><a href="{{ route('user.photo.create') }}"><i class="fa fa-fw fa-plus"></i> Nouvelle photo</a></li>
  @endrole
  @role(('admin'))
  <li class="title">Administration</li>
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Tableau de bord</a></li>
  @endrole
</ul>
