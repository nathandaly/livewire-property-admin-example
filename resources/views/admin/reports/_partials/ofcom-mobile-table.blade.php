<h4>Ofcom Mobile Network Coverage</h4>
<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th colspan="7">Matched Records</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>UPRN</th>
        <th>EE</th>
        <th>H3</th>
        <th>TF</th>
        <th>VO</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
    @forelse($property->mobileNetworkCoverageResults as $mobile)
        <tr>
            <td>{{ $mobile->id }}</td>
            <td>{{ $mobile->uprn }}</td>
            <td>{{ $mobile->ee_voice_outdoor }}</td>
            <td>{{ $mobile->h3_voice_outdoor }}</td>
            <td>{{ $mobile->tf_voice_outdoor }}</td>
            <td>{{ $mobile->vo_voice_outdoor }}</td>
            <td>{{ $mobile->created_at }}</td>
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
        <th>EE</th>
        <th>H3</th>
        <th>TF</th>
        <th>VO</th>
    </tr>
    </thead>
    <tbody>
    @forelse($ofcomMobile as $mobile)
        <tr>
            <td>{{ $mobile->id }}</td>
            <td>{{ $mobile->uprn }}</td>
            <td>{{ $mobile->address_short_description }}</td>
            <td>{{ $mobile->ee_voice_outdoor }}</td>
            <td>{{ $mobile->h3_voice_outdoor }}</td>
            <td>{{ $mobile->tf_voice_outdoor }}</td>
            <td>{{ $mobile->vo_voice_outdoor }}</td>
        </tr>
    @empty
        <tr><td colspan="7">No records found</td></tr>
    @endforelse
    </tbody>
</table>
