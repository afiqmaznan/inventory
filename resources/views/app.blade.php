<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Inventory System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    @routes
    <script src="{{ asset('/js/app.js?') }}" defer></script>
</head>
<body>
    <div class="">
        @inertia
    </div>
</body>
</html>