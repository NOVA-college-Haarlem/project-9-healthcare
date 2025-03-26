<a href="{{ route('appointments.index') }}">back</a>
<h1>create new appointment</h1>
<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <select name="doctor_id" id="doctor_id" required>
        @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
        @endforeach
    </select>
    <input type="datetime-local" name="scheduled_time" id="scheduled_time" required>
    <textarea name="reason" id="reason" required></textarea>
    <button type="submit">Schedule</button>
</form>
