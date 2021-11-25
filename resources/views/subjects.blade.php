<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Расписание</title>

    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" data-app>
    <v-app>
        <v-app-bar
            app
            color="primary"
            dark
        >
            <div class="d-flex align-center">
                Расписание
            </div>
            <div class="d-flex align-center">
                <a href="/" class="header_link">Кафедры</a>
                <a href="/teachers" class="header_link">Преподаватели</a>
                <a href="/subjects" class="header_link">Предметы</a>
                <a href="/groups" class="header_link">Группы</a>
                <a href="/schedules" class="header_link">Расписание</a>
            </div>
        </v-app-bar>
        <v-main>
            <v-container fluid class="pa-0 ma-0">
                <items-iterator :data="{{ json_encode($response) }}"></items-iterator>
            </v-container>
        </v-main>
    </v-app>
</div>

<!-- scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
