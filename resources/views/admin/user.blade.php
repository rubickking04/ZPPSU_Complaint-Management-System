@extends('admin.layouts.index')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{ __('Admin Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('User\'s Table') }}</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow" style="border-radius: 20px">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-12">
                            <div class="row border-bottom border-2 border-primary">
                                <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Users Table') }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                                    <form action="#" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <input class="form-control me-2 " type="search" name="search" placeholder="Search Name or Email" aria-label="Search">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success mt-3">
                                    <i class="fa-solid fa-check me-2"></i>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if (count($user) > 0)
                                <div class="table-responsive py-3">
                                    <table class="table">
                                        <tbody>
                                            @if (session('msg'))
                                                <div class="col-lg-12 py-3">
                                                    <div class="text-center justify-content-center">
                                                        <i class="bi bi-exclamation-triangle-fill fs-1 text-warning text-center"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                                                        <h5 class="card-title fw-bold text-center">{{ session('msg') }}</h5>
                                                        <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }} </p>
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                                                                <div class="row">
                                                                    <form action="#" method="GET" role="search" class="d-flex">
                                                                        @csrf
                                                                        <div class="input-group">
                                                                            <input class="form-control me-2 border border-primary" type="search" name="search" placeholder="Please try again to search by Name or Email" aria-label="Search">
                                                                            <div class="input-group-text bg-primary">
                                                                                <button class="btn " type="submit">
                                                                                    <i class="fa-solid fa-magnifying-glass text-white"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @if (Session::has('message'))
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa-solid fa-check"></i>
                                                        <span class="px-2">{{ Session::get('message') }}</span>
                                                    </div>
                                                @endif
                                                <table class="table table-bordered">
                                                    <thead class="table-primary">
                                                        <tr class="text-center">
                                                            <th scope="col">{{ __(' ') }}</th>
                                                            <th scope="col">{{ __('Student Name') }}</th>
                                                            <th scope="col">{{ __('Email') }}</th>
                                                            <th scope="col">{{ __('Address') }}</th>
                                                            <th scope="col">{{ __('Phone Number') }}</th>
                                                            <th scope="col">{{ __('Joined') }}</th>
                                                            <th scope="col">{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user as $users)
                                                            <tr>
                                                                <td class="text-center col-lg-1 col-md-1 col-sm-1 col-1"
                                                                    scope="row">
                                                                    @if ($users->image)
                                                                        <img src="{{ asset('/storage/images/' . $user->image) }}" class="img-fluid" alt="">
                                                                    @else
                                                                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="hugenerd" width="35" height="35" class="rounded-circle">
                                                                    @endif
                                                                </td>
                                                                <td class="text-center fw-bold h6 py-3 text-truncate" scope="row">{{ $users->name }}</td>
                                                                <td class="text-center" scope="row"> {{ $users->email }}</td>
                                                                <td class="text-center" scope="row"> {{ $users->address }}</td>
                                                                <td class="text-center" scope="row"> {{ $users->phone_number }}</td>
                                                                <td class="text-center" scope="row">{{ \Carbon\Carbon::createFromTimestamp(strtotime($users->created_at))->Format('d/m/Y') }}</td>
                                                                <td class="text-center" scope="row">
                                                                    <button type="button" class=" btn btn-success bi bi-eye-fill" data-bs-toggle="modal"data-bs-target="#exampleModalCenter{{ $users->id }}"></button>
                                                                    <button type="button" class=" btn btn-warning bi bi-pencil-square"data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $users->id }}"></button>
                                                                    <a href="{{ route('admin.users.delete', $users->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to remove this user?')">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                    {{-- View Profile Modal --}}
                                                                    <div class="modal fade modal-alert" id="exampleModalCenter{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog ">
                                                                            <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                <div class="modal-header flex-nowrap border-bottom-0">
                                                                                    <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body p-4 text-center">
                                                                                    <div class="thumb-lg member-thumb ms-auto">
                                                                                        <img src="{{ asset('/storage/images/avatar.png') }}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="150px"  width="150px">
                                                                                    </div>
                                                                                    <h2 class="fw-bold mb-0">{{ $users->name }}</h2>
                                                                                    <p class="">{{ __('@Email ') }}<span>|</span><span><a href="#" class=" text-decoration-none">{{ $users->email }}</a></span>
                                                                                    </p>
                                                                                    <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Update Profile Modal --}}
                                                                    <div class="modal fade modal-alert" id="exampleModalCenters{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog ">
                                                                            <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                <div class="modal-header flex-nowrap border-bottom-0">
                                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('New message to ') }} <span class="fw-bold">{{ $users->name }}</span></h1>
                                                                                    <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body text-start">
                                                                                    {{-- <div class="thumb-lg member-thumb ms-auto">
                                                                                        <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                                    </div>
                                                                                    <h2 class="fw-bold mb-0">{{ $users->name }}</h2> --}}
                                                                                    <form action="{{ url('/admin/farmers/update/'.$users->id) }}" method="POST">
                                                                                        @csrf
                                                                                        <div class="row mb-3">
                                                                                            <div class="mb-3">
                                                                                                <label for="message-text" class="col-form-label">Message:</label>
                                                                                                <textarea class="form-control" id="message-text" rows="3" placeholder="{{ __('Write a message to '. $users->name) }}"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Send message</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                    {{ $user->links() }}
                                </div>
                            @else
                                <div class="col-lg-12 mb-3 ">
                                    <div class="mb-3 py-4">
                                        <div class="text-center display-1">
                                            <i class="fa-solid fa-users-slash display-1"></i>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title fs-3 text-center">
                                                {{ __('No Farmers Joined yet.') }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
