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
        <div class="col-xl-8">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card mb-3" >
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col-lg-9 col-sm-6 col-6 col-md-auto">
                                    <h2 class="users-count" id="users-count">{{ number_format(App\Models\User::all()->count()) }}</h2>
                                    <h5>{{ __('Total Students') }}</h5>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-auto col-6 mt-3 text-end">
                                    <i class="mdi mdi-account-group fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9 col-sm-6 col-6 col-md-auto">
                                    <h2>{{ number_format(App\Models\Complain::all()->count()) }}</h2>
                                    <h5>{{ __('Pending Requests') }}</h5>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-auto text-end col-6 mt-3 ">
                                    <i class="mdi mdi-clipboard-multiple fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9 col-sm-6 col-6 col-md-auto">
                                    <h2>{{ number_format(App\Models\Complain::onlyTrashed()->count()) }}</h2>
                                    <h5>{{ __('Approved Requests') }}</h5>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-auto col-6 text-end col-6 mt-3 ">
                                    <i class="mdi mdi-clipboard-check-multiple fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row border-bottom border-2 border-dark">
                                <div class="col-lg-8 col-md-6 col-sm-6 col-8">
                                    <div class="text-start py-1 fs-4 fw-bold card-title roboto">{{ __('Students Joined') }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-4 col-md-6">
                                    <div class="text-end mt-2 fs-6 fw-bold roboto">{{ number_format($user->count()) }} {{ Str::plural(' student',number_format($user->count())) }}</div>
                                </div>
                            </div>
                            @if (count($user) > 0)
                                <div class="table-responsive py-2 overflow-auto h-25">
                                    <table>
                                        <tbody>
                                            @foreach ($user as $users)
                                            <tr>
                                                <td  class="text-end col-lg-2 px-2" scope="row">
                                                        <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                                </td>
                                                <td  class="text-start fw-bold h6 py-3 text-truncate roboto" scope="row">{{ $users->name }}</td>
                                                {{-- <td  class="text-end text-muted small fw-bold h6 py-3 roboto text-truncate" scope="row">{{ __('added '.$users->created_at->diffForhumans()) }}</td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="col-lg-12 mb-3 ">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                            <i class="fa-solid fa-check"></i>
                                            <span class="px-2 roboto">{{ Session::get('message') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3 py-4">
                                        <div class="card-body">
                                            <h5 class="card-title fs-3 text-center">{{ __('No Products yet.') }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="text-end">
                                <a href="{{ route('admin.user') }}" class="btn btn-primary roboto ">
                                    <i class="fa-solid fa-up-right-from-square mx-2"></i>
                                    <span>{{ __('View all data') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="text-center mt-3">
                        <p class="fw-bold">{{ __('Systems Data Chart') }}</p>
                    </div>
                </div>
                <div class="card-body">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
