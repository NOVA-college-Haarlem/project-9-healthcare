
<h1>All Appointments</h1>
<a href="{{ route('appointments.create') }}">Make new appointment</a>
<table>
    <thead>
        <tr>
            <th>Doctor</th>
            <th>Scheduled Time</th>
            <th>Status</th>
            <th>Reason</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->doctor->user->name }}</td>
            <td>{{ $appointment->scheduled_time }}</td>
            <td>{{ ucfirst($appointment->confirmation_status) }}</td>
            <td>{{ $appointment->reason }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
