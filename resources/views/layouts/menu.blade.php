<li class="{{ Request::is('*users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>@lang('menu.Users')</span></a>
</li>
<li class="{{ Request::is('notifications*') ? 'active' : '' }}">
    <a href="{{ route('notifications.index') }}"><i class="fa fa-edit"></i><span>Notifications</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('donationOrders*') ? 'active' : '' }}">
    <a href="{{ route('donationOrders.index') }}"><i class="fa fa-edit"></i><span>Donation Orders</span></a>
</li>

<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{{ route('posts.index') }}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('contactUsMessages*') ? 'active' : '' }}">
    <a href="{{ route('contactUsMessages.index') }}"><i class="fa fa-edit"></i><span>Contact Us Messages</span></a>
</li>

<li class="{{ Request::is('governorates*') ? 'active' : '' }}">
    <a href="{{ route('governorates.index') }}"><i class="fa fa-edit"></i><span>Governorates</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{{ route('cities.index') }}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('bloodTypes*') ? 'active' : '' }}">
    <a href="{{ route('bloodTypes.index') }}"><i class="fa fa-edit"></i><span>Blood Types</span></a>
</li>

<li class="{{ Request::is('clientNotifications*') ? 'active' : '' }}">
    <a href="{{ route('clientNotifications.index') }}"><i class="fa fa-edit"></i><span>Client Notifications</span></a>
</li>

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}"><i class="fa fa-edit"></i><span>Settings</span></a>
</li>

<li class="{{ Request::is('clientPosts*') ? 'active' : '' }}">
    <a href="{{ route('clientPosts.index') }}"><i class="fa fa-edit"></i><span>Client Posts</span></a>
</li>

<li class="{{ Request::is('clientGovernorates*') ? 'active' : '' }}">
    <a href="{{ route('clientGovernorates.index') }}"><i class="fa fa-edit"></i><span>Client Governorates</span></a>
</li>

<li class="{{ Request::is('bloodTypeClients*') ? 'active' : '' }}">
    <a href="{{ route('bloodTypeClients.index') }}"><i class="fa fa-edit"></i><span>Blood Type Clients</span></a>
</li>

