<h2>Let's discover new hikes</h2>

    <?php if (!empty($hikes)): ?>
        <table>
            <?php foreach ($hikes as $hike): ?>
                
                    <tr>
                        <td> <a href="hikesdetails?id=<?= $hike['id'] ?>"> <?= $hike['name'] ?> </a></td>
                        <td><i class="fa-solid fa-person-hiking"></i> <?= $hike['distance'] ?> m</td>
                        <td><i class="fa-solid fa-clock"></i> <?= $hike['duration'] ?> min</td>
                    </tr>
                
            <?php endforeach; ?>
            </table>
    <?php else: ?>
        <p>Look like there is no available hikes for the moment...</p>
    <?php endif; ?>

