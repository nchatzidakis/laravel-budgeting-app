<x-app-layout>

    <x-slot name="breadcrumbs">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">
                <a href="{{ route('panel.dashboard') }}">
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="breadcrumb-item">
                {{ __('Expenses') }}
            </li>
        </ol>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('panel.expenses.create') }}" class="text-white font-2xl">
                        <i class="fas fa-plus"></i>
                        {{ __('Add new') }}
                    </a>
                    <table id="dataTable" class="table table-bordered mt-3 text-center"></table>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            $(function() {
                $('#dataTable').DataTable({
                    ordering: true,
                    processing: true,
                    order: [[ 1, "desc" ]],
                    serverSide: true,
                    ajax: '{!! route('datatables.panel.expenses.default') !!}',
                    columns: [
                        {
                            title: '{{ __('Category') }}',
                            data: 'category_label',
                            name: 'category_id',
                            searchable: true,
                            orderable: true
                        },
                        {
                            title: '{{ __('Paid From') }}',
                            data: 'paid_from_label',
                            name: 'paid_from',
                            searchable: true,
                            orderable: true
                        },
                        {
                            title: '{{ __('Amount') }}',
                            data: 'amount_label',
                            name: 'amount',
                            searchable: true,
                            orderable: true
                        },
                        {
                            title: '{{ __('Company') }}',
                            data: 'company',
                            searchable: true,
                            orderable: true
                        },
                        {
                            title: '{{ __('Transaction Date') }}',
                            data: 'transaction_at',
                            searchable: true,
                            orderable: true
                        },
                        {
                            title: '{{ __('Due Date') }}',
                            data: 'due_at',
                            searchable: true,
                            orderable: true
                        },
                        {
                            title: '{{ __('Actions') }}',
                            data: 'actions',
                            searchable: false,
                            orderable: false
                        },
                    ],
                });
            });
        </script>
    </x-slot>
</x-app-layout>