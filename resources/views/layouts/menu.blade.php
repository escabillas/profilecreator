<li class="nav-item">
	<a class="nav-link {{ Request::is($user->username.'/contact')? 'active' : '' }}" href="{{ route('contact', compact('user')) }}">Contacts</a>
</li>
<li class="nav-item">
	<a class="nav-link {{ Request::is($user->username.'/skill')? 'active' : '' }}" href="{{ route('skill', compact('user')) }}">Skills</a>
</li>
<li class="nav-item">
	<a class="nav-link {{ Request::is($user->username.'/experience')? 'active' : '' }}" href="{{ route('experience', compact('user')) }}">Experiences</a>
</li>
<li class="nav-item">
	<a class="nav-link {{ Request::is($user->username.'/project')? 'active' : '' }}" href="{{ route('project', compact('user')) }}">Projects</a>
</li>
<li class="nav-item">
	<a class="nav-link {{ Request::is($user->username.'/comment')? 'active' : '' }}" href="{{ route('comment', compact('user')) }}">Comments</a>
</li>
