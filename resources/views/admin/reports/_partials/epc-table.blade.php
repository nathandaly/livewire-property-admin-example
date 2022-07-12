<h4>Energy Performance Certificates</h4>
<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th colspan="7">Matched Records</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Inspection Date</th>
        <th>Energy Performance</th>
        <th>Environmental Impact</th>
        <th>Total Floor Area</th>
        <th>Property Type</th>
        <th>Built Form</th>
    </tr>
    </thead>
    <tbody>
    @forelse($property->energyPerformanceCertificates as $epc)
        <tr>
            <td>{{ $epc->id }}</td>
            <td>{{ $epc->inspection_date }}</td>
            <td>{{ $epc->current_energy_rating }} ({{ $epc->current_energy_efficiency }}) / {{ $epc->potential_energy_rating }} ({{ $epc->potential_energy_efficiency }})</td>
            <td>{{ $epc->environment_impact_current }} / {{ $epc->environment_impact_potential }}</td>
            <td>{{ $epc->total_floor_area }}</td>
            <td>{{ $epc->property_type }}</td>
            <td>{{ $epc->built_form }}</td>
        </tr>
    @empty
        <tr><td colspan="7">No records matched</td></tr>
    @endforelse
    </tbody>
</table>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th colspan="7">Records in Postcode {{ $property->postcode }}</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Address</th>
        <th>Inspection Date</th>
        <th>Energy Performance</th>
        <th>Total Floor Area</th>
        <th>Property Type</th>
        <th>Built Form</th>
    </tr>
    </thead>
    <tbody>
    @forelse($epcs as $epc)
        <tr>
            <td>{{ $epc->id }}</td>
            <td>{{ $epc->search_address }}</td>
            <td>{{ $epc->inspection_date }}</td>
            <td>{{ $epc->current_energy_rating }} ({{ $epc->current_energy_efficiency }}) / {{ $epc->potential_energy_rating }} ({{ $epc->potential_energy_efficiency }})</td>
            <td>{{ $epc->total_floor_area }}</td>
            <td>{{ $epc->property_type }}</td>
            <td>{{ $epc->built_form }}</td>
        </tr>
    @empty
        <tr><td colspan="7">No records found</td></tr>
    @endforelse
    </tbody>
</table>
