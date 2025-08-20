<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Musica')</title>
    <style>
        :root{
            --bg:#0f172a; /* slate-900 */
            --card:#0b1220;
            --muted:#94a3b8;
            --accent:#7c3aed; /* violet */
            --glass: rgba(255,255,255,0.03);
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            background: linear-gradient(180deg, #07122b 0%, #07122b 40%, #071a2d 100%);
            color:#e6eef8;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }
        header.site-header{
            padding:18px 24px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            border-bottom:1px solid rgba(255,255,255,0.03);
            background: linear-gradient(90deg, rgba(255,255,255,0.02), transparent);
        }
        .brand{
            display:flex;align-items:center;gap:12px;font-weight:700;font-size:18px;
        }
        nav.primary ul{list-style:none;margin:0;padding:0;display:flex;gap:12px}
        nav.primary a{
            color:var(--muted);text-decoration:none;padding:8px 12px;border-radius:8px;display:inline-block;font-size:14px
        }
        nav.primary a:hover{background:var(--glass);color:var(--accent)}
        .container{width:100%;max-width:980px;margin:28px auto;padding:0 18px}
        .hero{background:linear-gradient(180deg, rgba(255,255,255,0.02), transparent);padding:36px;border-radius:12px;margin-bottom:20px}
        h1{margin:0 0 8px 0;font-size:28px}
        h5{margin:0;color:var(--muted);font-weight:500}
        .card{background:var(--card);padding:16px;border-radius:10px;border:1px solid rgba(255,255,255,0.03)}
        .muted{color:var(--muted)}
        .actions{display:flex;gap:10px;margin-top:14px}
        .btn{background:var(--accent);color:white;padding:9px 14px;border-radius:8px;text-decoration:none;font-weight:600}
        .btn.secondary{background:transparent;border:1px solid rgba(255,255,255,0.06);color:var(--muted)}
        footer{margin-top:auto;padding:20px 24px;text-align:center;color:var(--muted);font-size:13px}
        ul.clean{padding-left:18px}
        table{width:100%;border-collapse:collapse}
        th,td{padding:10px 8px;text-align:left;border-bottom:1px solid rgba(255,255,255,0.03)}
        .small{font-size:13px;color:var(--muted)}
        @media (max-width:640px){
            h1{font-size:22px}
            .brand{font-size:16px}
            .container{padding:0 12px}
            header.site-header{padding:12px}
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="brand">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                <rect x="3" y="3" width="18" height="18" rx="4" fill="url(#g)"/>
                <defs>
                    <linearGradient id="g" x1="0" x2="1">
                        <stop offset="0" stop-color="#7c3aed"/>
                        <stop offset="1" stop-color="#3b82f6"/>
                    </linearGradient>
                </defs>
            </svg>
            Musica
        </div>
        <nav class="primary" aria-label="Main navigation">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/admin/records">Admin</a></li>
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn secondary">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Musica. All rights reserved.</p>
    </footer>
</body>
</html>