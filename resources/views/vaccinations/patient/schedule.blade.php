<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Vaccinatieschema voor {{ $patient->user->name }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Aankomende vaccinaties</h3>
                    @if($upcoming->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Vaccin</th>
                                        <th>Datum</th>
                                        <th>Vorige toediening</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($upcoming as $vaccination)
                                    <tr>
                                        <td>{{ $vaccination->vaccine_name }}</td>
                                        <td>{{ $vaccination->next_dose_date }}</td>
                                        <td>{{ $vaccination->administration_date }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Geen aankomende vaccinaties gepland.</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h3>Aanbevolen vaccinaties</h3>
                    @if(count($recommended) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Vaccin</th>
                                        <th>Reden</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recommended as $recommendation)
                                    <tr>
                                        <td>{{ $recommendation['name'] }}</td>
                                        <td>{{ $recommendation['description'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Geen aanvullende vaccinaties aanbevolen op basis van leeftijd en gezondheidssstatus.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>