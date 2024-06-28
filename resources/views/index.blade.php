<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navBar.css">
    <link rel="stylesheet" href="css/eventPage.css">
</head>
<body>
    <div class="page-banner">
        <h1>Historical Events</h1>
        <img src="img/test-banner.jpg" alt="test">
    </div>
    <header>
        <div class="nav-btn-container">
            <a href="">Home</a>
            <a href="">Archives</a>
            <a href="">Manage</a>
        </div>
        <h1 class="nav-title">Euroan Intelligence Archive</h1>
        <a href="">
            <button class="nav-acc">Logout</button>
        </a>
    </header>
    
    <form method="GET" action="{{ url('/events') }}">
        <label for="year">Filter by Year:</label>
        <select name="year-min" id="year-min">
            @for ($i = 1000; $i <= 2300; $i += 100)
            <option value="{{$i}}" {{ request('year-min') == $i ? 'selected' : '' }}> {{$i}} </option>
            @endfor
        </select>
        <label>-</label>
        <select name="year-max" id="year-max">
            @for ($i = 2300; $i >= 1000; $i -= 100)
                <option value="{{$i}}" {{ request('year-max') == $i ? 'selected' : '' }}> {{$i}} </option>
            @endfor
        </select>

        
        <label for="sort">Sort by Date:</label>
        <select name="sort" id="sort">
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
        </select>
        
        <button type="submit">Apply</button>
    </form>
    
    <ul class="doc-container">
        @foreach ($events as $event)
            <li class="doc-card-container">
                <strong>{{ $event->name }}</strong>
                <p>{{ $event->description }}</p>
                <p>Date: {{ date('F jS, Y', strtotime($event->event_date)) }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>