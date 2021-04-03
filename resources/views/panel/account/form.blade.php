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
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('type', 'Type', ['class' => 'awesome']); !!}
            {!! Form::select('type', \App\Models\Account::$types, null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('currency', 'Currency', ['class' => 'awesome']); !!}
            {!! Form::select('currency', \App\Models\Account::$currencies, null, ['class' => 'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'awesome']); !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('initial_amount', 'Initial Amount', ['class' => 'awesome']); !!}
            {!! Form::number('initial_amount', null, ['class' => 'form-control', 'step' => 0.01]); !!}
        </div>
    </div>
</div>