<x-app-layout>

    <x-slot name="breadcrumbs">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('panel.dashboard') }}">
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('panel.sites.index') }}">
                    {{ __('Sites') }}
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
                <strong>{{ __('Site') }}</strong> <small>{{ __('Form') }}</small>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'panel.sites.store']) !!}
                @if ($errors->any())
                    <div class="bg-red-100 text-sm p-3 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include('panel.site.form')
                {!! Form::submit(__('Save'), ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>