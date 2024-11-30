@extends('app')
@section('sectionTitle', 'Manage Students')
@section('bodySection')
<div class="content-wrapper">
    <!-- Sidebar -->
    @include('Layout.slidebar')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-4">
            <h2 class="text-center mb-4">
                <i class="fas fa-users me-2"></i> Manage Student List
            </h2>

            <!-- Students Table -->
            <div class="card">
                <div class="card-body">
                    @if($students->isEmpty())
                        <p class="text-center">
                            <i class="fas fa-info-circle me-2"></i> No students found.
                        </p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Name
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Search Name" 
                                                onkeyup="filterTable('nameFilter', 1)">
                                        </th>
                                        <th>
                                            Email
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Search Email" 
                                                onkeyup="filterTable('emailFilter', 2)">
                                        </th>
                                        <th>
                                            Phone
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Search Phone" 
                                                onkeyup="filterTable('phoneFilter', 3)">
                                        </th>
                                        <th>
                                            Address
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm mt-2" 
                                                placeholder="Search Address" 
                                                onkeyup="filterTable('addressFilter', 4)">
                                        </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="studentTable">
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->contact_number }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('edit', $student->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <!-- Delete Button -->
                                                <form 
                                                    action="{{ route('removeID', $student->id) }}" 
                                                    {{-- action=""  --}}
                                                    method="POST" 
                                                    class="d-inline" 
                                                    onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                      
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Filtering -->
<script>
    /**
     * Filters the table rows based on the input.
     * @param {string} inputId - The ID of the input element.
     * @param {number} colIndex - The index of the column to filter.
     */
    function filterTable(inputId, colIndex) {
        const filter = document.querySelector(`#${inputId}`).value.toLowerCase();
        const rows = document.querySelectorAll("#studentTable tr");

        rows.forEach(row => {
            const cell = row.querySelectorAll("td")[colIndex];
            const text = cell ? cell.textContent.toLowerCase() : '';
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    }
</script>
@endsection
