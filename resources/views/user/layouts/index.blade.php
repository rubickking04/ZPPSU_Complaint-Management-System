<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.3.67/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        .list-link {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            padding: 0 10px;
            display: inline-block;
            position: relative;
            color: #0087ca;
        }
        .list-link:hover{
            color: white;
            /* text-decoration: underline; */
        }
        .list-link::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 4px;
            bottom: 0;
            left: 0;
            border-radius: 20px;
            background-color: #B71C1C;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }
        .list-link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-light bg-dark sticky-top">
            <div class="container">
                <a class=" navbar-nav navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                    role="button">
                    <lord-icon src="https://cdn.lordicon.com/wgwcqouc.json" trigger="morph"
                        colors="primary:#ffffff,secondary:#ffffff" stroke="60" style="width:30px;height:30px"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                <p class="navbar-brand mb-0 navbar-text text-truncate text-white">{{ __('User\'s Dashboard') }}
                </p>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
                    <li class="nav-item text-white">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="30"
                            height="30" class="rounded-circle">
                        {{ Auth::user()->name }}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto text-white container bg-dark" tabindex="-1" id="offcanvas"
            data-bs-keyboard="true" data-bs-backdrop="true">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    <a href="{{ url('/') }}"
                        class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-white text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-info border-3"
                            src="{{ asset('/storage/images/avatar.png') }}" height="60" width="60">
                    </a>
                    <span class="container fs-4">{{ Auth::user()->name }}</span>
                    <a class="nav-link"><span
                            class="text-info d-flex justify-content-center  text-uppercase small">{{ __('User\'s Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body px-0 text-white">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">

                    <li class="nav-item">
                        <a href="{{ route('user.home') }}" class="nav-link text-truncate">
                            <i class="fs-4 text-white mdi mdi-view-grid-outline"></i>
                            <span class="text-white px-2 py-5" aria-current="page">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.complains') }}" class="nav-link text-truncate">
                            <i class="fs-4 text-white mdi mdi-notebook-plus-outline"></i>
                            <span class="text-white px-2 py-5" aria-current="page">{{ __('Complain') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.messages') }}" class="nav-link text-truncate">
                            <i class="fs-4 text-white mdi mdi-forum-outline"></i>
                            <span class="text-white px-2 py-5" aria-current="page">{{ __('Chats') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.complain') }}" class="nav-link text-truncate">
                            <i class="fs-4 text-white mdi mdi-history"></i>
                            <span class="text-white px-2 py-5" aria-current="page">{{ __('History') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link text-truncate">
                            <i class="fs-4 text-white mdi mdi-account-outline"></i>
                            <span class="text-white px-2 py-5" aria-current="page">{{ __('Profile') }}</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#"class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#table-collapse" aria-expanded="true">
                        <i class="fs-5 fa-solid fa-table text-white"></i><span class="ms-2  text-white">{{ __('Data Tables') }}</span></a>
                        <div class="collapse container" id="table-collapse">
                            <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Farmers Table ') }}<span class="badge text-bg-primary">{{ __('1') }}</span> </span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Stores Table ') }} <span class="badge text-bg-primary">{{ __('2') }}</span> </span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Products Table ') }}<span class="badge text-bg-primary">{{ __('2') }}</span> </span></a></li>
                                <li class="nav-item"><a href="#" class="ms-2 nav-link  text-white text-decoration-none rounded"><i class="fs-5 fa-solid fa-angles-right"></i><span class="ms-2  text-white">{{ __('Orders Table ') }} <span class="badge text-bg-primary">{{ __('3') }}</span> </span></a></li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="{{ route('user.logout') }}" class="d-flex px-3 align-items-center nav-link text-truncate"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout fs-4 text-white"></i><span
                            class="ms-2 text-white">{{ __('Sign out') }}</span> </a>
                </div>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                process: '/tmp-upload',
                revert: '/tmp-delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
    </script>
</body>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hides() {
        var x = document.getElementById("password-confirm");
        var show_eye = document.getElementById("show_eyes");
        var hide_eye = document.getElementById("hide_eyes");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

</html>
