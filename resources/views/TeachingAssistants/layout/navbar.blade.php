<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm">
            <h6 class="font-weight-bolder mb-0">
                @if(Auth::guard('web')->check())
                    {{Auth::guard('web')->user()->first_name }}  {{ Auth::guard('web')->user()->role }}
                @elseif(Auth::guard('supervisor')->check())
                    {{Auth::guard('supervisor')->user()->name }}  {{ Auth::guard('supervisor')->user()->role }}
                @elseif(Auth::guard('Teaching_Assistant')->check())
                    {{Auth::guard('Teaching_Assistant')->user()->name }}  {{ Auth::guard('Teaching_Assistant')->user()->role }}
                @endif
            </h6>
    </li>
        </ol>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

        </div>
        <ul class="navbar-nav  justify-content-end">

          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="{{ route('teachingAssistant.profile') }}">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                        <i class="fa fa-user-circle me-sm-1"></i>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">Profile</span>
                      </h6>

                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="{{ route('supervisor.logout') }}">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                        <i class="fa fa-sign-out me-sm-1"></i>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">Logout</span>
                      </h6>

                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
