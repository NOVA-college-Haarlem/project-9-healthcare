<!-- filepath: resources/views/appointments/index.blade.php -->
<h1>Appointments</h1>

<form method="GET" action="{{ route('appointments.index') }}">
    <label for="patient_id">Filter by Patient:</label>
    <select name="patient_id" id="patient_id" onchange="this.form.submit()">
        <option value="">All Patients</option>
        @foreach ($patients as $patient)
            <option value="{{ $patient->id }}" {{ request('patient_id') == $patient->id ? 'selected' : '' }}>
                {{ $patient->user->name }}
            </option>
        @endforeach
    </select>
</form>

<table>
    <thead>
        <tr>
            <th>Doctor</th>
            <th>Scheduled Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->doctor->user->name }}</td>
            <td>{{ $appointment->scheduled_time }}</td>
            <td>{{ ucfirst($appointment->confirmation_status) }}</td>
            <td>
                <form action="{{ route('appointments.cancel', $appointment) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Cancel</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
