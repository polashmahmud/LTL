<div class="card-body">
    <h4 class="subheader">General settings</h4>
    <div class="list-group list-group-transparent">
        <a href="{{ route('settings.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('settings') ? 'active' : '' }}">General
            Settings</a>
        <a href="{{ route('settings.mail.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/mail') ? 'active' : '' }}">Mail
            Settings</a>
        <a href="{{ route('settings.sms.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/sms') ? 'active' : '' }}">SMS
            Settings</a>
    </div>
</div>
