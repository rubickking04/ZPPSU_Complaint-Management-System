@extends('admin.layouts.index')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{ __('Admin Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Complain\'s Table') }}</li>
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
                                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Complains Table') }}
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
                            @if (count($complain) > 0)
                                <div class="table-responsive py-2">
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
                                                            <th scope="col">{{ __('Complainant Name') }}</th>
                                                            <th scope="col">{{ __('Email') }}</th>
                                                            <th scope="col">{{ __('Status') }}</th>
                                                            <th scope="col">{{ __('Approved') }}</th>
                                                            <th scope="col">{{ __('Requested') }}</th>
                                                            <th scope="col">{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($complain as $complains)
                                                            <tr>
                                                                <td class="text-center col-lg-1 col-md-1 col-sm-1 col-1"
                                                                    scope="row">
                                                                    @if ($complains->image)
                                                                        <img src="{{ asset('/storage/images/' . $complain->image) }}" class="img-fluid" alt="">
                                                                    @else
                                                                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="hugenerd" width="35" height="35" class="rounded-circle">
                                                                    @endif
                                                                </td>
                                                                <td class="text-center fw-bold h6 py-3 text-truncate" scope="row">{{ $complains->user->name }}</td>
                                                                <td class="text-center" scope="row"> {{ $complains->user->email }}</td>
                                                                <td class="text-center" scope="row">
                                                                    @if ($complains->deleted_at)
                                                                    <i class="mdi mdi-check-circle text-success fs-2"></i>
                                                                    @else
                                                                    <i class="mdi mdi-alert-circle text-warning fs-2"></i>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center" scope="row">
                                                                    @if ($complains->deleted_at)
                                                                    {{ $complains->deleted_at->toDayDateTimeString(); }}
                                                                    @endif
                                                                </td>
                                                                <td class="text-center" scope="row">{{ $complains->created_at->toDayDateTimeString() }}</td>
                                                                <td class="text-center" scope="row">
                                                                    <button type="button" class=" btn btn-success bi bi-eye-fill" data-bs-toggle="modal"data-bs-target="#exampleModalCenter{{ $complains->id }}"></button>
                                                                    <button type="button" class=" btn btn-warning bi bi-pencil-square"data-bs-toggle="modal"data-bs-target="#exampleModalCenters{{ $complains->id }}"></button>
                                                                    <a href="{{ route('admin.complains.destroy', $complains->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to remove this complain?')">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                    {{-- View Profile Modal --}}
                                                                    <div class="modal fade modal-alert" id="exampleModalCenter{{ $complains->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-xl">
                                                                            <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                <div class="modal-header flex-nowrap border-bottom-0">
                                                                                    <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body p-4 text-center">
                                                                                    <div class="card mb-3">
                                                                                        <div class="card-header">
                                                                                            <div class="card-title text-center">{{ __('Formal Discipline Complaint Form') }}</div>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <div class="row mb-3">
                                                                                                <div class="form-outline text-start col-xl-6">
                                                                                                    <label for="incident_date" class="col-form-label">{{ __('Complainant\'s name: ') }}</label>
                                                                                                    <div class="input-group">
                                                                                                        <input type="text" id="incident_date" placeholder="Example: rubickking04@gmail.com" name="incident_date" class="form-control form-control-lg @error('incident_date') is-invalid @enderror"  value="{{ $complains->user->name }}" readonly/>
                                                                                                        @error('incident_date')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-outline text-start col-xl-6">
                                                                                                    <label for="incident_date" class="col-form-label">{{ __('Complainant\'s name: ') }}</label>
                                                                                                    <div class="input-group">
                                                                                                        <input type="text" id="incident_date" placeholder="Example: rubickking04@gmail.com" name="incident_date" class="form-control form-control-lg @error('incident_date') is-invalid @enderror"  value="{{ $complains->created_at->toDayDateTimeString() }}" readonly/>
                                                                                                        @error('incident_date')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-outline text-start col-xl-6">
                                                                                                    <label for="incident_date" class="col-form-label">{{ __('Student name: ') }}</label>
                                                                                                    <div class="input-group">
                                                                                                        <input type="text" id="incident_date" placeholder="Example: rubickking04@gmail.com" name="incident_date" class="form-control form-control-lg @error('incident_date') is-invalid @enderror"  value="{{ $complains->user->name }}" readonly/>
                                                                                                        @error('incident_date')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-outline text-start col-xl-6">
                                                                                                    <label for="incident_date" class="col-form-label">{{ __('Student ID: ') }}</label>
                                                                                                    <div class="input-group">
                                                                                                        <input type="text" id="incident_date" placeholder="Example: rubickking04@gmail.com" name="incident_date" class="form-control form-control-lg @error('incident_date') is-invalid @enderror"  value="{{ $complains->user->profile_info->student_id }}" readonly/>
                                                                                                        @error('incident_date')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card mb-3">
                                                                                        <div class="card-header">
                                                                                            <div class="card-title text-center">{{ __('Incindent Information') }}</div>
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <div class="card-text text-start">
                                                                                                <p class="fst-italic">{{ __('The Standards of conduct applies, and discipline may be imposed for conduct which occurs on College Premises, at off campus recreational or instructional sites, at my College-sponsored event, or at any College supervised or privded activity, transportation or facility.') }}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    {{-- <div class="alert alert-secondary" role="alert">
                                                                                    </div> --}}
                                                                                    <form action="{{ route('user.complain.create') }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        {{-- <input type="hidden" name="user_id" value={{ Auth::user()->id }}> --}}
                                                                                        <div class="row mb-3">
                                                                                            <div class="form-outline text-start col-xl-6">
                                                                                                <label for="incident_date" class="col-form-label">{{ __('What date did the incident occur?') }}</label>
                                                                                                <div class="input-group">
                                                                                                    <input type="date" id="incident_date" placeholder="Example: rubickking04@gmail.com" name="incident_date" class="form-control form-control-lg @error('incident_date') is-invalid @enderror"  value="{{ $complains->incident_date }}" readonly/>
                                                                                                    @error('incident_date')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start col-xl-6">
                                                                                                <label for="incident_place" class="col-form-label">{{ __('Where did the incident occur?') }}</label>
                                                                                                <div class="input-group">
                                                                                                    {{-- <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div> --}}
                                                                                                    <input type="text" id="incident_place" placeholder="Enter the place" name="incident_place" class="form-control form-control-lg @error('incident_place') is-invalid @enderror" value="{{ $complains->incident_place }}" readonly/>
                                                                                                    @error('incident_place')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start mt-2">
                                                                                                <label for="incident_event" class="col-form-label">{{ __('What, if any, precursor behaviors were exhibited prior to the culminating event?') }}</label>
                                                                                                <div class="input-group">
                                                                                                    <textarea type="text" id="incident_event" placeholder="Enter the place" readonly name="incident_event" rows=3 class="form-control form-control-lg @error('incident_event') is-invalid @enderror"  value="{{ old('incident_event') }}">{{ $complains->incident_place }}</textarea>
                                                                                                    @error('incident_event')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start mt-2">
                                                                                                <label for="incident_attempted" class="col-form-label">{{ __('What, if any, interventions were attempted/taken prior to the culminating event?') }}</label>
                                                                                                <div class="input-group">
                                                                                                    <textarea type="text" id="incident_attempted" placeholder="Enter the place" name="incident_attempted" rows=3 class="form-control form-control-lg @error('incident_attempted') is-invalid @enderror"  value="{{ old('incident_attempted') }}" readonly>{{ $complains->incident_attempted }}</textarea>
                                                                                                    @error('incident_attempted')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                                <div class="alert alert-secondary mt-2" role="alert">
                                                                                                    <p class="fst-italic">
                                                                                                        <span class="fw-bold">{{ __('Incident Details: ') }}</span>
                                                                                                        {{ __('Prior to submission, Please ensure you have provided deteails on each of the') }}
                                                                                                        <span class="fw-bold">{{ __('three (3)') }}</span>
                                                                                                        {{ __('requirements listed below. Additional information may be on a word/pdf document. Please note the additions under the attachments section.') }}
                                                                                                        <span class="fw-bold">{{ __('Failure to include all items listed as required will delay the processing of this request.') }}</span>
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start mt-2">
                                                                                                <label for="description" class="col-form-label">{{ __('Detailed description of the incident: ') }}</label>
                                                                                                <div class="input-group">
                                                                                                    <textarea type="text" id="description" placeholder="Enter the place" name="description" rows="6" class="form-control form-control-lg @error('description') is-invalid @enderror"  readonly>{{ $complains->description }}</textarea>
                                                                                                    @error('description')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start mt-2">
                                                                                                <label for="complain_attempts" class="col-form-label">{{ __('Described the attempts you have made to resolve the incident: ') }}</label>
                                                                                                <div class="input-group">
                                                                                                    <textarea type="text" id="complain_attempts" placeholder="Enter the place" name="complain_attempts" rows="3" class="form-control form-control-lg @error('complain_attempts') is-invalid @enderror"  readonly>{{ $complains->complain_attempts }}</textarea>
                                                                                                    @error('complain_attempts')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start mt-2">
                                                                                                <label for="solution" class="col-form-label">{{ __('Described the resolution you are seeking: ') }}</label>
                                                                                                <div class="input-group">
                                                                                                    <textarea type="text" id="solution" placeholder="Enter the place" name="solution" rows="3" class="form-control form-control-lg @error('solution') is-invalid @enderror"  readonly>{{ $complains->solution }}</textarea>
                                                                                                    @error('solution')
                                                                                                        <span class="invalid-feedback" role="alert">
                                                                                                            <strong>{{ $message }}</strong>
                                                                                                        </span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-outline text-start mt-2">
                                                                                                <label for="file" class="col-form-label fw-bold">{{ __('Attachments: ') }}</label>
                                                                                                {{-- <input type="file" id="file" placeholder="Enter the place" name="file" class="form-control form-control-lg @error('file') is-invalid @enderror"  value="{{ old('file') }}"/> --}}
                                                                                                @error('file')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                                <p for="name" class="col-form-label "><span class="fst-italic">{{ __('In the box below, ') }}</span>{{ __('please mark supporting evidence and/or documentation that will be submitted with this form') }}</p>
                                                                                                <div class="card">
                                                                                                    <div class="card-text">
                                                                                                        <div class="container">
                                                                                                            <div class="card-body">
                                                                                                                <label for="detail" class="col-form-label fst-italic">{{ __('Marked that apply: ') }}</label>
                                                                                                                <div class="row">
                                                                                                                    @if ($complains->detail === 'Addendum to Narrative Summary')
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ $complains->detail }}" checked>
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ $complains->detail }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck2" value="{{ __('Email Exchanges') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck2">{{ __('Email Exchanges') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck3" value="{{ __('Photographs/Videos') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck3">{{ __('Photographs/Videos') }}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck4" value="{{ __('Coursework') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck4">{{ __('Coursework') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck5" value="{{__('Others')}}">
                                                                                                                                <label class="form-check-label" for="defaultCheck5">{{__('Others')}}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @elseif ($complains->detail === 'Email Exchanges')
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ __('Addendum to Narrative Summary') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ __('Addendum to Narrative Summary') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ $complains->detail }}" checked>
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ $complains->detail }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck3" value="{{ __('Photographs/Videos') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck3">{{ __('Photographs/Videos') }}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck4" value="{{ __('Coursework') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck4">{{ __('Coursework') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck5" value="{{__('Others')}}">
                                                                                                                                <label class="form-check-label" for="defaultCheck5">{{__('Others')}}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @elseif ($complains->detail === 'Photographs/Videos')
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ __('Addendum to Narrative Summary') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ __('Addendum to Narrative Summary') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck2" value="{{ __('Email Exchanges') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck2">{{ __('Email Exchanges') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ $complains->detail }}" checked>
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ $complains->detail }}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck4" value="{{ __('Coursework') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck4">{{ __('Coursework') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck5" value="{{__('Others')}}">
                                                                                                                                <label class="form-check-label" for="defaultCheck5">{{__('Others')}}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @elseif ($complains->detail === 'Coursework')
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ __('Addendum to Narrative Summary') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ __('Addendum to Narrative Summary') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck2" value="{{ __('Email Exchanges') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck2">{{ __('Email Exchanges') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck4" value="{{ __('Photographs/Videos') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck4">{{ __('Photographs/Videos') }}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ $complains->detail }}" checked>
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ $complains->detail }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck5" value="{{__('Others')}}">
                                                                                                                                <label class="form-check-label" for="defaultCheck5">{{__('Others')}}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        @elseif ($complains->detail === 'Others')
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ __('Addendum to Narrative Summary') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ __('Addendum to Narrative Summary') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck2" value="{{ __('Email Exchanges') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck2">{{ __('Email Exchanges') }}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck4" value="{{ __('Photographs/Videos') }}">
                                                                                                                                <label class="form-check-label" for="defaultCheck4">{{ __('Photographs/Videos') }}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-xl-6">
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck5" value="{{__('Coursework')}}">
                                                                                                                                <label class="form-check-label" for="defaultCheck5">{{__('Coursework')}}</label>
                                                                                                                            </div>
                                                                                                                            <div class="form-check">
                                                                                                                                <input class="form-check-input" type="radio" name="detail" id="defaultCheck1" value="{{ $complains->detail }}" checked>
                                                                                                                                <label class="form-check-label" for="defaultCheck1">{{ $complains->detail }}</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                @error('detail')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                    {{-- <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button> --}}
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    @if ($complains->deleted_at)
                                                                                        <button type="button" class="btn btn-success">{{ __('Approved') }}</button>
                                                                                    @else
                                                                                        <a href="{{ route('admin.complains.soft_delete', $complains->id) }}" type="button" class="btn btn-primary">{{ __('Approve') }}</a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Update Profile Modal --}}
                                                                    <div class="modal fade modal-alert" id="exampleModalCenters{{ $complains->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog ">
                                                                            <div class="modal-content shadow" style="border-radius:20px; ">
                                                                                <div class="modal-header flex-nowrap border-bottom-0">
                                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('New message to ') }} <span class="fw-bold">{{ $complains->name }}</span></h1>
                                                                                    <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body text-start">
                                                                                    {{-- <div class="thumb-lg member-thumb ms-auto">
                                                                                        <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                                    </div>
                                                                                    <h2 class="fw-bold mb-0">{{ $complains->name }}</h2> --}}
                                                                                    <form action="{{ route('admin.message') }}" method="POST">
                                                                                        @csrf
                                                                                        <div class="row mb-3">
                                                                                            <input type="hidden" name="user_id" value="{{ $complains->user->id }}">
                                                                                            <div class="mb-3">
                                                                                                <label for="body" class="col-form-label">Message:</label>
                                                                                                <textarea class="form-control" id="body" rows="3" name="body" placeholder="{{ __('Write a message to '. $complains->name) }}"></textarea>
                                                                                                @error('body')
                                                                                                    <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
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
                                    {{ $complain->links() }}
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
