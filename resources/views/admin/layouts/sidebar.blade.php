@php
    $nxRole = Auth::user()->permission;
    $nxPerm = $nxRole ? (json_decode($nxRole->permission, true) ?: []) : [];
    $can = fn($group, $key) => isset($nxPerm[$group][$key]);

    $postsActive = Request::is('admin/posts*');
    $servicesActive = Request::is('admin/services*');
    $projectsActive = Request::is('admin/projects*');
    $storiesActive = Request::is('admin/stories*');
    $membersActive = Request::is('admin/members*');
    $volunteersActive = Request::is('admin/volunteers*');
@endphp
<!-- BEGIN: Sidebar -->
<aside class="nx-sidebar" id="nxSidebar">
    <a class="nx-brand" href="{{route('admin.dashboard')}}">
        <span class="nx-brand-logo"><img src="{{asset(general()->favicon())}}" alt="{{general()->title}}"></span>
        <span class="nx-brand-text">
            <strong>{{Str::limit(general()->title ?: 'Admin Panel', 22)}}</strong>
            <small>Admin Panel</small>
        </span>
    </a>

    <nav class="nx-nav">
        <ul>
            <li class="nx-nav-label">General</li>

            <li class="nx-item {{Request::is('admin/dashboard')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.dashboard')}}"><i class="fa-solid fa-gauge-high"></i><span>Dashboard</span></a>
            </li>

            <li class="nx-item {{Request::is('admin/my-profile')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.myProfile')}}"><i class="fa-solid fa-user-tie"></i><span>My Profile</span></a>
            </li>

            @if($nxRole)

            @if($can('posts','list') || $can('postsOther','list'))
            <li class="nx-item nx-has-sub {{$postsActive ? 'active open' : ''}}">
                <a class="nx-link" href="javascript:void(0)"><i class="fa-solid fa-newspaper"></i><span>News & Events</span><i class="fa-solid fa-chevron-right nx-caret"></i></a>
                <ul class="nx-sub">
                    @if($can('posts','list'))
                    <li class="{{$postsActive && !Request::is('admin/posts/categories*') && !Request::is('admin/posts/tags*') && !Request::is('admin/posts/comments*') ? 'active' : ''}}">
                        <a href="{{route('admin.posts')}}">All News & Events</a>
                    </li>
                    @endif
                    @if($can('posts','add'))
                    <li><a href="{{route('admin.postsAction',['create'])}}">Add News / Event</a></li>
                    @endif
                    @if($can('postsOther','category'))
                    <li class="{{Request::is('admin/posts/categories*')? 'active' : ''}}"><a href="{{route('admin.postsCategories')}}">Categories</a></li>
                    @endif
                    @if($can('postsOther','tags'))
                    <li class="{{Request::is('admin/posts/tags*')? 'active' : ''}}"><a href="{{route('admin.postsTags')}}">Tags</a></li>
                    @endif
                    @if($can('postsOther','comments'))
                    <li class="{{Request::is('admin/posts/comments*')? 'active' : ''}}"><a href="{{route('admin.postsCommentsAll')}}">Comments</a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if($can('services','list') || $can('servicesOthers','category'))
            <li class="nx-item nx-has-sub {{$servicesActive ? 'active open' : ''}}">
                <a class="nx-link" href="javascript:void(0)"><i class="fa-solid fa-bullhorn"></i><span>Campaigns</span><i class="fa-solid fa-chevron-right nx-caret"></i></a>
                <ul class="nx-sub">
                    @if($can('services','list'))
                    <li class="{{$servicesActive && !Request::is('admin/services/categories*') ? 'active' : ''}}"><a href="{{route('admin.services')}}">All Campaigns</a></li>
                    @endif
                    @if($can('services','add'))
                    <li><a href="{{route('admin.servicesAction','create')}}">New Campaign</a></li>
                    @endif
                    @if($can('servicesOthers','category'))
                    <li class="{{Request::is('admin/services/categories*')? 'active' : ''}}"><a href="{{route('admin.servicesCategories')}}">Categories</a></li>
                    @endif
                </ul>
            </li>
            @endif

            <li class="nx-item nx-has-sub {{$projectsActive ? 'active open' : ''}}">
                <a class="nx-link" href="javascript:void(0)"><i class="fa-solid fa-diagram-project"></i><span>Projects</span><i class="fa-solid fa-chevron-right nx-caret"></i></a>
                <ul class="nx-sub">
                    <li class="{{$projectsActive && !Request::is('admin/projects/create*') ? 'active' : ''}}"><a href="{{route('admin.projects')}}">All Projects</a></li>
                    <li><a href="{{route('admin.projectsAction', 'create')}}">New Project</a></li>
                </ul>
            </li>

            <li class="nx-item nx-has-sub {{$storiesActive ? 'active open' : ''}}">
                <a class="nx-link" href="javascript:void(0)"><i class="fa-solid fa-trophy"></i><span>Success Stories</span><i class="fa-solid fa-chevron-right nx-caret"></i></a>
                <ul class="nx-sub">
                    <li class="{{$storiesActive && !Request::is('admin/stories/create*') ? 'active' : ''}}"><a href="{{route('admin.stories')}}">All Stories</a></li>
                    <li><a href="{{route('admin.storiesAction', 'create')}}">New Story</a></li>
                </ul>
            </li>

            <li class="nx-item {{$volunteersActive ? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.volunteers')}}"><i class="fa-solid fa-hand-holding-heart"></i><span>Volunteers</span></a>
            </li>

            @if($can('members','list'))
            <li class="nx-item nx-has-sub {{$membersActive ? 'active open' : ''}}">
                <a class="nx-link" href="javascript:void(0)"><i class="fa-solid fa-users"></i><span>Members</span><i class="fa-solid fa-chevron-right nx-caret"></i></a>
                <ul class="nx-sub">
                    <li class="{{$membersActive && !Request::is('admin/members/create*') ? 'active' : ''}}"><a href="{{route('admin.members')}}">All Members</a></li>
                    @if($can('members','add'))
                    <li><a href="{{route('admin.membersAction', 'create')}}">Add Member</a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if($can('pages','list'))
            <li class="nx-item {{Request::is('admin/pages*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.pages')}}"><i class="fa-solid fa-copy"></i><span>Pages</span></a>
            </li>
            @endif

            <li class="nx-item {{Request::is('admin/certificates*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.certificates')}}"><i class="fa-solid fa-certificate"></i><span>Certificates</span></a>
            </li>

            @if($can('medies','list'))
            <li class="nx-item {{Request::is('admin/medies*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.medies')}}"><i class="fa-solid fa-photo-film"></i><span>Media Library</span></a>
            </li>
            @endif

            @if($can('clients','list') || $can('brands','list') || $can('sliders','list') || $can('galleries','list') || $can('menus','list') || $can('themeSetting','list'))
            <li class="nx-nav-label">Website</li>

            @if($can('clients','list'))
            <li class="nx-item {{Request::is('admin/clients*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.clients')}}"><i class="fa-solid fa-handshake"></i><span>Clients</span></a>
            </li>
            @endif

            @if($can('brands','list'))
            <li class="nx-item {{Request::is('admin/brands*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.brands')}}"><i class="fa-solid fa-chess-rook"></i><span>Brands</span></a>
            </li>
            @endif

            @if($can('sliders','list'))
            <li class="nx-item {{Request::is('admin/sliders*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.sliders')}}"><i class="fa-solid fa-panorama"></i><span>Sliders</span></a>
            </li>
            @endif

            @if($can('galleries','list'))
            <li class="nx-item {{Request::is('admin/galleries*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.galleries')}}"><i class="fa-solid fa-images"></i><span>Galleries</span></a>
            </li>
            @endif

            @if($can('menus','list'))
            <li class="nx-item {{Request::is('admin/menus*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.menus')}}"><i class="fa-solid fa-bars-staggered"></i><span>Menus Setting</span></a>
            </li>
            @endif

            @if($can('themeSetting','list'))
            <li class="nx-item {{Request::is('admin/theme-setting*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.themeSetting')}}"><i class="fa-solid fa-sliders"></i><span>Theme Setting</span></a>
            </li>
            @endif
            @endif

            @if($can('adminUsers','list') || $can('adminRoles','list') || $can('users','list') || $can('subscribe','list'))
            <li class="nx-nav-label">Users</li>

            @if($can('adminUsers','list'))
            <li class="nx-item {{Request::is('admin/users/admin*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.usersAdmin')}}"><i class="fa-solid fa-user-shield"></i><span>Administrator Users</span></a>
            </li>
            @endif

            @if($can('adminRoles','list'))
            <li class="nx-item {{Request::is('admin/users/role*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.userRoles')}}"><i class="fa-solid fa-key"></i><span>Roles &amp; Permissions</span></a>
            </li>
            @endif

            @if($can('users','list'))
            <li class="nx-item {{Request::is('admin/users/customer*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.usersCustomer')}}"><i class="fa-solid fa-users"></i><span>Customer Users</span></a>
            </li>
            @endif

            @if($can('subscribe','list'))
            <li class="nx-item {{Request::is('admin/subscribes*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.subscribes')}}"><i class="fa-solid fa-envelope-open-text"></i><span>Subscribers</span></a>
            </li>
            @endif
            @endif

            @if($can('appsSetting','general') || $can('appsSetting','mail') || $can('appsSetting','sms') || $can('appsSetting','social'))
            <li class="nx-nav-label">Settings</li>

            @if($can('appsSetting','general'))
            <li class="nx-item {{Request::is('admin/setting/general*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.setting','general')}}"><i class="fa-solid fa-gear"></i><span>General Setting</span></a>
            </li>
            @endif

            @if($can('appsSetting','mail'))
            <li class="nx-item {{Request::is('admin/setting/mail*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.setting','mail')}}"><i class="fa-solid fa-envelope"></i><span>Mail Setting</span></a>
            </li>
            @endif

            @if($can('appsSetting','sms'))
            <li class="nx-item {{Request::is('admin/setting/sms*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.setting','sms')}}"><i class="fa-solid fa-comment-sms"></i><span>SMS Setting</span></a>
            </li>
            @endif

            @if($can('appsSetting','social'))
            <li class="nx-item {{Request::is('admin/setting/social*')? 'active' : ''}}">
                <a class="nx-link" href="{{route('admin.setting','social')}}"><i class="fa-solid fa-share-nodes"></i><span>Social Setting</span></a>
            </li>
            @endif
            @endif

            @endif
        </ul>
    </nav>

    <div class="nx-side-foot">
        <a class="nx-support" href="tel:+8801628092045">
            <i class="fa-solid fa-headset"></i>
            <div>
                <small>Support Center</small>
                <strong>+8801628-092045</strong>
            </div>
        </a>
    </div>
</aside>
<div class="nx-overlay" id="nxOverlay"></div>
<!-- END: Sidebar -->
