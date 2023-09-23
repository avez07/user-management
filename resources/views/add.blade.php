@extends('layout.main')

@push('tittle')
    <title>add user</title>
@endpush


@section('main-section')
    <div class="container-fluid">


        <div class="d-flex justify-content-center align-items-center login-form">
            <form action="{{ route('insert') }}" method="POST" class="shadow bg-body-tertiary rounded" id="add_form"
                style="width: 50%">
                @csrf
                <h2 class="text-capitalize text-center">add user</h2>
                <div class="row">
                    <div class="col-md-6">
                        <x-registration type="text" label="enter your name" name="name"
                            value="{{ old('name') }}" />
                    </div>

                    <div class="col-md-6">
                        <x-registration type="email" label="enter your email" name="email"
                            value="{{ old('email') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-registration type="text" label="enter your phone number" name="phone"
                            value="{{ old('phone') }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="text-capitalize mb-2">enter your location</label>
                        <select name="location" class="form-select">
                            <option value="">Select a location</option>
                            <option value="Mumbai" {{ old('location') == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                            <option value="Pune" {{ old('location') == 'Pune' ? 'selected' : '' }}>Pune</option>
                            <option value="Delhi" {{ old('location') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                            <option value="Bangalore" {{ old('location') == 'Bangalore' ? 'selected' : '' }}>Bangalore
                            </option>
                            <option value="Chennai" {{ old('location') == 'Chennai' ? 'selected' : '' }}>Chennai</option>
                            <option value="Kolkata" {{ old('location') == 'Kolkata' ? 'selected' : '' }}>Kolkata</option>
                            <option value="Hyderabad" {{ old('location') == 'Hyderabad' ? 'selected' : '' }}>Hyderabad
                            </option>
                            <option value="Ahmedabad" {{ old('location') == 'Ahmedabad' ? 'selected' : '' }}>Ahmedabad
                            </option>
                            <option value="Jaipur" {{ old('location') == 'Jaipur' ? 'selected' : '' }}>Jaipur</option>
                            <option value="Lucknow" {{ old('location') == 'Lucknow' ? 'selected' : '' }}>Lucknow</option>
                        </select>
                        <span class="text-danger text">
                            @error('location')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-6">
                        <x-registration type="date" label="date of birth" name="dob" value="{{ old('dob') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-registration type="password" label="create your password" name="password" value="" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary text-bold login-btn">add</button>
            </form>
        </div>

    </div>
@endsection
