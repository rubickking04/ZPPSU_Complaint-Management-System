@extends('user.layouts.index')
@section('content')
<div class="container py-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    <div class="row ">
        <div class="col-xl-3 mb-3">
            <div class="card ">
                <div class="card-body text-center">
                    <img src="{{asset('/storage/images/avatar.png')}}" alt="avatar" class="rounded-circle border border-primary border-3 img-thumbnail" style="width: 130px;">
                    @if(Auth::user()->profile_info)
                        <h5 class="text-secondary my-2 fw-bold">{{ Auth::user()->profile_info->student_id }}</h5>
                    @else
                        <h5 class="text-muted my-2">{{ __('N/A') }}</h5>
                    @endif
                    {{-- <h5 class="my-2">{{  }}</h5> --}}
                    <h3 class="my-1">{{ Auth::user()->name }}</h3>
                    <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary bg-gradient">My Personal Details</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-check me-2"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-title mt-3">
                        <h4 class="text-start fw-bold">{{ ('Student Information') }}</h4>
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Fullname:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <br>
                    {{-- <hr> --}}
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Email:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="card-title mt-3">
                        <h4 class="text-start fw-bold">{{ ('Personal Information') }}</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Student ID:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            @if(Auth::user()->profile_info)
                                <p class="text-muted mb-0">{{ Auth::user()->profile_info->student_id }}</p>
                            @else
                                <p class="text-muted mb-0">{{ __('N/A') }}</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Department:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            @if(Auth::user()->profile_info)
                                <p class="text-muted mb-0">{{ Auth::user()->profile_info->department }}</p>
                            @else
                                <p class="text-muted mb-0">{{ __('N/A') }}</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Section:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            @if(Auth::user()->profile_info)
                                <p class="text-muted mb-0">{{ Auth::user()->profile_info->section }}</p>
                            @else
                                <p class="text-muted mb-0">{{ __('N/A') }}</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Year Level:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            @if(Auth::user()->profile_info)
                                <p class="text-muted mb-0">{{ Auth::user()->profile_info->year_level }}</p>
                            @else
                                <p class="text-muted mb-0">{{ __('N/A') }}</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Address:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            @if(Auth::user()->profile_info)
                                <p class="text-muted mb-0">{{ Auth::user()->profile_info->address }}</p>
                            @else
                                <p class="text-muted mb-0">{{ __('N/A') }}</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                            <p class="mb-0">Phone Number:</p>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-8">
                            @if(Auth::user()->profile_info)
                                <p class="text-muted mb-0">{{ Auth::user()->profile_info->phone_number }}</p>
                            @else
                                <p class="text-muted mb-0">{{ __('N/A') }}</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="mb-3 row">
                        <div class="text-start">
                            @if(Auth::user()->profile_info)
                                {{-- <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#editModalCenters">{{ __('Edit Personal Information') }}</button> --}}
                            @else
                                <button type="button" class="btn btn-primary text-white"  data-bs-toggle="modal" data-bs-target="#exampleModalCenters">{{ __('Add Personal Information') }}</button>
                            @endif
                            <button type="button" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter">{{ __('Edit Profile') }}</button>
                        </div>
                        {{-- @if(Auth::user()->profile_info)
                        <div class="modal fade" id="editModalCenters" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Edit Personal Information') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('user.update.personal.info', Auth::user()->profile_info->id) }}">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="md-3 mb-2">
                                                <label for="phone_number" class="form-label fw-bolder">{{ __('Phone Number:') }}</label>
                                                <input id="phone_number" type="tel"  placeholder="Enter your phone number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->profile_info->phone_number }}" autocomplete="phone_number">
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2">
                                                <label for="address" class="form-label fw-bolder">{{ __('Address:') }}</label>
                                                <input id="address" type="text"  placeholder="Enter your address" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->profile_info->address }}" autocomplete="address">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2">
                                                <label for="email" class="form-label fw-bolder">{{ __('Department:') }}</label>
                                                <select name="department" id="department" class="form-control form-select my-select @error('department') is-invalid @enderror" >
                                                    <option disabled selected>{{ Auth::user()->profile_info->department }}</option>
                                                    <option value=">College of Engineering & Technology">College of Engineering & Technology</option>
                                                    <option value="College of Arts, Humanities & Social Sciences">College of Arts, Humanities & Social Sciences</option>
                                                    <option value="College of Teacher Education">College of Teacher Education</option>
                                                    <option value="College of Maritime Education">College of Maritime Education</option>
                                                    <option value="College of Technical Education">College of Technical Education</option>
                                                    <option value="College of Information and Computing Sciences">College of Information and Computing Sciences</option>
                                                    <option value="Senior High School">Senior High School</option>
                                                    <option value="Graduate School">Graduate School</option>
                                                </select>
                                                @error('department')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2 col-xl-6 ">
                                                <label for="phone" class="form-label fw-bolder">{{ __('Section:') }}</label>
                                                <select name="section" id="section" class="form-control form-select my-select @error('section') is-invalid @enderror" name="section">
                                                    <option disabled selected>{{ Auth::user()->profile_info->section }}</option>
                                                    <option value="A">{{ __('A') }}</option>
                                                    <option value="B">{{ __('B') }}</option>
                                                    <option value="C">{{ __('C') }}</option>
                                                    <option value="D">{{ __('D') }}</option>
                                                </select>
                                                @error('section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2 col-xl-6 ">
                                                <label for="year_level" class="form-label fw-bolder">{{ __('Year level:') }}</label>
                                                <select name="year_level" id="year_level" class="form-control form-select my-select @error('year_level') is-invalid @enderror" name="year_level">
                                                    <option disabled selected>{{ Auth::user()->profile_info->year_level }}</option>
                                                    <option value="1st year">{{ __('1st year') }}</option>
                                                    <option value="2nd year">{{ __('2nd year') }}</option>
                                                    <option value="3rd year">{{ __('3rd year') }}</option>
                                                    <option value="4th year">{{ __('4th year') }}</option>
                                                </select>
                                                @error('year_level')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">{{ __('Add info') }}</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else --}}
                        <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Add Personal Information') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('user.personal.info') }}">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="md-3 mb-2">
                                                <label for="phone_number" class="form-label fw-bolder">{{ __('Phone Number:') }}</label>
                                                <input id="phone_number" type="tel"  placeholder="Enter your phone number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->phone_number }}" autocomplete="phone_number">
                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2">
                                                <label for="address" class="form-label fw-bolder">{{ __('Address:') }}</label>
                                                <input id="address" type="text"  placeholder="Enter your address" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" autocomplete="address">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2">
                                                <label for="student_id"  class="form-label fw-bolder">{{ __('Student ID:') }}</label>
                                                <input id="student_id" type="text" placeholder="Example: CICS-2019120507" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" autocomplete="student_id" autofocus>
                                                @error('student_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2">
                                                <label for="email" class="form-label fw-bolder">{{ __('Department:') }}</label>
                                                <select name="department" id="department" class="form-control form-select my-select @error('department') is-invalid @enderror">
                                                    <option disabled selected>Choose...</option>
                                                    <option value=">College of Engineering & Technology">College of Engineering & Technology</option>
                                                    <option value="College of Arts, Humanities & Social Sciences">College of Arts, Humanities & Social Sciences</option>
                                                    <option value="College of Teacher Education">College of Teacher Education</option>
                                                    <option value="College of Maritime Education">College of Maritime Education</option>
                                                    <option value="College of Technical Education">College of Technical Education</option>
                                                    <option value="College of Information and Computing Sciences">College of Information and Computing Sciences</option>
                                                    <option value="Senior High School">Senior High School</option>
                                                    <option value="Graduate School">Graduate School</option>
                                                </select>
                                                @error('department')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2 col-xl-6 ">
                                                <label for="phone" class="form-label fw-bolder">{{ __('Section:') }}</label>
                                                <select name="section" id="section" class="form-control form-select my-select @error('section') is-invalid @enderror" name="section" value="{{ old('section') }}">
                                                    <option disabled selected>Choose...</option>
                                                    <option value="A">{{ __('A') }}</option>
                                                    <option value="B">{{ __('B') }}</option>
                                                    <option value="C">{{ __('C') }}</option>
                                                    <option value="D">{{ __('D') }}</option>
                                                </select>
                                                @error('section')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="md-3 mb-2 col-xl-6 ">
                                                <label for="year_level" class="form-label fw-bolder">{{ __('Year level:') }}</label>
                                                <select name="year_level" id="year_level" class="form-control form-select my-select @error('year_level') is-invalid @enderror" name="year_level" value="{{ old('year_level') }}">
                                                    <option disabled selected>Choose...</option>
                                                    <option value="1st year">{{ __('1st year') }}</option>
                                                    <option value="2nd year">{{ __('2nd year') }}</option>
                                                    <option value="3rd year">{{ __('3rd year') }}</option>
                                                    <option value="4th year">{{ __('4th year') }}</option>
                                                </select>
                                                @error('year_level')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">{{ __('Add info') }}</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Update Profile') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('/home/update') }}">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="name"  class="form-label fw-bolder">{{ __('Name:') }}</label>
                                            <input id="name" type="text" placeholder="Enter your name" class="form-control border border-primary @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="username"  class="form-label fw-bolder">{{ __('Username:') }}</label>
                                            <input id="username" type="text" placeholder="Enter your username" class="form-control border border-primary @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="md-3">
                                            <label for="email" class="form-label fw-bolder">{{ __('E-Mail Address:') }}</label>
                                            <input id="email" type="email"  placeholder="Enter valid email address (ex: admin@gmail.com)" class="form-control border border-primary @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="md-3">
                                            <label for="phone" class="form-label fw-bolder">{{ __('Phone Number:') }}</label>
                                            <input id="phone" type="tel"  placeholder="Enter your phone number" class="form-control border border-primary @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" autocomplete="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="md-3">
                                            <label for="address" class="form-label fw-bolder">{{ __('Address:') }}</label>
                                            <input id="address" type="text"  placeholder="Enter your address" class="form-control border border-primary  @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" autocomplete="address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">{{ __('Submit Changes') }}</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
