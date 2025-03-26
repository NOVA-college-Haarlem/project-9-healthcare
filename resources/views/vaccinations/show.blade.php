<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Vaccinatiedetails</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Patiëntinformatie</h3>
                    <p><strong>Naam:</strong> {{ $vaccination->patient->user->name }}</p>
                    <p><strong>Geboortedatum:</strong> {{ $vaccination->patient->date_of_birth }}</p>
                    {{-- <p><strong>Leeftijd:</strong> {{ $vaccination->patient->date_of_birth->age }} jaar</p> --}}
                </div>
                <div class="col-md-6">
                    <h3>Vaccinatiegegevens</h3>
                    <p><strong>Vaccin:</strong> {{ $vaccination->vaccine_name }}</p>
                    <p><strong>Toegediend op:</strong> {{ $vaccination->administration_date }}</p>
                    <p><strong>Lotnummer:</strong> {{ $vaccination->lot_number ?? 'Onbekend' }}</p>
                    <p><strong>Volgende dosis:</strong> {{ $vaccination->next_dose_date ? $vaccination->next_dose_date : 'Niet van toepassing' }}</p>
                    <p><strong>Toegediend door:</strong> {{ $vaccination->doctor->user->name }} ({{ $vaccination->doctor->specialization }})</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('vaccinations.edit', $vaccination) }}" class="btn btn-warning">Bewerken</a>
            <a href="{{ route('vaccinations.patient.history', $vaccination->patient) }}" class="btn btn-info">Volledige vaccinatiegeschiedenis</a>
            <a href="{{ route('vaccinations.index') }}" class="btn btn-secondary">Terug naar overzicht</a>
        </div>
    </div>
</div>
