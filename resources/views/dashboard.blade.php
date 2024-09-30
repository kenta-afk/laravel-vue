<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming VCT Matches</title>
</head>
<body>
    <h1>Upcoming VCT Matches</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Event</th>
                <th>Match</th>
                <th>Teams</th>
                <th>Status</th>
                <th>Scheduled At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matches as $match)
                <tr>
                    <!-- イベント名 (リーグまたはトーナメント名を表示) -->
                    <td>{{ $match['tournament']['name'] ?? 'N/A' }}</td>

                    <!-- 試合名 (例: "Grand Final: Team A vs Team B") -->
                    <td>{{ $match['name'] ?? 'No match name available' }}</td>

                    <!-- チーム名を表示 -->
                    <td>
                        @if (isset($match['opponents'][0]) && isset($match['opponents'][1]))
                            {{ $match['opponents'][0]['opponent']['name'] ?? 'TBD' }} 
                            vs 
                            {{ $match['opponents'][1]['opponent']['name'] ?? 'TBD' }}
                        @else
                            TBD
                        @endif
                    </td>

                    <!-- 試合のステータス -->
                    <td>{{ $match['status'] ?? 'Unknown' }}</td>

                    <!-- 試合の開始時刻 -->
                    <td>{{ \Carbon\Carbon::parse($match['scheduled_at'])->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
