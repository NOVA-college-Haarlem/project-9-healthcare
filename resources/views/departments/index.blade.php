<x-base>
    <div class="container">
        <h1 style="margin-top: 20px">Medical Records</h1>
        <a href="/medical_record/create" class="btn btn-primary mb-3" style="width: 200px;">Add a Medical Record</a>
        <h4>Here we can look at the medical records of the signed in kids, to see if they need any extra help from us.</h4>
        <br></br>
    </div>

    <div class="container">
        <table id="recordsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type of Surgery</th>
                    <th style="width: 120px">Date</th>
                    <th>About</th>
                    <th style="width: 120px">Belongs to</th>
                    <th style="width: 330px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr class="record-row">
                        <td>{{ $record->id }}</td>
                        <td class="record-type"><b>{{ $record->type }}</b></td>
                        <td class="record-date">{{ $record->date }}</td>
                        <td>{{ $record->description }}</td>
                        <td>
                            @foreach ($record->children as $child)
                                <b>{{ $child->firstname }} {{$child->lastname}}</b>
                            @endforeach
                        </td>
                        <td>
                            <div style="justify-content:space-between;">
                                <a href="/medical_record/edit/{{ $record->id }}" class="btn btn-success mb-3" style="width: 150px;">Edit</a>
                                <form 
                                    action="{{ route('medical_record.destroy', $record->id) }}" 
                                    method="POST" 
                                    style="display: inline;" 
                                    onsubmit="return confirmDelete();"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-3" style="width: 150px;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-base>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const dateFilter = document.getElementById("dateFilter");
        const recordsTable = document.getElementById("recordsTable");
        const recordRows = recordsTable.querySelectorAll(".record-row");

        // Search function
        searchInput.addEventListener("input", function() {
            const searchValue = this.value.toLowerCase();
            recordRows.forEach(row => {
                const type = row.querySelector(".record-type").textContent.toLowerCase();
                row.style.display = type.includes(searchValue) ? "" : "none";
            });
        });

        // Filter by date
        dateFilter.addEventListener("change", function() {
            const selectedDate = this.value;
            recordRows.forEach(row => {
                const recordDate = row.querySelector(".record-date").textContent;
                row.style.display = selectedDate === "" || recordDate === selectedDate ? "" : "none";
            });
        });
    });

    function confirmDelete() {
        return confirm('Are you sure you want to delete this record? This action cannot be undone.');
    }
</script>
