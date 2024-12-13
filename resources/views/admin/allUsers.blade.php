@extends('admin.layout')

@section('content')
<h1>User Management</h1>

<!-- Search Box -->
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search reports...">
</div>

<!-- Table -->
<table class="table table-striped table-bordered table-hover" id="userReportTable">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Meter Number</th>
            <th scope="col">Date Registered</th>
            <th scope="col">Actions</th> <!-- Action Column -->
        </tr>
    </thead>
    <tbody>
        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
       
            @foreach ($users as $user)
            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['phone'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['meter_number'] }}</td>
                <td>{{ \Carbon\Carbon::parse($user['created_at'])->format('Y-m-d H:i:s') }}</td>
                <td>
                    <!-- Action Buttons -->
                    <a href="{{ route('admin.profile', ['id' => $user->id]) }}" class="btn btn-info btn-sm" title="View">
                        <i class="fas fa-eye"></i> View/Edit
                    </a>
                    <form action="{{route('users.destroy',['id'=>$user->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this report?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
    
    </tbody>
</table>

{{-- <!-- Pagination (If using Laravel's built-in pagination) -->
{{ $reports->links() }} --}}

<script>
    // JavaScript for search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#userReportTable tbody tr');

        rows.forEach(row => {
            let cells = row.getElementsByTagName('td');
            let match = false;

            for (let i = 0; i < cells.length; i++) {
                if (cells[i].textContent.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            row.style.display = match ? '' : 'none';
        });
    });
</script>
@endsection
