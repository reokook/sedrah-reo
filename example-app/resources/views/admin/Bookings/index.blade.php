<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الحجوزات</title>
</head>
<body>
    <h1>إدارة الحجوزات</h1>
    <table>
        <thead>
            <tr>
                <th>المستخدم</th>
                <th>الحلاق</th>
                <th>تاريخ الحجز</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->barber->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status">
                                <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>معلّق</option>
                                <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                                <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>مكتمل</option>
                            </select>
                            <button type="submit">تحديث</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


