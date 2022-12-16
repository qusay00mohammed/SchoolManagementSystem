<div class="container-fluid">
  <div class="row">
    <!-- Left Sidebar start-->
    <div class="side-menu-fixed">
      <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
          <!-- menu item Dashboard-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
              <div class="pull-left"><i class="ti-home"></i><span
                  class="right-nav-text">{{ __('trans_main.dashboard') }}</span>
              </div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
              <li> <a href="index.html">Dashboard 01</a> </li>
              <li> <a href="index-02.html">Dashboard 02</a> </li>
              <li> <a href="index-03.html">Dashboard 03</a> </li>
            </ul>
          </li>
          <!-- menu title -->
          <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('trans_main.program name') }}</li>
          <!-- menu item stage-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#stage">
              <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('trans_main.school stage') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="stage" class="collapse" data-parent="#sidebarnav">
              <li><a href="{{ route('stage.index') }}">{{ __('trans_main.list school stage') }}</a></li>
            </ul>
          </li>
          <!-- menu item grade-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#grade">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.school grade') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="grade" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('grade.index') }}">{{ __('trans_main.list school grade') }}</a> </li>
            </ul>
          </li>

          <!-- menu item section-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#section">
              <div class="pull-left"><i class="ti-calendar"></i><span
                  class="right-nav-text">{{ __('trans_main.school section') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="section" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.list school section') }}</a> </li>
            </ul>
          </li>

           <!-- menu item students-->
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.school students') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="students" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.school sections') }}</a> </li>
            </ul>
          </li>

           <!-- menu item teachers-->
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.school teachers') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="teachers" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('teachers.index') }}">{{ __('trans_main.school teachers') }}</a> </li>
            </ul>
          </li>



          <!-- menu item parents-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.parents') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="parents" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('livewire.parent') }}">{{ __('trans_main.parents') }}</a> </li>
            </ul>
          </li>

          <!-- menu item accounts-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#accounts">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.accounts') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="accounts" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.accounts') }}</a> </li>
            </ul>
          </li>

          <!-- menu item attendance-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.attendance') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="attendance" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.attendance') }}</a> </li>
            </ul>
          </li>

          <!-- menu item exams-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.exams') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="exams" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.exams') }}</a> </li>
            </ul>
          </li>

          <!-- menu item library-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.library') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="library" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.library') }}</a> </li>
            </ul>
          </li>

          <!-- menu item online classes-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#online_classes">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.online classes') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="online_classes" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.online classes') }}</a> </li>
            </ul>
          </li>

          <!-- menu item settings-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.settings') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="settings" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.settings') }}</a> </li>
            </ul>
          </li>

          <!-- menu item users-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
              <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">{{ __('trans_main.users') }}</span></div>
              <div class="pull-right"><i class="ti-plus"></i></div>
              <div class="clearfix"></div>
            </a>
            <ul id="users" class="collapse" data-parent="#sidebarnav">
              <li> <a href="{{ route('section.index') }}">{{ __('trans_main.users') }}</a> </li>
            </ul>
          </li>






        </ul>
      </div>
    </div>

    <!-- Left Sidebar End-->
