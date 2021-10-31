{{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <x-adminlte-input name="type" type='hidden' fgroup-class="col-md-6" disable-feedback :value="2" required />
    <div class="d-flex flex-column mt-5">
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="name" label="Name" fgroup-class="col-md-6" :value="old('name')" required />
            <x-adminlte-input name="username" label="Username" fgroup-class="col-md-6" :value="old('username')"
                required />
        </div>
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="email" label="Email" type="email" fgroup-class="col-md-6" :value="old('email')"
                required />
            <x-adminlte-input name="phone" label="Phone" type="text" placeHolder='ex:+20123456789'
                fgroup-class="col-md-6" :value="old('phone')?? '' " required />
        </div>
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="password" label="Password" type='password' fgroup-class="col-md-6" required />
            <x-adminlte-input name="password_confirmation" label="Confirm Password" type='password'
                fgroup-class="col-md-6" required />
        </div>
        <div class="d-flex flex-row justify-content-between mb-5">
            <x-adminlte-input name="governorate" label="Governorate" fgroup-class="col-md-6"
                :value="old('governorate')?? ''" required />
            <x-adminlte-input name="city" label="City" fgroup-class="col-md-6" :value="old('city') ?? '' "
                required />
        </div>

        <div class="d-flex flex-row justify-content-between mt-1">
            <x-adminlte-button class="btn-flat rounded" type="submit" label="Submit" theme="primary" />
            <a href="{{ url()->previous() }}">
                <x-adminlte-button class="btn-flat rounded" type="button" label="cancel" theme="default" />
            </a>
        </div>
    </div>
</form>
