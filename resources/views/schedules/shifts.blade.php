<x-base>
    <div class="container">
        <h2 class="mb-4 text-center">Weekly Doctor Schedule</h2>

        <!-- Filter Bar -->
        <div class="mb-4">
            <label for="doctorFilter" class="form-label">Filter by Doctor:</label>
            <select id="doctorFilter" class="form-select">
                <option value="all">All Doctors</option>
                @foreach ($schedules->whereNotNull('doctor_id')->unique('doctor_id') as $schedule)
                    @if ($schedule->doctor)
                        <option value="{{ $schedule->doctor->id }}">{{ $schedule->doctor->name }}</option>
                @endif
            @endforeach
            
            </select>
        </div>

        <div class="table-responsive d-flex justify-content-center">
            <table class="table text-center" style="max-width: 1000px; border-collapse: separate; border-spacing: 0;">
                <thead>
                    <tr>
                        <th style="border-right: 1px solid #ddd; width:100px;"></th>
                        @foreach (["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"] as $day)
                            <th style="border-right: 1px solid #ddd; width: 120px;">{{ $day }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @for ($hour = 6; $hour <= 23; $hour++) 
                        <tr>
                            <td style="border-right: 1px solid #ddd;">{{ sprintf('%02d:00', $hour) }}</td>
                            @foreach (["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"] as $day)
                                <td style="border-right: 1px solid #ddd; border-top: none; border-bottom: none;">
                                    @foreach ($schedules as $schedule)
                                        @if ($schedule->doctor_id && $schedule->doctor) 
                                            @if (\Carbon\Carbon::parse($schedule->date)->format('l') === $day && \Carbon\Carbon::parse($schedule->start_time)->hour == $hour)
                                                <span class="badge bg-primary" data-doctor-id="{{ $schedule->doctor_id }}">
                                                    {{ $schedule->doctor->name }}
                                                </span>
                                            @endif
                                        @endif                                
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</x-base>

    <script>
        document.getElementById('doctorFilter').addEventListener('change', function () {
        let selectedDoctor = this.value;
        let scheduleBadges = document.querySelectorAll('[data-doctor-id]');

        scheduleBadges.forEach(badge => {
            if (selectedDoctor === 'all' || badge.getAttribute('data-doctor-id') == selectedDoctor) {
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
    });
});
    </script>