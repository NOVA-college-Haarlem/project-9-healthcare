<!DOCTYPE html>
<html>
<head>
    <title>Vaccination Certificate - {{ $patient->user->name }}</title>
    <style>
        @media print {
            body { font-size: 12pt; }
            .no-print { display: none; }
            .page-break { page-break-after: always; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">VACCINATION CERTIFICATE</div>
        <div class="subtitle">Official Immunization Record</div>
    </div>
    
    <div class="patient-info">
        <p><strong>Patient Name:</strong> {{ $patient->user->name }}</p>
        <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
    </div>
    
    <table class="vaccine-table">
        <thead>
            <tr>
                <th>Date Administered</th>
                <th>Vaccine Name</th>
                <th>Lot Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vaccinations as $vaccination)
            <tr>
                <td>{{ $vaccination->administration_date }}</td>
                <td>{{ $vaccination->vaccine_name }}</td>
                <td>{{ $vaccination->lot_number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>Issued on: {{ now()->format('m/d/Y') }}</p>
        <div>
            <p>Authorized Signature:</p>
            <div class="signature-line"></div>
        </div>
    </div>
</body>
</html>