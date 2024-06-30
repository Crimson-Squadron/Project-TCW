<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navBar.css">
    <link rel="stylesheet" href="css/eventPage.css">
    <script src="JS/eventPageScript.js"></script>
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
    
    <form class="sort-filter-container" method="GET" action="{{ url('/events') }}">
        <div>
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
        </div>

        <div>
            <label for="sort">Sort by Date:</label>
            <select name="sort" id="sort">
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
            </select>
        </div>
        
        <button class="apply-btn" type="submit">Apply</button>
    </form>
    
    <ul class="doc-container">
        @foreach ($events as $event)
            <li class="doc-card-container" data-name="{{ $event->name }}" data-description="{{ $event->description }}" data-date="{{ date('F jS, Y', strtotime($event->event_date)) }}">
                <strong>{{ $event->name }}</strong>
                <p>{{ $event->description }}</p>
                <p>{{ date('F jS, Y', strtotime($event->event_date)) }}</p>
            </li>
        @endforeach
    </ul>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
            <p id="modal-date"></p>
        </div>
    </div>
</body>
</html>