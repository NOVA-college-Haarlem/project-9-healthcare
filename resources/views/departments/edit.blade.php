<x-base>
    <div class="container">
        <h1>Update this medical record</h1>
        <form action="/medical_record/update/{{ $record->id }}" method="post" class="container mt-5 mb-9">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $record->date }}" placeholder="Select the record's date">
            </div>

            <div class="mb-3">
                <label class="form-label">Type of Medical Record</label>
                <div class="form-check">
                    <input type="radio" name="type" value="vaccination" id="type_vaccination" class="form-check-input" {{ $record->type == 'vaccination' ? 'checked' : '' }}>
                    <label for="type_vaccination" class="form-check-label">Vaccination</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="checkup" id="type_checkup" class="form-check-input" {{ $record->type == 'checkup' ? 'checked' : '' }}>
                    <label for="type_checkup" class="form-check-label">Checkup</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="allergy test" id="type_allergy_test" class="form-check-input" {{ $record->type == 'allergy test' ? 'checked' : '' }}>
                    <label for="type_allergy_test" class="form-check-label">Allergy Test</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="injury" id="type_injury" class="form-check-input" {{ $record->type == 'injury' ? 'checked' : '' }}>
                    <label for="type_injury" class="form-check-label">Injury</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Provide a description of the record">{{ $record->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Medical Record</button>
        </form>
    </div>

    @if ($errors->any())
        <div>
            <h1>
                @foreach ($errors->all() as $error)
                    <li>{{ strtoupper($error) }}</li>
                @endforeach
            </h1>
        </div>
    @endif
</x-base>
