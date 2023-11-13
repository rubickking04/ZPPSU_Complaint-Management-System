@extends('admin.layouts.index')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{ __('Admin Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Chats') }}</li>
        </ol>
    </nav>
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-6">
            @foreach ($message as $messages)
                <a href="{{ route('admin.view.messages', $messages->id) }}" class="card text-decoration-none mb-3">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-lg-1">
                                <img src="{{asset('/storage/images/avatar.png')}}" alt="avatar" class="rounded-circle border border-primary border-3 img-thumbnail" style="width: 50px;">
                            </div>
                            <div class="col-lg-10 mt-1 px-2 text-start">
                                <h5>{{ $messages->reciever->name }}</h5>
                                <p class="small text-muted">{{ __('Sent '.$messages->created_at->diffForHumans()) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
