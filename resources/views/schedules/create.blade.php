<x-base>
    <div class="container">
        <h1 style="margin-top: 20px">Add a Medical Record</h1>
        <form action="/medical_record" method="POST" class="container mt-5 mb-9">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
        
            <div class="mb-3">
                <label class="form-label">Type: </label>
                <div class="form-check">
                    <input type="radio" name="type" value="vaccination" id="type_vaccination" class="form-check-input">
                    <label for="type_vaccination" class="form-check-label">Vaccination</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="checkup" id="type_checkup" class="form-check-input">
                    <label for="type_checkup" class="form-check-label">Checkup</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="allergy test" id="type_allergy_test" class="form-check-input">
                    <label for="type_allergy_test" class="form-check-label">Allergy Test</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="type" value="injury" id="type_injury" class="form-check-input">
                    <label for="type_injury" class="form-check-label">Injury</label>
                </div>
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Provide details"></textarea>
            </div>
        
            <div class="mb-3">
                <label for="child_id" class="form-label">Select Child</label>
                <select name="child_id" id="child_id" class="form-select">
                    @foreach ($children as $child)
                        <option value="{{ $child->id }}">{{ $child->firstname }} {{ $child->lastname }}</option>
                    @endforeach
                </select>
            </div>
        
            <button type="submit" class="btn btn-success" style="margin-bottom: 20px">Save Record</button>
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
