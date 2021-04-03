<x-app-layout>

    <x-slot name="breadcrumbs">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('panel.dashboard') }}">
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                {{ __('Accounts') }}
            </li>
        </ol>
    </x-slot>

    <div class="row">
        @foreach ($accounts as $account)
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted mb-2 font-2xl">
                            {{ $account->name }}
                        </div>
                        <div class="text-value-lg mb-2">
                            xxxxx &euro;
                        </div>
                        <a href="{{ route('panel.accounts.show', $account->uuid) }}" class="mr-2 btn btn-sm btn-info">
                            {{ __('SHOW') }}
                        </a>
                        <a href="{{ route('panel.accounts.edit', $account->uuid) }}"
                           class="mr-2 btn btn-sm btn-outline-warning">
                            {{ __('EDIT') }}
                        </a>
                        {!! Form::open(['route' => ['panel.accounts.destroy', $account->uuid], 'method' => 'DELETE', 'class' => 'float-right']) !!}
                        {!! Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-outline-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-sm-6 col-md-2">
            <div class="card bg-success">
                <div class="card-body py-4">
                    <a href="{{ route('panel.accounts.create') }}" class="text-white font-2xl">
                        <i class="fas fa-plus"></i>
                        {{ __('Add new') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
