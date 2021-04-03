<div class="row">
    <div class="col-sm-12">
        @if ($errors->any())
            <ul class="alert alert-danger px-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="form-row col-md-6 col-xs-12 mb-3">
        {!! Form::label('transaction_at', 'Transaction Date', ['class' => 'w-100']); !!}
        {!! Form::hidden('transaction_at', null); !!}
        <div id="datepicker-transaction_at"></div>
    </div>

    <div class="form-row col-md-6 col-xs-12 mb-3">
        {!! Form::label('due_at', 'Due Date', ['class' => 'w-100']); !!}
        {!! Form::hidden('due_at', null); !!}
        <div id="datepicker-due_at"></div>
    </div>

    @foreach($categories as $category)
        <div class="col-md-4 col-sm-12 mb-3">
            <p class="w-100 text-xl">{{ $category->name }}</p>
            @foreach ($category->children as $subcategory)
                <label class="btn btn-info">
                    {!! Form::radio('category_id', $subcategory->id, null); !!}
                    {{ $subcategory->name }}
                </label>
            @endforeach
        </div>
    @endforeach

    <div class="form-row col-md-6 col-xs-12 mb-3">
        {!! Form::label('amount', 'Amount (&euro;)', ['class' => 'w-100']); !!}
        {!! Form::number('amount', null, ['step' => 0.01, 'class' => 'form-control', 'autocomplete' => 'off']); !!}
    </div>

    <div class="col-md-4 col-sm-12 mb-3">
        <p class="w-100 text-xl">Account</p>
        @foreach ($accounts as $account)
            <label class="btn btn-info">
                {!! Form::radio('paid_from', $account->id, null); !!}
                {{ $account->name }}
            </label>
        @endforeach
    </div>

    <div class="form-row col-md-6 col-xs-12 mb-3">
        {!! Form::label('company', 'Company', ['class' => 'w-100']); !!}
        {!! Form::text('company', null, ['class' => 'form-control', 'autocomplete' => 'off']); !!}
    </div>

    <div class="form-row col-md-6 col-xs-12 mb-3">
        {!! Form::label('description', 'Description', ['class' => 'w-100']); !!}
        {!! Form::text('description', null, ['class' => 'form-control', 'autocomplete' => 'off']); !!}
    </div>

    <div class="form-row col-md-6 col-xs-12 mb-3">
        {!! Form::label('notes', 'Notes', ['class' => 'w-100']); !!}
        {!! Form::text('notes', null, ['class' => 'form-control', 'autocomplete' => 'off']); !!}
    </div>
</div>

<x-slot name="scripts">
    <script>
        $(function () {
            $("#datepicker-transaction_at").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function (date) {
                    $("input[name=transaction_at]").val(date);
                }
            });

            $("#datepicker-due_at").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function (date) {
                    $("input[name=due_at]").val(date);
                }
            });

            let availableCompanies = {!! $companies !!};
            $("input[name=company]").autocomplete({
                source: availableCompanies,
            });
        });
    </script>
</x-slot>