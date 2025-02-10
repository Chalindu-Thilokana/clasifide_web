@if(Auth::check() && Auth::user()->userType == 'user')
@include('user.user_dashbord')
@endif
@if(Auth::check() && Auth::user()->userType == 'admin')
@include('addmin.admin_dashbord')
@endif
<div class="flex-1 ml-64">
@include('profile.show')

</div>