<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0">Vaccinatieherinneringen</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h3 class="mb-0">Binnenkort vervallend</h3>
                        </div>
                        <div class="card-body">
                            @if($dueVaccines->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Patiënt</th>
                                                <th>Vaccin</th>
                                                <th>Vervaldatum</th>
                                                <th>Actie</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dueVaccines as $vaccination)
                                            @php
                                                $daysRemaining = floor((strtotime($vaccination->next_dose_date) - time()) / (60 * 60 * 24));
                                            @endphp
                                            <tr>
                                                <td>{{ $vaccination->patient->user->name }}</td>
                                                <td>{{ $vaccination->vaccine_name }}</td>
                                                <td>
                                                    {{ date('d-m-Y', strtotime($vaccination->next_dose_date)) }}
                                                    <span class="badge badge-warning ml-2">
                                                        @if($daysRemaining == 0)
                                                            Vandaag
                                                        @elseif($daysRemaining == 1)
                                                            Morgen
                                                        @else
                                                            Over {{ $daysRemaining }} dagen
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('vaccinations.patient.history', $vaccination->patient) }}" 
                                                       class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i> Bekijk
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle"></i> Geen vaccinaties die binnenkort vervallen.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h3 class="mb-0">Vervallen vaccinaties</h3>
                        </div>
                        <div class="card-body">
                            @if($overdueVaccines->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Patiënt</th>
                                                <th>Vaccin</th>
                                                <th>Vervaldatum</th>
                                                <th>Status</th>
                                                <th>Actie</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($overdueVaccines as $vaccination)
                                            @php
                                                $daysOverdue = floor((time() - strtotime($vaccination->next_dose_date)) / (60 * 60 * 24));
                                            @endphp
                                            <tr>
                                                <td>{{ $vaccination->patient->user->name }}</td>
                                                <td>{{ $vaccination->vaccine_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($vaccination->next_dose_date)) }}</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        @if($daysOverdue == 1)
                                                            Gisteren vervallen
                                                        @else
                                                            {{ $daysOverdue }} dagen vervallen
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('vaccinations.patient.history', $vaccination->patient) }}" 
                                                       class="btn btn-sm btn-warning">
                                                        <i class="fas fa-exclamation-triangle"></i> Bekijk
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle"></i> Geen vervallen vaccinaties.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>