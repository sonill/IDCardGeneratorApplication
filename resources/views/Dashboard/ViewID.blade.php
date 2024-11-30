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
                            <div class="card mb-4 shadow-sm">
                                <!-- Unique ID Card Container -->
                                <div id="id-card-{{ $list->id }}">
                                    <div class="card-header bg-dark text-white text-center">
                                        <h5 class="card-title">
                                            <i class="fas fa-user me-2"></i> {{ $list->name }}
                                        </h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <!-- Photo -->
                                        <img src="{{ asset('storage/' . $list->photo) }}" alt="ID Photo" class="rounded-circle mb-3" width="100" height="100">

                                        <!-- Address -->
                                        <p class="mb-2">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            <strong>Address:</strong> {{ $list->address }}
                                        </p>

                                        <!-- Date of Birth -->
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <strong>Date of Birth:</strong> {{ $list->dob }}
                                        </p>

                                        <!-- Expiry Date -->
                                        <p class="mb-2">
                                            <i class="fas fa-clock me-2"></i>
                                            <strong>Expiry Date:</strong> {{ $list->expiry_date }}
                                        </p>

                                        <!-- Contact Number -->
                                        <p class="mb-2">
                                            <i class="fas fa-phone me-2"></i>
                                            <strong>Contact:</strong> {{ $list->contact_number }}
                                        </p>

                                        <!-- Email -->
                                        <p class="mb-0">
                                            <i class="fas fa-envelope me-2"></i>
                                            <strong>Email:</strong> {{ $list->email }}
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-2"></i> ID Card Valid Until {{ $list->expiry_date }}
                                        </small>
                                    </div>
                                </div>
                                
                                <div class="card-footer text-center">
                                    <!-- Delete Form -->
                                    <form action="{{ route('removeID', $list->id) }} " class="d-inline" method="POST" onsubmit="return confirm('Are you sure you want to delete this ID card?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                    {{-- <form action="{{route('delete'),$list->$id}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this ID card?');">
                                        @csrf
                                       
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form> --}}
                                    
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
