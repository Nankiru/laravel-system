<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard Admin')</title>
  {{--
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/pngegg.png" /> --}}
  {{--
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/logo-icon.png')}}" /> --}}
  <link rel="shortcut icon" href="{{asset('assets/images/logos/nan-icon.png')}}" type="image/x-icon">

  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  @vite('resources/css/app.css')
  <!-- Add this in your blade layout (head section) -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
  {{--
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  {{--
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
    integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Add to <head> if not already included -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Add this in the <head> or before the closing </body> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

</head>

<style>
  .bg-blur {
    w backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.5);
    /* optional: semi-transparent bg */
  }

  .transition-max-height {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
  }

  .transition-max-height.open {
    max-height: 500px;
    /* big enough to fit contents */
  }
</style>


<body>
  @if (session('success'))
    <script>
    Swal.fire({
      title: 'Success!',
      text: "{{ session('success') }}",
      icon: 'success',
      confirmButtonText: 'OK'
    });
    </script>
  @endif

  @if (session('status'))
    <script>
    Swal.fire({
      title: 'Login Failed',
      text: "{{ session('status') }}",
      icon: 'error',
      confirmButtonText: 'Try Again'
    });
    </script>
  @endif

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full">
    {{-- data-sidebar-position="fixed" data-header-position="fixed" --}}
    <aside class="left-sidebar position-fixed top-0 z-20 ">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/" class="text-nowrap logo-img">
            <img src="{{asset('assets/images/logos/Nanpos.png')}}" alt="" width="150px" height="150px" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">POS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">{{ __('messages.dashboard') }}</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->

            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    {{-- <i class="ti ti-user-circle"></i> --}}
                    <i class="fa-solid fa-people-group"></i>
                  </span>
                  <span class="hide-menu">{{__('messages.users_list')}}</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="{{url('product')}}" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    {{-- <i class="ti ti-user-circle"></i> --}}
                    <i class="fa-solid fa-box"></i>
                  </span>
                  <span class="hide-menu">Products</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="/profile" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fas fa-user-shield"></i>
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">Admin</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fas fa-clipboard-list"></i>
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">Orders</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            {{-- <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <box-icon name='category' class=""></box-icon>
                  </span>
                  <span class="hide-menu">Categories</span>
                </div>
              </a>
            </li> --}}
            <li class="sidebar-item has-submenu">
              <a class="sidebar-link justify-content-between" href="javascript:void(0);" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fa-solid fa-table-list"></i>
                  </span>
                  <span class="hide-menu">Table</span>
                  <i class="fa fa-chevron-down ms-auto float-right w-full"></i>
                </div>
              </a>

              <ul class="submenu transition-max-height ms-4">
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                      <span class="d-flex">
                        <i class="fa-solid fa-table-list"></i>
                      </span>
                      <span class="hide-menu">user</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                    <div class="d-flex align-items-center gap-3">
                      <span class="d-flex">
                        <i class="fa-solid fa-table-list"></i>
                      </span>
                      <span class="hide-menu">product</span>
                    </div>
                  </a>
                </li>
              </ul>
            </li>


            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fas fa-box"></i>
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">Menu / Products</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="{{url('add-brand')}}" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fa-solid fa-money-check-dollar"></i>
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">Brand</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" target="_blank"
                href="https://bootstrapdemos.adminmart.com/modernize/dist/landingpage/index.html" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-app-window"></i>
                  </span>
                  <span class="hide-menu">Landingpage</span>
                </div>
                <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="/users" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fas fa-receipt"></i>
                    {{-- <i class="fas fa-shopping-bag"></i> --}}
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">Recieps</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="{{url('index')}}" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fa-solid fa-earth-europe"></i>
                    {{-- <i class="fas fa-shopping-bag"></i> --}}
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">My Website</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Insert</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/form" aria-expanded="false">
                <i class="ti ti-file-text"></i>
                <span class="hide-menu">{{__('messages.add_users')}}</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/form_product" aria-expanded="false">
                <i class="ti ti-file-text"></i>
                {{-- <span class="hide-menu">{{__('messages.add_users')}}</span> --}}
                <span class="hide-menu">Add Product</span>
              </a>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" id="logout" href="#" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="fa-solid fa-right-from-bracket" style="color: #f11e3d;"></i>
                  </span>
                  {{-- <span class="hide-menu">{{__('messages.users_list')}}</span> --}}
                  <span class="hide-menu">Logout</span>
                </div>
                {{-- <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span> --}}
              </a>
            </li>

            <form id="logoutForm" action="{{ url('/logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
              document.getElementById('logout').addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                  title: 'Are you sure?',
                  // title: {{__('messages.msm_logout')}},
                  text: "Do you really want to logout?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, logout',
                  cancelButtonText: 'Cancel'
                }).then((result) => {
                  if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                  }
                });
              });
            </script>
            <style>
              .disabled {
                color: gray;
                cursor: not-allowed;
                text-decoration: none;
              }
            </style>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            {{-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">authentication</span>
            </li> --}}
            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="/login" aria-expanded="false">
                <i class="ti ti-login"></i>
                <span class="hide-menu">{{__("messages.logout")}}</span>
              </a>
            </li> --}}
            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="{{url('register')}}" aria-expanded="false">
                <i class="ti ti-user-plus"></i>
                <span class="hide-menu">{{__("messages.register")}}</span>
              </a>
            </li> --}}

            <li>
              <span class="sidebar-divider lg"></span>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="sticky-top z-10 bg-body bg-opacity-50 backdrop-blur">
        <nav class="navbar navbar-expand-lg top-0 relative">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-start-10 d-lg-none position-absolute start-0 top-50 translate-middle-y ps-3">
              <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            {{-- <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li> --}}
          </ul>
          <div class="d-flex align-items-center navbar-collapse justify-content-center px-0" id="navbarNav">

            {{-- Selecting Languages --}}

            <!-- Language Dropdown -->
            <ul
              class="navbar-nav d-flex flex-row ms-auto align-items-center justify-content-between d-sm-flex justify-content-sm-center align-items-sm-center">
              <div class="dropdown mr-2">
                @php($lang = ["en" => "English", "khmer" => "ខ្មែរ", "ch" => "China"])
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-globe"></i> Language: {{$lang[Session::get('locale', 'en')]}}
                </button>
                <ul class="dropdown-menu mr-2 mt -1 me-3" aria-labelledby="languageDropdown">
                  <li>
                    <a class="dropdown-item d-flex " href="{{route('lang.change', ['lang' => 'en'])}}">
                      <img src="https://flagcdn.com/w40/us.png" width="23"
                        class="me-2 rounded-circle"><span>English</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item d-flex " href="{{route('lang.change', ['lang' => 'khmer'])}}">
                      <img src="https://flagcdn.com/w40/kh.png" width="23" class="me-2 rounded-circle"><span>ខ្មែរ
                        (Khmer)</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item d-flex" href="{{route('lang.change', ['lang' => 'ch'])}}">
                      <img src="https://flagcdn.com/w40/cn.png" width="20"
                        class="me-2 rounded-circle"><span>China</span>
                    </a>
                  </li>
                </ul>
              </div>
              <li class="nav-item dropdow d-flex justify-content-center align-items-center">
                <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('uploads/' . session('img')) }}" alt="Avatar" width="35" height="35"
                    class="rounded-circle float-right right-4"
                    onerror="this.onerror=null; this.src='https://i.pinimg.com/736x/06/3b/bf/063bbf0665eaf9c1730bccdc5c8af1b2.jpg';" />
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/profile" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">{{__('messages.user_profile')}}</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">{{session('email')}}</p>
                    </a>
                    {{-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a> --}}
                    {{-- <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a> --}}

                    <a href="#" id="logoutBtn"
                      class="btn btn-outline-primary mx-3 mt-2 d-block">{{__('messages.logout')}}</a>

                    <form id="logoutForm" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                      document.getElementById('logoutBtn').addEventListener('click', function (e) {
                        e.preventDefault();
                        Swal.fire({
                          title: 'Are you sure?',
                          // title: {{__('messages.msm_logout')}},
                          text: "Do you really want to logout?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, logout',
                          cancelButtonText: 'Cancel'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.getElementById('logoutForm').submit();
                          }
                        });
                      });
                    </script>

                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      @yield('contents')
    </div>
  </div>
</body>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.has-submenu > a');

    toggles.forEach(toggle => {
      toggle.addEventListener('click', function () {
        const submenu = this.parentElement.querySelector('.submenu');
        submenu.classList.toggle('open');
      });
    });
  });
</script>

<script>
  const toggleBtn = document.getElementById('toggleNightMode');

  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('night-mode');
  });
</script>

</html>