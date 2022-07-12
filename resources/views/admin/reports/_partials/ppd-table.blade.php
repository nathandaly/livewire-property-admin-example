<h4>Price Paid Data</h4>
<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th colspan="7">Matched Records</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Transaction Reference</th>
        <th>Transfer Date</th>
        <th>Price Paid</th>
        <th>Property Type</th>
        <th>New Build</th>
        <th>Tenure</th>
    </tr>
    </thead>
    <tbody>
    @forelse($property->pricesPaid as $ppd)
        <tr>
            <td>{{ $ppd->record->id }}</td>
            <td>{{ $ppd->record->tx_uuid }}</td>
            <td>{{ $ppd->record->transfer_date }}</td>
            <td>{{ $ppd->record->paid_price }}</td>
            <td>{{ $ppd->record->property_type }}</td>
            <td>{{ $ppd->record->new_build }}</td>
            <td>{{ $ppd->record->tenure }}</td>
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
        <th>Transfer Date</th>
        <th>Price Paid</th>
        <th>Property Type</th>
        <th>New Build</th>
        <th>Tenure</th>
    </tr>
    </thead>
    <tbody>
    @forelse($ppds as $ppd)
        <tr>
            <td>{{ $ppd->id }}</td>
            <td>{{ $ppd->search_address }}</td>
            <td>{{ $ppd->transfer_date }}</td>
            <td>{{ $ppd->paid_price }}</td>
            <td>{{ $ppd->property_type }}</td>
            <td>{{ $ppd->new_build }}</td>
            <td>{{ $ppd->tenure }}</td>
        </tr>
    @empty
        <tr><td colspan="7">No records found</td></tr>
    @endforelse
    </tbody>
</table>
