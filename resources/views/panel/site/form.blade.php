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
            {!! Form::label('name', 'Name', ['class' => 'awesome']); !!}
            {!! Form::text('name', null, ['class' => 'form-control']); !!}
        </div>
    </div>
</div>