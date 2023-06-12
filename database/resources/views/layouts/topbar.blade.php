<div class="header">
    <p><span id="time"></span> {{ Auth::user()->name }}</p>
    <a href="{{ route('signout') }}">Logout</a>
</div>
