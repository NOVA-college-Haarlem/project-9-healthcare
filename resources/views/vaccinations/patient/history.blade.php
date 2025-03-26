<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Vaccinatiegeschiedenis van {{ $patient->user->name }}</h1>
            <a href="{{ route('vaccinations.show', $patient) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Terug naar vaccinatiedetails
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Geboortedatum:</strong> {{ $patient->date_of_birth }}</p>
                    {{-- <p><strong>Leeftijd:</strong> {{ $patient->date_of_birth->age }} jaar</p> --}}
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('vaccinations.patient.certificate', $patient) }}" class="btn btn-primary">
                        Certificaat genereren
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Datum</th>
                            <th>Vaccin</th>
                            <th>Lotnummer</th>
                            <th>Toegediend door</th>
                            <th>Volgende dosis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vaccinations as $vaccination)
                        <tr>
                            <td>{{ $vaccination->administration_date }}</td>
                            <td>{{ $vaccination->vaccine_name }}</td>
                            <td>{{ $vaccination->lot_number ?? 'Onbekend' }}</td>
                            <td>{{ $vaccination->doctor->user->name }}</td>
                            <td>{{ $vaccination->next_dose_date ? $vaccination->next_dose_date : 'N.v.t.' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Geen vaccinaties gevonden</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>