<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper">
        <a href="index.html">
            <img width="80%" style="margin-top: 8px;" src="{{ asset('backend/images/logo/logo.svg') }}" alt="">
        </a>
        <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" style="border-radius: 20%;" src="{{ asset('backend/images/logo/logo-icon.png') }}" alt=""></a></div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="index.html"><img class="img-fluid" style="border-radius: 20%;" src="{{ asset('backend/images/logo/logo-icon.png') }}" alt=""></a>
                    <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                    <div>
                        <h6>Pinned</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-1">General</h6>
                    </div>
                </li>
                <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"> </i>
                    <a href="{{ route('admin.dashboard.index') }}" 
                    @if( Route::currentRouteName() === "admin.dashboard.index" ) 
                        style="background-color: rgba(255, 255, 255, 0.2); border-radius: 30px; display: block;" 
                    @endif
                    >
                        <i class="fa fa-tachometer" style="color: white;"></i>
                        <span>Dashboard </span>
                    </a>

                </li>

                @foreach( $sidebarModules as $module)
                @if(can($module->key))
                <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"> </i>
                    <a class="sidebar-link sidebar-title" @if ($module->route != null) href="{{ route($module->route) }}" @endif
                    @if( in_array(Route::currentRouteName(), $module->subModule->pluck("route")->toArray()) ) 
                            style="background-color: rgba(255, 255, 255, 0.2); border-radius: 30px;" 
                    @endif    
                    >
                        <i class="fa fa-users"></i>
                        <span>{{ $module->name }}</span>
                    </a>

                    @if ($module->route == null)
                    <ul class="sidebar-submenu" 
                        @if( in_array(Route::currentRouteName(), $module->subModule->pluck("route")->toArray()) ) 
                            style="display: block;" 
                        @else 
                            style="display: none;" 
                        @endif
                    >
                        
                        @foreach($module->subModule->sortBy('position', false) as $subModule)
                        @if(can($subModule->key))
                        <li><a href="{{ route($subModule->route) }}" >{{ $subModule->name }} </a></li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                    
                </li>
                @endif
                @endforeach

            </ul>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</div>