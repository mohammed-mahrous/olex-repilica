<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <div class="d-flex flex-row justify-content-between mb-5">
        <x-adminlte-input name="name" label="Name" fgroup-class="col-md-6" :value="old('name')" required />
    </div>
    <div class="d-flex flex-row justify-content-between mt-1">
        <x-adminlte-button class="btn-flat rounded" type="submit" label="Submit" theme="primary" />
        <a href="{{ url()->previous() }}">
            <x-adminlte-button class="btn-flat rounded" type="button" label="cancel" theme="default" />
        </a>
    </div>
    </div>
</form>
