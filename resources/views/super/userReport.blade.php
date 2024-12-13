@extends('admin.layout')

@section('content')
<h1>User Report</h1>

<!-- Search Box -->
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search reports...">
</div>

<!-- Table -->
<table class="table table-striped table-bordered table-hover" id="userReportTable">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Activity</th>
            <th scope="col">Time</th>
            <th scope="col">Actions</th> <!-- Action Column -->
        </tr>
    </thead>
    <tbody>
       
            @foreach ($reports as $report)
            <tr>
                <td>{{ $report['name'] }}</td>
                <td>{{ $report['activity'] }}</td>
                <td>{{ \Carbon\Carbon::parse($report['time'])->format('Y-m-d H:i:s') }}</td>
                <td>
                    <!-- Action Buttons -->
                    {{-- <a href="{{ route('admin.viewReport', $report['id']) }}" class="btn btn-info btn-sm" title="View">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <a href="{{ route('admin.editReport', $report['id']) }}" class="btn btn-warning btn-sm" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a> --}}
                    <form action="" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this report?');">
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
