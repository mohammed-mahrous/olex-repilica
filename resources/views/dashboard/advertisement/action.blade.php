@if ($approved == true && $Disapproved == false)
    <div class='btn-group'>
        <a href="{{ route('Advertisements.show', $id) }}" class='btn btn-primary btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i> View
        </a>
        <a href="{{ route('Advertisements.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i> Edit
        </a>
    </div>
@elseif ($approved == false && $Disapproved == true)
    {!! Form::open(['route' => ['Advertisements.destroy', $id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('Advertisements.show', $id) }}" class='btn btn-primary btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i> View
        </a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-xs',
    'onclick' => "return confirm('Are you sure?')",
]) !!}
    @else
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
@endif



{{-- {!! Form::open(['route' => ['Advertisements.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('Advertisements.show', $id) }}" class='btn btn-primary btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i> View
    </a>
    <a href="{{ route('Advertisements.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i> Edit
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!} --}}
