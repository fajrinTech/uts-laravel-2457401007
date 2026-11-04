<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Resto Rasa Nusantara') - UTS Web Development</title>
    <style>
        :root {
            --bg-page: #faf6f0;
            --bg-card: #ffffff;
            --primary: #c2410c;
            --primary-hover: #9a3412;
            --amber-accent: #d97706;
            --amber-light: #fef3c7;
            --text-main: #292524;
            --text-muted: #78716c;
            --border-soft: #e7e5e4;
            --border-warm: #fed7aa;
            --success-bg: #ecfdf5;
            --success-border: #a7f3d0;
            --success-text: #065f46;
            --danger-bg: #fef2f2;
            --danger-border: #fecaca;
            --danger-text: #991b1b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-main);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(135deg, #1c1917 0%, #292524 100%);
            color: #ffffff;
            padding: 16px 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .navbar-inner {
            max-width: 1080px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: -0.01em;
        }

        .brand-badge {
            background-color: var(--primary);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .nav-links {
            display: flex;
            gap: 12px;
        }

        .nav-link {
            color: #d6d3d1;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: #ffffff;
            background-color: var(--primary);
            font-weight: 600;
        }

        .main-wrapper {
            flex: 1;
            max-width: 1080px;
            width: 100%;
            margin: 32px auto;
            padding: 0 20px;
        }

        .bistro-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-soft);
            border-radius: 14px;
            box-shadow: 0 4px 20px -2px rgba(180, 83, 9, 0.06);
            padding: 28px;
            margin-bottom: 24px;
        }

        .card-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #f5f5f4;
        }

        .card-title {
            font-size: 1.45rem;
            font-weight: 700;
            color: #1c1917;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.18s ease-in-out;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-amber {
            background-color: var(--amber-accent);
            color: #ffffff;
        }

        .btn-amber:hover {
            background-color: #b45309;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #d6d3d1;
            color: #44403c;
        }

        .btn-outline:hover {
            background-color: #f5f5f4;
            color: #1c1917;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.82rem;
            border-radius: 6px;
        }

        .btn-danger-outline {
            background-color: transparent;
            border: 1px solid #fca5a5;
            color: #dc2626;
        }

        .btn-danger-outline:hover {
            background-color: #fee2e2;
        }

        .alert-flash {
            background-color: var(--success-bg);
            border: 1px solid var(--success-border);
            color: var(--success-text);
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pill-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .pill-makanan {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        .pill-minuman {
            background-color: #e0f2fe;
            color: #0369a1;
            border: 1px solid #bae6fd;
        }

        .pill-penutup {
            background-color: #fce7f3;
            color: #9d174d;
            border: 1px solid #fbcfe8;
        }

        .pill-spicy {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .pill-mild {
            background-color: #f5f5f4;
            color: #57534e;
            border: 1px solid #e7e5e4;
        }

        .pill-bestseller {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #ffffff;
            box-shadow: 0 1px 3px rgba(217, 119, 6, 0.3);
        }

        .bistro-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 8px;
        }

        .bistro-table th {
            background-color: #f5f5f4;
            color: #44403c;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 12px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-soft);
        }

        .bistro-table td {
            padding: 14px;
            border-bottom: 1px solid var(--border-soft);
            font-size: 0.93rem;
            vertical-align: middle;
        }

        .bistro-table tbody tr:hover {
            background-color: #fafaf9;
        }

        .action-cell {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.92rem;
            color: #292524;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d6d3d1;
            border-radius: 8px;
            font-size: 0.93rem;
            background-color: #ffffff;
            color: #1c1917;
            transition: all 0.15s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--amber-accent);
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            background-color: #fffafb;
        }

        .form-error {
            color: #dc2626;
            font-size: 0.82rem;
            margin-top: 5px;
            font-weight: 500;
        }

        .checkbox-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
            font-weight: 500;
            font-size: 0.93rem;
        }

        .checkbox-label input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: var(--text-muted);
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 12px;
            opacity: 0.7;
        }

        .footer {
            background-color: #ffffff;
            border-top: 1px solid var(--border-soft);
            padding: 18px 24px;
            text-align: center;
            font-size: 0.88rem;
            color: var(--text-muted);
            margin-top: auto;
        }

        .footer strong {
            color: #1c1917;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="brand-link">
                <span>🍽️</span>
                <span>Resto Rasa Nusantara</span>
                <span class="brand-badge">Bistro CRUD</span>
            </a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('menus.index') }}" class="nav-link {{ request()->routeIs('menus.*') ? 'active' : '' }}">Menu Restoran</a>
            </div>
        </div>
    </nav>

    <main class="main-wrapper">
        @yield('content')
    </main>

    <footer class="footer">
        Fajrin Widianto · 2457401007
    </footer>
</body>
</html>
