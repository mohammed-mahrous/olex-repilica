{{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

<form action="{{ route('users.update', $user) }}" method="post">
    @method('PUT')
    @csrf
    <x-adminlte-input name="role_id" type='hidden' fgroup-class="col-md-6" :value="old('role_id')??$user->role_id " />
    <div class="d-flex flex-column mt-5">
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="name" label="Name" fgroup-class="col-md-6" :value="old('name') ??$user->name" />
            <x-adminlte-input name="username" label="Username" fgroup-class="col-md-6"
                :value="old('username')??$user->username" />
        </div>
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="email" label="Email" type="email" fgroup-class="col-md-6"
                :value="old('email')??$user->email" />
            <x-adminlte-input name="phone" label="Phone" placeHolder='ex:+20123456789' fgroup-class="col-md-6"
                :value=" old('Phone')??$user->phone " />
        </div>
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="password" label="Password" type='password' fgroup-class="col-md-6" />

            <x-adminlte-input name="password_confirmation" label="Confirm Password" type='password'
                fgroup-class="col-md-6" />
        </div>
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="governorate" label="Governorate" fgroup-class="col-md-6"
                :value="old('governorate')??$user->governorate" />
            <x-adminlte-input name="city" label="City" fgroup-class="col-md-6" :value="old('city')??$user->city " />
        </div>

        <div class="d-flex flex-row justify-content-between mt-1">
            <x-adminlte-button class="btn-flat rounded" type="submit" label="Submit" theme="primary" />
            <a href="{{ url()->previous() }}">
                <x-adminlte-button class="btn-flat rounded" type="button" label="cancel" theme="default" />
            </a>
        </div>
    </div>
</form>
