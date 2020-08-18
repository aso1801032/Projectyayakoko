@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="python/1">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('email') is-invalid @enderror" name="text" value="{{ old('text') }}" required autocomplete="text" autofocus>
                            </div>

                            <div class="col-md-6">
                                <input id="btn" type="submit" class="form-control " name="btn">
                            </div>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
