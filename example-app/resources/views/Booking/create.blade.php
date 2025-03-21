<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حجز موعد</title>
</head>
<body>
    <h1>حجز موعد مع الحلاق</h1>
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <label for="barber_id">اختر الحلاق:</label>
        <select name="barber_id" id="barber_id" required>
            @foreach ($barbers as $barber)
                <option value="{{ $barber->id }}">{{ $barber->name }}</option>
            @endforeach
        </select>

        <label for="booking_date">تاريخ ووقت الحجز:</label>
        <input type="datetime-local" name="booking_date" id="booking_date" required>

        <button type="submit">احجز الآن</button>
    </form>
</body>
</html>