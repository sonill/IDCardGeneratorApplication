@extends('app')

@section('sectionTitle', 'Edit ID Card')
@section('bodySection')
<div class="content-wrapper">
    @include('Layout.slidebar')

    <div class="main-content">
        <div class="container py-4">
            <h2 class="text-center mb-4">Edit ID Card</h2>
            <form action="{{ route('update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- <!-- Upload Photo --> --}}
                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>

                <!-- Name -->
                <div class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                    </div>
                

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}" required>
                </div>
             
             

                <!-- Date of Birth -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{$student->dob}}" required>
                </div>

                <!-- Card Expiry Date -->
                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Card Expiry Date</label>
                    <input type="date" class="form-control" id="expiry_date " name="expiry_date"  value="expiry_date" required>
                </div>

                <!-- Contact Number -->
                <div class="mb-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" value="" name="contact_number" placeholder="Enter contact number" required>
                </div>

                <!-- Email -->
                

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                </div>
                <!-- Add more fields as needed -->
                <button type="submit" class="btn btn-success">Update</button>
                <a href="#" class="btn btn-secondary">Cancel</a>
                {{-- <a href="{{ route('list.students') }}" class="btn btn-secondary">Cancel</a> --}}
            </form>
        

            
               
        </div>
    </div>
</div>
@endsection
