{{-- Minimal --}}
<x-adminlte-input name="iBasic" />

{{-- Email type --}}
<x-adminlte-input name="iMail" type="email" placeholder="mail@example.com" />

{{-- With label, invalid feedback disabled and form group class --}}
<div class="row">
    <x-adminlte-input name="iLabel" label="Label" placeholder="placeholder" fgroup-class="col-md-6"
        disable-feedback />
</div>

{{-- With prepend slot --}}
<x-adminlte-input name="iUser" label="User" placeholder="username" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- With append slot, number type and sm size --}}
<x-adminlte-input name="iNum" label="Number" placeholder="number" type="number" igroup-size="sm" min=1 max=10>
    <x-slot name="appendSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-hashtag"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- With multiple slots and lg size --}}
<x-adminlte-input name="iSearch" label="Search" placeholder="search" igroup-size="lg">
    <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-danger" label="Go!" />
    </x-slot>
    <x-slot name="prependSlot">
        <div class="input-group-text text-danger">
            <i class="fas fa-search"></i>
        </div>
    </x-slot>
</x-adminlte-input>
