<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>Hike Details</title>
</head>
<body>
    <?php if (!empty($hike)): ?>
        <h2><?= $hike['name'] ?></h2>
        <p>Description: <?= $hike['description'] ?></p>
        <p>Distance: <?= $hike['distance'] ?> m</p>
    <?php else: ?>
        <p>Sorry, no details available for this hike.</p>
    <?php endif; ?>
</body>
</html>