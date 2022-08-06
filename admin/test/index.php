<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href='fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='fullcalendar/lib/main.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div id='calendar'></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                events: {
                    url: "http://localhost/test/test.php"
                },
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5'
            });

            calendar.render();
        });
    </script>
</body>

</html>