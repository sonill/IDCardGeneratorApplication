@extends('app')
@section('sectionTitle', 'Generate ID')
@section('bodySection')
<div class="content-wrapper">
    <!-- Sidebar -->
    @include('Layout.slidebar')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-4">
            <h2 class="text-center mb-4">Generate ID</h2>

            <!-- Form for ID Generation -->
            <div class="card">
                <div class="card-body">

                    <form id="generate-id-form" action="{{ route('store1') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                    
                        <!-- Global Error Display -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <!-- Upload Photo -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">
                                <i class="fas fa-image me-2"></i> Upload Photo
                            </label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-2"></i> Full Name
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter full name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <i class="fas fa-map-marker-alt me-2"></i> Address
                            </label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Enter address">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Date of Birth -->
                        <div class="mb-3">
                            <label for="dob" class="form-label">
                                <i class="fas fa-calendar-alt me-2"></i> Date of Birth
                            </label>
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                            @error('dob')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Card Expiry Date -->
                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">
                                <i class="fas fa-clock me-2"></i> Card Expiry Date
                            </label>
                            <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}">
                            @error('expiry_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">
                                <i class="fas fa-phone me-2"></i> Contact Number
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('contact_number') is-invalid @enderror" 
                                id="contact_number" 
                                name="contact_number" 
                                value="{{ old('contact_number') }}" 
                                placeholder="Enter contact number" 
                                pattern="^\d{10}$">
                            @error('contact_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i> Email
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-id-card me-2"></i> Generate ID
                            </button>
                        </div>
                    </form>
                    
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Add Bootstrap validation styling for real-time validation
    (function () {
        'use strict';

        // Fetch all forms we want to apply custom validation to
        const forms = document.querySelectorAll('#generate-id-form');

        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);

            // Real-time validation for inputs
            form.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', function () {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            });
        });
    })();
</script>
@endsection
