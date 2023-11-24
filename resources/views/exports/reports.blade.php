<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Vehicle Type</th>
        <th>Driver</th>
        <th>Booking Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td >{{ $loop->iteration }}</td>
            <td>{{ $report->vehicle->type }}</td>
            <td>{{ $report->driver->name }}</td>
            <td>{{ Carbon\Carbon::parse($report->date)->format('d/m/Y');}}</td>
        </tr>
    @endforeach
    </tbody>
</table>