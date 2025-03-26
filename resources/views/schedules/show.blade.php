<x-base>
    <div class="container">
        <h1 class="mb-4">Medical record Details</h1>
        <a href="/medical_record" class="btn btn-primary mb-3" style="width: 150px;">Back to Records</a>
        <table class="table table-bordered" style="width: 100%; margin: 0 auto;">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th style="width:320px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $record->type }}</td>
                    <td>{{ $record->date }}</td>
                    <td>{{ $record->description }}</td>
                    <td>
                        <div style="display: flex; justify-content: space-between; gap: 20px;">
                            <a href="{{ url('medical_record/edit/' . $record->id) }}" class="btn btn-success btn-sm" style="width: 150px">Edit</a>
                            <form action="{{ route('medical_record.destroy', $record->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 150px;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-base>
