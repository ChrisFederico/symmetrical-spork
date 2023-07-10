<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222222;
            color: #ffffff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333333;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #ffffff;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Home Page</h2>
    </div>

    {{-- <h1>Punk API Beers</h1>
    <ul>
        @foreach($beers as $beer)
            <li>{{ $beer->name }}</li>
        @endforeach
    </ul>
    
    {{ $beers->links() }} --}}

    <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
    </form>
</body>
</html>
