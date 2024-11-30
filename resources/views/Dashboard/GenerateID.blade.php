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

                        <!-- Upload Photo -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">
                                <i class="fas fa-image me-2"></i> Upload Photo
                            </label>
                            <input type="file" class="form-control" id="photo" name="photo" required>
                            <div class="invalid-feedback">Please upload a valid photo (JPEG/PNG).</div>
                        </div>

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user me-2"></i> Full Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                            <div class="invalid-feedback">Please enter your full name.</div>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <i class="fas fa-map-marker-alt me-2"></i> Address
                            </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                            <div class="invalid-feedback">Please enter your address.</div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-3">
                            <label for="dob" class="form-label">
                                <i class="fas fa-calendar-alt me-2"></i> Date of Birth
                            </label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                            <div class="invalid-feedback">Please select a valid date of birth.</div>
                        </div>

                        <!-- Card Expiry Date -->
                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">
                                <i class="fas fa-clock me-2"></i> Card Expiry Date
                            </label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                            <div class="invalid-feedback">Please select a valid expiry date.</div>
                        </div>

                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">
                                <i class="fas fa-phone me-2"></i> Contact Number
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="contact_number" 
                                name="contact_number" 
                                placeholder="Enter contact number" 
                                pattern="^\d{10}$" 
                                required>
                            <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i> Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
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
