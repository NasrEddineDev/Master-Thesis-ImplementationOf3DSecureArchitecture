<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
    <i class="fa fa-bank" style="font-size:48px;"></i><br /> {{ __('E-Bank') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fa fa-dashboard"></i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'transactions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="fa fa-credit-card"></i>
            <p>{{ __('Transactions') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'customers' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('customers.index') }}">
        <i class="fa fa-group"></i>
            <p>{{ __('Customers') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'accounts' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('accounts.index') }}">
        <i class="fa fa-vcard"></i>
            <p>{{ __('Accounts') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'accountTypes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('accountTypes.index') }}">
        <i class="fa fa-ticket"></i>
            <p>{{ __('Account Types') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
        <i class="fa fa-cogs"></i>
          <p>{{ __('Settings') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
              <i class="fa fa-user-circle"></i>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
              <i class="fa fa-user"></i>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>