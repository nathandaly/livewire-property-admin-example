<h4>Ofcom Broadband Coverage</h4>
<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th colspan="7">Matched Records</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>UPRN</th>
        <th>Broadband</th>
        <th>Superfast</th>
        <th>Ultrafast</th>
        <th>Maximum</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
    @forelse($property->broadbandCoverageResults as $broadband)
        <tr>
            <td>{{ $broadband->id }}</td>
            <td>{{ $broadband->uprn }}</td>
            <td>{{ $broadband->max_bb_predicted_down }} / {{ $broadband->max_bb_predicted_up }}</td>
            <td>{{ $broadband->max_sfbb_predicted_down }} / {{ $broadband->max_sfbb_predicted_up }}</td>
            <td>{{ $broadband->max_ufbb_predicted_down }} / {{ $broadband->max_ufbb_predicted_up }}</td>
            <td>{{ $broadband->max_predicted_down }} / {{ $broadband->max_predicted_up }}</td>
            <td>{{ $broadband->created_at }}</td>
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
        <th>UPRN</th>
        <th>Address</th>
        <th>Broadband</th>
        <th>Superfast</th>
        <th>Ultrafast</th>
        <th>Maximum</th>
    </tr>
    </thead>
    <tbody>
    @forelse($ofcomBroadband as $broadband)
        <tr>
            <td>{{ $broadband->id }}</td>
            <td>{{ $broadband->uprn }}</td>
            <td>{{ $broadband->address_short_description }}</td>
            <td>{{ $broadband->max_bb_predicted_down }} / {{ $broadband->max_bb_predicted_up }}</td>
            <td>{{ $broadband->max_sfbb_predicted_down }} / {{ $broadband->max_sfbb_predicted_up }}</td>
            <td>{{ $broadband->max_ufbb_predicted_down }} / {{ $broadband->max_ufbb_predicted_up }}</td>
            <td>{{ $broadband->max_predicted_down }} / {{ $broadband->max_predicted_up }}</td>
        </tr>
    @empty
        <tr><td colspan="7">No records found</td></tr>
    @endforelse
    </tbody>
</table>
