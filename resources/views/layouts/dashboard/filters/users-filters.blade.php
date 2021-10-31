<x-adminlte-button theme="default" icon="fas fa-filter" data-toggle="collapse" data-target="#filters"
    aria-expanded="false" aria-controls="filters" title='filters' />
<div id="filters" class="collapse">

    <div class="container ml-5 mt-5">
        <form action="{{ url()->current() }}" method="get">
            <div class="d-inline-flex justify-content-around align-items-center row">

                <div id="user" class="form-group col m-3">
                    {!! Form::label('type', 'types') !!}
                    {!! Form::select('type', $types, request()->get('type'), ['class' => 'form-control select mb-5', 'id' => 'type']) !!}
                </div>
                <div class="row-sm-3">
                    <div class="form-group">
                        {!! Form::submit('Filter', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                </div>
        </form>
        <form action="{{ $resetUrl }}" method="get">
            <div class="form-group">
                {!! Form::submit('reset', ['class' => 'btn btn-warning form-control']) !!}
            </div>
        </form>
    </div>
</div>
</div>
