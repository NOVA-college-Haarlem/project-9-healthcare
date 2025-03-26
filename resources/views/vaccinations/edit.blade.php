<div class="container">
    <h1>Vaccinatie bewerken</h1>

    <form action="{{ route('vaccinations.update', $vaccination) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Voeg een hidden field toe voor patient_id en doctor_id -->
        <input type="hidden" name="patient_id" value="{{ $vaccination->patient_id }}">
        <input type="hidden" name="doctor_id" value="{{ $vaccination->doctor_id }}">

        <div class="card mb-3">
            <div class="card-header">Basisinformatie</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Patiënt</label>
                            <p class="form-control-static">{{ $vaccination->patient->user->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Arts</label>
                            <p class="form-control-static">{{ $vaccination->doctor->user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">Vaccinatiedetails</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vaccine_name">Vaccinnaam</label>
                            <input type="text" name="vaccine_name" id="vaccine_name" class="form-control" value="{{ $vaccination->vaccine_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lot_number">Lotnummer</label>
                            <input type="text" name="lot_number" id="lot_number" class="form-control" value="{{ $vaccination->lot_number }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="administration_date">Toedieningsdatum</label>
                            <input type="date" name="administration_date" id="administration_date" class="form-control" value="{{ $vaccination->administration_date }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="next_dose_date">Datum volgende dosis</label>
                            <input type="date" name="next_dose_date" id="next_dose_date" class="form-control" value="{{ $vaccination->next_dose_date ? $vaccination->next_dose_date : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Wijzigingen opslaan</button>

        <a href="{{ route('vaccinations.show', $vaccination) }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>