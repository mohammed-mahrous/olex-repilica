<x-adminlte-button theme="default" icon="fas fa-filter" data-toggle="collapse" data-target="#filters"
    aria-expanded="false" aria-controls="filters" title='filters' />
<div id="filters" class="collapse">

    <div class="container ml-5 mt-5">
        <small class="text-muted">use CTRL button for multiple selections</small>
        <form action="{{ url()->current() }}" method="get">
            <div class="d-inline-flex justify-content-around align-items-center row">

                <div id="user" class="form-group col-sm-3">
                    {!! Form::label('user', 'users') !!}
                    {!! Form::select('users[]', $users, request()->get('users'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'size' => '3', 'id' => 'users']) !!}
                </div>

                <div id="category" class="form-group col-sm-3">

                    {!! Form::label('category', 'categories') !!}
                    {!! Form::select('categories[]', $categories, request()->get('categories'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'size' => '3', 'id' => 'category']) !!}
                </div>
                <div id="tags" class="form-group col-sm-3">
                    {!! Form::label('tag', 'tags') !!}
                    {!! Form::select('tags[]', $tags, request()->get('tags'), ['class' => 'form-control select2', 'size' => '3', 'multiple' => 'multiple', 'id' => 'tag']) !!}
                </div>
                <div id="approval" class="form-group col-sm-3">
                    {!! Form::label('approval', 'approval') !!}
                    {!! Form::select('approval', ['approved' => 'approved', 'disapproved' => 'disapproved', 'pending' => 'pending'], request()->get('approval'), ['class' => 'form-control select2', 'id' => 'approval']) !!}
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
