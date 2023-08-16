<?php if (!empty($hike)): ?>
    <h2><?= $hike['name'] ?></h2>
    <p>Description: <?= $hike['description'] ?></p>
    <p>Distance: <?= $hike['distance'] ?> m</p>
<?php else: ?>
    <p>Sorry, no details available for this hike.</p>
<?php endif; ?>

