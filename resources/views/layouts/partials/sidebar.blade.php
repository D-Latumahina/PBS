<ul class="sidebar navbar-nav">
    <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('overview') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ㅤDashboard</span>
        </a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'incomes.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('incomes.index') }}">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>ㅤInkomen</span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'expense.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('expense.index') }}">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>ㅤUitgaven</span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'items.index' ? 'active' : '' }}" title="This is not calculate in Income/Expense">
        <a class="nav-link" href="{{ route('items.index') }}">
        <i class="fas fa-couch"></i>
        <span>ㅤMeubels</span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'notes.index' ? 'active' : '' }}" title="This is not calculate in Income/Expense">
        <a class="nav-link" href="{{ route('notes.index') }}">
        <i class="fas fa-fw fa-sticky-note"></i>
        <span>ㅤAbonnementen</span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'summary' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('summary') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>ㅤOverzicht</span></a>
    </li>
    <li class="nav-item"><a class="nav-link" action="{{ route('logout') }}" method="POST" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-power-off">    </i>
                                                     <span>ㅤUitloggen</span></a>
                                    </li>
</ul>