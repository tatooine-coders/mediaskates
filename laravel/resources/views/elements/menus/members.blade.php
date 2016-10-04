<ul class="pam">
    @if (Auth::guest())
    <li class="pas"><a href="{{ url('/login') }}">Login</a></li>
    <li class="pas"><a href="{{ url('/register') }}">Register</a></li>
    @else
    <li class="pas">User {{ Auth::user()->pseudo }}</li>
    <li class="pas">
        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </li>
    @endif
</ul>
@role(('member'))
<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
<li class="title-big">Users</li>
<li class="title-sub">Comments</li>
<li>{{ link_to(route('user.comment.index'), 'Manage') }}</li>
<li class="title-sub">User</li>
<li>{{ link_to(route('user.dashboard'), 'Dashboard') }}</li>
<li>{{ link_to(route('user.preferences'), 'Preferences') }}</li>
<li>{{ link_to(route('user.personnal_infos'), 'Personnal informations') }}</li>
<li>{{ link_to(route('user.update_passwd'), 'Update password') }}</li>
<li>{{ link_to(route('user.logout'), 'Log out') }}</li>
<li>{{ link_to(route('user.close_account'), 'Close account') }}</li>
<li class="title">Tags</li>
<li>{{ link_to(route('user.tag.index'), 'Manage') }}</li>
<li class="title">Votes</li>
<li>{{ link_to(route('user.vote.index'), 'Manage') }}</li>
@role(('photograph'))
<li class="title-sub">Photograph</li>
<li class="title">Events</li>
<li>{{ link_to(route('user.event.index'), 'Manage') }}</li>
<li>{{ link_to(route('user.event.create'), 'Add') }}</li>
<li class="title">Photos</li>
<li>{{ link_to(route('user.photo.index'), 'Manage') }}</li>
<li>{{ link_to(route('user.photo.create'), 'Add') }}</li>
@endrole
</ul>
@endrole
