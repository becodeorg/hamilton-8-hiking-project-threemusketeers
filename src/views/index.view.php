<h2>Let's discover new hikes</h2>

<!--TAG TO MODIFY-->
<label for="pet-select">Select a tag</label>
            <select name="#" id="#">
            <option value="">--Please choose an option--</option>
            <option value="Hard">Hard</option>
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Historical">Historical</option>
            <option value="Rock">Rock</option>
            <option value="Forest">Forest</option>
            <option value="Fields">Fields</option>
            <option value="PMR">PMR</option>
            <option value="Bikes">Bikes</option>
            </select>

    <?php if (!empty($hikes)): ?>
        <table>
            <?php foreach ($hikes as $hike): ?>
                
                    <tr>
                        <td> <a href="hikesdetails?id=<?= $hike['id'] ?>"> <?= $hike['name'] ?> </a></td>
                        <td><i class="fa-solid fa-person-hiking"></i> <?= $hike['distance'] ?> m</td>
                        <td><i class="fa-solid fa-clock"></i> <?= $hike['duration'] ?> min</td>
                        <td><i class="fa-solid fa-arrow-trend-up"></i><?= $hike['elevation_gain'] ?> m</td>
                        <!--TAGS TO MODIFY-->
                        <td>
                            <?php // foreach ($tags as $tag): ?>
                                <td>Tag 1 ++</td>
                                <td>Tag 1 ++</td>
                                <td>Tag 1 ++</td>
                        </td>
                    </tr>
                
            <?php endforeach; ?>
            </table>
    <?php else: ?>
        <p>Look like there is no available hikes for the moment...</p>
    <?php endif; ?>

