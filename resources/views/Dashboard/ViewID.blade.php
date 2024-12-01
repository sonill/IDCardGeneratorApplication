@extends('app')
@section('sectionTitle', 'View ID')
@section('bodySection')
<div class="content-wrapper">
    <!-- Sidebar -->
    @include('Layout.slidebar')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-4">
            <h2 class="text-center mb-4">
                <i class="fas fa-id-card me-2"></i> View ID Cards
            </h2>

            <!-- Display ID Cards -->
            <div class="row">
                @if($data1->isEmpty())
                    <p class="text-center">
                        <i class="fas fa-exclamation-circle me-2"></i> No ID Cards available to display.
                    </p>
                @else
                    @foreach($data1 as $list)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm" style="border: none; border-radius: 15px;">
                                <!-- ID Card Container with Background -->
                                <div id="id-card-{{ $list->id }}" 
                                     style="padding: 20px; border-radius: 10px; 
                                            background-image: url('{{ asset('image/backGround.png') }}'); 
                                            background-size: 450px; 
                                            background-position: center; 
                                            background-repeat: no-repeat; 
                                            opacity: 100;">
                                    <!-- Logo Header -->
                                    <div class="text-center mb-3">
                                        {{-- <img src="{{ asset('image/logo.png') }}" alt="Company Logo" width="50"> --}}
                                        <h6 class="mt-2" style="font-size: 1.2rem; font-weight: bold;">{{ $list->company_name ?? 'Your Company Name' }}</h6>
                                    </div>
            
                                    <!-- Photo -->
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('storage/' . $list->photo) }}" alt="ID Photo" class="rounded-circle" width="90" height="90" style="border: 3px solid #004aad;">
                                    </div>
            
                                    <!-- Name and Role -->
                                    <div class="text-center mb-3">
                                        <h5 class="mb-0" style="font-size: 1.4rem; color:rgb(226, 235, 243) font-weight: bold;">{{ strtoupper($list->name) }}</h5>
                                        <small style="font-size: 1rem; color: #555;">{{ $list->role ?? 'Employee' }}</small>
                                    </div>
            
                                    <!-- Details Section -->
                                    <div class="text-start ps-3">
                                        <p class="mb-2" style="font-size: 1rem; font-weight: bold;"><strong>ID No:</strong>  {{ $list->id }}</p>
                                        <p class="mb-2" style="font-size: 1rem;"><strong>Email:</strong>  {{ $list->email }}</p>
                                        <p class="mb-2" style="font-size: 1rem;"><strong>Phone:</strong>  {{ $list->contact_number }}</p>
                                        <p class="mb-2" style="font-size: 1rem;"><strong>Address:</strong>  {{ $list->address }}</p>
                                        <p class="mb-2" style="font-size: 1rem;"><strong>Date of Birth:</strong>  {{ $list->dob }}</p>
                                        <p class="mb-2" style="font-size: 1rem;"><strong>Expiry Date:</strong>  {{ $list->expiry_date }}</p>
                                    </div>
                                </div>
            
                                <!-- Footer with Actions -->
                                <div class="text-center mt-3">
                                    <!-- Delete Form -->
                                    <form action="{{ route('removeID', $list->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure you want to delete this ID card?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                    
                                    <!-- Update Button -->
                                    <a href="{{ route('edit', $list->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
            
                                    <!-- Print Button -->
                                    <button class="btn btn-success btn-sm" onclick="printID({{ $list->id }})">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            
        </div>
    </div>
</div>

<!-- JavaScript to Handle Print -->
<script>
    function printID(id) {
        // Get the content of the selected ID card
        const printContent = document.querySelector(`#id-card-${id}`).innerHTML;
        
        // Create a new window for printing
        const printWindow = window.open('', '_blank');
        
        // Add the content to the new window
        printWindow.document.open();
        printWindow.document.write(`
            <html>
                <head>
                    <title>ID Card</title>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                </head>
                <body onload="window.print(); window.close();">
                    <div class="container mt-5">
                        ${printContent}
                    </div>
                </body>
            </html>
        `);
        printWindow.document.close();
    }
</script>
@endsection
