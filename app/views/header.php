<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionamento On</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; }
        header { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        header h1 { margin: 0; font-size: 1.5rem; color: #333; }
        nav a { margin-left: 20px; text-decoration: none; color: #555; font-weight: 500; }
        nav a:hover { color: #007bff; }
        .container { padding: 2rem; max-width: 1200px; margin: 0 auto; }
        .btn { display: inline-block; padding: 0.6rem 1.2rem; border-radius: 4px; text-decoration: none; font-size: 0.9rem; cursor: pointer; border: none; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-outline-danger { border: 1px solid #dc3545; color: #dc3545; background: transparent; }
        .btn-outline-danger:hover { background: #dc3545; color: white; }
        .table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-top: 1rem; }
        .table th, .table td { padding: 1rem; text-align: left; border-bottom: 1px solid #eee; }
        .table th { background-color: #f8f9fa; font-weight: 600; color: #555; }
        .form-container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 500px; margin: 0 auto; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; }
        .form-group input { width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .card { background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 500px; margin: 0 auto; text-align: center; }
        .card .value { font-size: 2rem; color: #28a745; margin: 1rem 0; font-weight: bold; }
        .card .info { text-align: left; margin-bottom: 1rem; color: #555; }
        .badge { padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.8rem; }
        .badge-success { background-color: #d4edda; color: #155724; }
    </style>
</head>
<body>
    <header>
        <h1>Estacionamento On</h1>
        <nav>
            <a href="/dashboard.php">Dashboard</a>
            <a href="/logout.php">Sair</a>
        </nav>
    </header>
    <div class="container">
