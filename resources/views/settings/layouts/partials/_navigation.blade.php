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
        <a href="{{ route('settings.google.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/google') ? 'active' : '' }}">Google Service</a>
        <a href="{{ route('settings.menus.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/menus') ? 'active' : '' }}">Menu Builder</a>
        <a href="{{ route('settings.roles.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/roles') ? 'active' : '' }}">Role</a>
        <a href="{{ route('settings.backups.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/backups') ? 'active' : '' }}">Backups</a>
        <a href="{{ route('settings.crud-generator.index') }}"
           class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('*/crud-generator') ? 'active' : '' }}">CRUD Generator</a>
    </div>
</div>
