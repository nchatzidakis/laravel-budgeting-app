<x-app-layout>

    <x-slot name="breadcrumbs">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('panel.dashboard') }}">
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('panel.accounts.index') }}">
                    {{ __('Accounts') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                {{ __('Create') }}
            </li>
        </ol>
    </x-slot>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong>{{ __('Account') }}</strong> <small>{{ __('Form') }}</small>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'panel.accounts.store']) !!}
                @include('panel.account.form')
                {!! Form::submit(__('Save'), ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>