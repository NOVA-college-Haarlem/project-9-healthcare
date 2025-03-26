
<div class="container">
    <h1>Vaccinatieoverzicht</h1>
    
    <div class="mb-3">
        <a href="{{ route('vaccinations.create') }}" class="btn btn-primary">Nieuwe vaccinatie registreren</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Alle vaccinaties</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patiënt</th>
                            <th>Vaccin</th>
                            <th>Datum</th>
                            <th>Volgende dosis</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vaccinations as $vaccination)
                        <tr>
                            <td>{{ $vaccination->patient->user->name }}</td>
                            <td>{{ $vaccination->vaccine_name }}</td>
                            <td>{{ $vaccination->administration_date }}</td>
                            <td>{{ $vaccination->next_dose_date ? $vaccination->next_dose_date : 'Niet van toepassing' }}</td>
                            <td>
                                <a href="{{ route('vaccinations.show', $vaccination) }}" class="btn btn-sm btn-info">Bekijken</a>
                                <a href="{{ route('vaccinations.edit', $vaccination) }}" class="btn btn-sm btn-warning">Bewerken</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $vaccinations->links() }}
        </div>
    </div>
</div>