
    <h2><h2>Let's discover new hikes</h2>

    <?php if (!empty($hikes)): ?>
        <ul>
            <?php foreach ($hikes as $hike): ?>
                <li>
                    <a href="hike_details.php?id=<?= $hike['id'] ?>">
                        <?= $hike['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Look like there is no available hikes for the moment...</p>
    <?php endif; ?>
</body>
</html>
