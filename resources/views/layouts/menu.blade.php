

<li class="nav-item">
    <a href="{{ route('studentInfos.index') }}"
       class="nav-link {{ Request::is('studentInfos*') ? 'active' : '' }}">
        <p>Student Infos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


