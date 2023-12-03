@extends('admin.layouts.index')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{ __('Admin Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Home') }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-xl-3">
            <div class="card mb-3" >
                <div class="card-body h-100">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                            <h2 class="users-count" id="users-count">{{ number_format(App\Models\User::all()->count()) }}</h2>
                            <h5>{{ __('Total Students') }}</h5>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-auto col-6 mt-3 text-end">
                            <i class="fa-solid fa-user fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7 col-sm-6 col-6 col-md-auto">
                            <h2>{{ number_format(App\Models\Complain::all()->count()) }}</h2>
                            <h5>{{ __('Pending Requests') }}</h5>
                        </div>
                        <div class="col-lg-5 col-sm-6 col-md-auto text-end col-6 mt-3 ">
                            <i class="fa-solid fa-store fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 col-6 col-md-auto">
                            <h2>{{ number_format(App\Models\Complain::onlyTrashed()->count()) }}</h2>
                            <h5>{{ __('Approved Requests') }}</h5>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-auto col-6 text-end col-6 mt-3 ">
                            <i class="fa-solid fa-bag-shopping fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <p>Hello World</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
