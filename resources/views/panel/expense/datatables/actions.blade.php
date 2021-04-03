
<a href="{{ route('panel.expenses.edit', $uuid) }}"
   class="mr-2 float-left text-white btn btn-sm btn-warning">
    {{ __('EDIT') }}
</a>

{!! Form::open(['route' => ['panel.expenses.destroy', $uuid], 'method' => 'DELETE', 'class' => 'float-left']) !!}
{!! Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}