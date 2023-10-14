@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Referral') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('referral.store') }}">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="referral" class="col-md-4 col-form-label text-md-end">{{ __('Referral Code') }}</label>

                            <div class="col-md-6">
                                <input id="referral" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}" required autocomplete="referral" autofocus>

                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Proceed') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
