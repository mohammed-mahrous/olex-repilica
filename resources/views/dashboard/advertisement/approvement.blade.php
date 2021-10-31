<div class="btn-group">
    {!! Form::open(['route' => ['Advertisements.approve', $model], 'method' => 'post']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> approve', [
    'type' => 'submit',
    'class' => 'btn btn-primary btn-xs',
]) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['Advertisements.disapprove', $model], 'method' => 'post']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> disapprove', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-xs',
]) !!}
    {!! Form::close() !!}
</div>
