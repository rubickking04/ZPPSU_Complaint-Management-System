@extends('admin.layouts.index')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{ __('Admin Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.messages') }}" class="text-decoration-none">{{ __('Chats') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Reply') }}</li>
        </ol>
    </nav>
    <div class="row ">
        <div class="col-xl-3">
            {{-- <div class="card">
                <div class="card-body">
                    <p>Hello</p>
                </div>
            </div> --}}
        </div>
        <div class="col-xl-6">
            <h1>{{ __('Conversations') }}</h1>
            <hr>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ __('Messages') }}</div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-check me-2"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="row" >
                        <div class="col-12">
                            <h5>{{ '• '.$reciever }}</h5>
                            <p> {{ $body }}</p>
                        </div>
                        <div class="col-8"></div>
                        <div class="col-4 text-end scrollspy-example" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0">
                            <h5 id="list-item-1">{{ 'Me • ' }}</h5>
                            @foreach ($reply as $replies)
                                <p> {{ $replies->body }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.reply') }}" method="POST">
                        @csrf
                        <div class="row g-1">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <input type="hidden" name="message_id" value="{{ $message_id }}">
                            <div class="col-11">
                                <input type="text" name="body" id="" class="form-control" placeholder="Type your reply here..." >
                            </div>
                            <div class="col-1 text-end">
                                <button class="btn btn-primary text-white mdi mdi-send" type="submit"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <h1>{{ __('Participants') }}</h1>
            <hr>
            <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ '• '.$reciever }}</div>
                        <span class="text-muted small">{{ __('Student') }}</span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ '• '.Auth::guard('admin')->user()->name }}</div>
                        <span class="text-muted small">{{ __('Admin') }}</span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection
