<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mood Diary API</title>
    <style>
        :root {
            color-scheme: dark;
            --bg: #0f172a;
            --card: #111827;
            --text: #e5e7eb;
            --muted: #9ca3af;
            --line: #1f2937;
            --accent: #38bdf8;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Inter, Segoe UI, Arial, sans-serif;
            background: linear-gradient(180deg, #020617 0%, var(--bg) 100%);
            color: var(--text);
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 48px 20px;
        }
        .card {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 18px;
        }
        h1, h2 {
            margin: 0 0 10px;
            line-height: 1.3;
        }
        p {
            margin: 0 0 12px;
            color: var(--muted);
            line-height: 1.6;
        }
        .links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 14px;
        }
        a.button {
            text-decoration: none;
            color: #0b1120;
            background: var(--accent);
            border-radius: 8px;
            padding: 10px 14px;
            font-weight: 600;
        }
        .endpoint {
            padding: 10px 0;
            border-top: 1px solid var(--line);
        }
        .endpoint:first-of-type { border-top: 0; }
        code {
            background: #0b1220;
            border: 1px solid var(--line);
            border-radius: 6px;
            padding: 2px 6px;
            color: #bfdbfe;
        }
        .footer {
            color: var(--muted);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <main class="container">
        <section class="card">
            <h1>Mood Diary API</h1>
            <p>
                REST API for logging daily mood entries. The API assumes an authenticated user ID
                is provided in the <code>X-User-Id</code> request header.
            </p>
            <div class="links">
                <a class="button" href="{{ route('api.documentation') }}">Open API Documentation</a>
            </div>
        </section>

        <section class="card">
            <h2>Quick API Reference</h2>

            <div class="endpoint">
                <strong>GET</strong> <code>/api/v1/moods</code>
                <p>Returns the list of allowed mood values.</p>
            </div>

            <div class="endpoint">
                <strong>POST</strong> <code>/api/v1/mood-entries</code>
                <p>Creates a mood entry with <code>mood</code>, optional <code>note</code>, and optional <code>logged_at</code>.</p>
            </div>

            <div class="endpoint">
                <strong>GET</strong> <code>/api/v1/mood-entries</code>
                <p>Returns paginated mood entries sorted newest first, with optional date range filters.</p>
            </div>
        </section>

        <section class="footer">
            <p>Base URL: <code>{{ url('/') }}</code></p>
        </section>
    </main>
</body>
</html>
