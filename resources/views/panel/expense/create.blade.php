<x-app-layout>

    <x-slot name="breadcrumbs">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('panel.dashboard') }}">
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('panel.expenses.index') }}">
                    {{ __('Expenses') }}
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
                <strong>{{ __('Expense') }}</strong> <small>{{ __('Form') }}</small>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'panel.expenses.store']) !!}
                @include('panel.expense.form')
                {!! Form::submit(__('Save'), ['class' => 'btn btn-success float-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>