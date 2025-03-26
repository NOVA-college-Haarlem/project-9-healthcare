<div class="container">
    <h1>Nieuwe vaccinatie registreren</h1>

    <form action="{{ route('vaccinations.store') }}" method="POST">
        @csrf

        <div class="card mb-3">
            <div class="card-header">Basisinformatie</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="patient_id">Patiënt</label>
                            <select name="patient_id" id="patient_id" class="form-control" required>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->user->name }} ({{ $patient->date_of_birth }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctor_id">Arts</label>
                            <select name="doctor_id" id="doctor_id" class="form-control" required>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->user->name }} ({{ $doctor->specialization }})</option>
                                @endforeach
                            </select>
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
                            <input type="text" name="vaccine_name" id="vaccine_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lot_number">Lotnummer</label>
                            <input type="text" name="lot_number" id="lot_number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="administration_date">Toedieningsdatum</label>
                            <input type="date" name="administration_date" id="administration_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="next_dose_date">Datum volgende dosis (indien van toepassing)</label>
                            <input type="date" name="next_dose_date" id="next_dose_date" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
        <a href="{{ route('vaccinations.index') }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>