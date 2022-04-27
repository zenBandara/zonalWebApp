<!DOCTYPE html>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * from eventcal") or die($mysqli->error);
?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='../lib/main.css' rel='stylesheet' />
    <script src='../lib/main.js'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialDate: '<?php echo strval(date("Y-m-d")); ?>',
                navLinks: true, // can click day/week names to navigate views
                nowIndicator: true,

                weekNumbers: true,
                weekNumberCalculation: 'ISO',

                editable: false,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [

                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                    {
                        title: '<?php echo $row['title']; ?>',
                        start: '<?php echo $row['start_date']; ?>',
                        end: '<?php echo $row['end_date']; ?>',
                        url: '<?php echo $row['url']; ?>'

                    },

                    <?php endwhile; ?>

                ]
            });

            calendar.render();
        });
    </script>
    <style>
        body {
            
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
        .breadtop {
            margin-top: 5%;
        }

        @media screen and (max-width: 767px) {
            .breadtop {
                margin-top: 12%;
            }
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            padding-top: 40px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3);
            border: 1px solid black;
            background: rgb(41, 41, 41);
            border-radius: 10px;

        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            height: 30px;
            width: 8px;
            border: 1px solid black;
            background: rgb(111, 111, 111);
            -webkit-box-shadow: 0 1px 1px rgb(0, 0, 0);
            background: -webkit-linear-gradient(brown, rgb(150, 150, 150));
        }

        ::-webkit-scrollbar-track-piece {
            height: 30px;
            width: 30px;
        }
    </style>
</head>

<body>
    <ol class="breadcrumb" style="position: fixed; width:100%; z-index:5;top:0;">
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <li class="breadcrumb-item active" aria-current="page">Event calander view</li>
    </ol>
    

    <div id='calendar' style="margin:5%;"></div>

</body>

</html>