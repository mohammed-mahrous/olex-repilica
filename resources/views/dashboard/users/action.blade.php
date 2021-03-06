{!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('users.show', $id) }}" class='btn btn-primary btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i> View
    </a>
    <a href="{{ route('users.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i> Edit
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
