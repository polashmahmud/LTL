<div class="card-body">
    <h4 class="subheader">Personal Settings</h4>
    <div class="list-group list-group-transparent">
        <a href="{{ route('account.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('account') ? 'active' : '' }}">My Account</a>
        <a href="{{ route('account.password.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/password') ? 'active' : '' }}">Change Password</a>
        <a href="{{ route('account.email.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/email') ? 'active' : '' }}">Change Email</a>
        <a href="{{ route('account.notifications.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/notifications') ? 'active' : '' }}">My Notifications</a>
    </div>
</div>
