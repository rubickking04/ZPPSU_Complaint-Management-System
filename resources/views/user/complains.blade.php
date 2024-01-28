@extends('user.layouts.index')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="mt-2">Incident Information</h5>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-check me-2"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="alert alert-secondary" role="alert">
                        <p class="fst-italic">{{ __('The Standards of conduct applies, and discipline may be imposed for conduct which occurs on College Premises, at off campus recreational or instructional sites, at my College-sponsored event, or at any College supervised or privded activity, transportation or facility.') }}</p>
                    </div>
                    <form action="{{ route('user.complain.create') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="form-outline text-start col-xl-6">
                                <label for="incident_date" class="col-form-label">{{ __('What date did the incident occur?') }}</label>
                                <div class="input-group">
                                    <input type="date" id="incident_date" placeholder="Example: rubickking04@gmail.com" name="incident_date" class="form-control form-control-lg @error('incident_date') is-invalid @enderror"  value="{{ old('incident_date') }}"/>
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
                                    <input type="text" id="incident_place" placeholder="Enter the place" name="incident_place" class="form-control form-control-lg @error('incident_place') is-invalid @enderror"  value="{{ old('incident_place') }}"/>
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
                                    <textarea id="incident_event" placeholder="Enter the place" name="incident_event" rows=3 class="form-control form-control-lg @error('incident_event') is-invalid @enderror"  value="{{ old('incident_event') }}"></textarea>
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
                                    <textarea id="incident_attempted" placeholder="Enter the place" name="incident_attempted" rows=3 class="form-control form-control-lg @error('incident_attempted') is-invalid @enderror"  value="{{ old('incident_attempted') }}"></textarea>
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
                                    <textarea id="description" placeholder="Enter the place" name="description" rows="6" class="form-control form-control-lg @error('description') is-invalid @enderror"  value="{{ old('description') }}"></textarea>
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
                                    <textarea id="complain_attempts" placeholder="Enter the place" name="complain_attempts" rows="3" class="form-control form-control-lg @error('complain_attempts') is-invalid @enderror"  value="{{ old('complain_attempts') }}"></textarea>
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
                                    <textarea id="solution" placeholder="Enter the place" name="solution" rows="3" class="form-control form-control-lg @error('solution') is-invalid @enderror"  value="{{ old('solution') }}"></textarea>
                                    @error('solution')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-outline text-start mt-2">
                                <label for="file" class="col-form-label fw-bold">{{ __('Attachments: ') }}</label>
                                <input type="file" id="file" placeholder="Enter the place" name="file" accepted-file-types="image/jpeg, image/png" class="form-control form-control-lg @error('file') is-invalid @enderror"  value="{{ old('file') }}"/>
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
                                                <label for="detail" class="col-form-label fst-italic">{{ __('Mark one (1) that apply: ') }}</label>
                                                <div class="row">
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
                        <button type="submit" class="btn btn-primary">{{ __('Submit Form') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
