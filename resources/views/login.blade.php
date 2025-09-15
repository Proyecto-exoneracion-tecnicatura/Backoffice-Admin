<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Backoffice</title>
<style>
body{font-family:system-ui,Arial;margin:0;display:grid;place-items:center;height:100vh;background:#0b1220;color:#e6eef7}
form{background:#111a2b;padding:24px;border-radius:12px;min-width:320px;box-shadow:0 10px 30px rgba(0,0,0,.3)}
input{width:100%;padding:10px 12px;margin:8px 0;border-radius:8px;border:1px solid #2d3a57;background:#0f1729;color:#e6eef7}
button{width:100%;padding:10px 12px;border:0;border-radius:8px;background:#3b82f6;color:#fff;font-weight:600;cursor:pointer}
.err{background:#2a0f16;border:1px solid #7f1d1d;color:#fca5a5;padding:10px;border-radius:8px;margin-bottom:8px}
label{font-size:14px;color:#b6c2d9}
h2{margin:0 0 12px}
</style>
</head>
<body>
<form method="POST" action="{{ url('/login') }}">
    @csrf
    <h2>Backoffice – Iniciar sesión</h2>
    @if ($errors->any()) <div class="err">{{ $errors->first() }}</div> @endif

    <label>Usuario (AD) — sAMAccountName</label>
    <input name="username" placeholder="juan.perez" value="{{ old('username') }}" required>

    <label>Contraseña</label>
    <input type="password" name="password" placeholder="••••••••" required>

    <button type="submit">Entrar</button>
</form>
</body>
</html>
