@extends('statamic::layout')
@section('title', 'Connect')

@section('content')
    <header class="mb-3">
        <div class="flex items-center justify-between">
            <h1>{{ __('Connect') }}</h1>
        </div>
    </header>

    <div class="card p-0 mb-4">
        <div class="p-2">
            <div class="flex justify-between items-center">
                <div class="pr-4">
                    <h2 class="font-bold">{{ __('Connect account') }}</h2>
                    <p class="text-grey text-sm my-1">Log in with your account to connect.</p>
                </div>

                <div class="login-oauth-providers">
                    <!-- Single provider needed -->
                    @foreach ($providers as $provider)
                        <div class="provider mb-1">
                            <a href="{{ $provider->loginUrl() }}?redirect={{ parse_url(cp_route('index'))['path'] }}" class="btn block btn-primary">
                                {{ __('Log in with :provider', ['provider' => $provider->label()]) }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
