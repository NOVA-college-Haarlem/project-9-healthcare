<h1>Manage Appointments</h1>

<div style="margin-bottom: 20px;">
    <a href="{{ route('appointments.calendar') }}" class="btn btn-primary">View Calendar</a>
</div>

<form method="GET" action="{{ route('appointments.manage') }}">
    <label for="doctor_id">Filter by Doctor:</label>
    <select name="doctor_id" id="doctor_id" onchange="this.form.submit()">
        <option value="">All Doctors</option>
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                {{ $doctor->user->name }}
            </option>
        @endforeach
    </select>
</form>

<table>
    <thead>
        <tr>
            <th>Patient</th>
            <th>Scheduled Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->patient->user->name }}</td>
            <td>{{ $appointment->scheduled_time }}</td>
            <td>{{ ucfirst($appointment->confirmation_status) }}</td>
            <td>
                <form action="{{ route('appointments.reschedule', $appointment->id) }}" method="POST">
                    @csrf
                    <input type="datetime-local" name="rescheduled_time" id="rescheduled_time" required>
                    <button type="submit">Reschedule</button>
                </form>
                @if ($appointment->confirmation_status === 'pending')
                <form action="{{ route('appointments.approve', $appointment) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Approve</button>
                </form>
                @endif
                <form action="{{ route('appointments.cancel', $appointment) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Cancel</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
