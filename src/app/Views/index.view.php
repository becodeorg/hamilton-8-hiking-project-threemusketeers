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
    <table id="hikes-table">
        <?php $i = 0; foreach ($hikes as $hike): ?>
            <tr class="hike-row">
                <td> <a href="hikesdetails?id=<?= $hike['id'] ?>"> <?= $hike['name'] ?> </a></td>
                <td><i class="fa-solid fa-person-hiking"></i> <?= $hike['distance'] ?> m</td>
                <td><i class="fa-solid fa-clock"></i> <?= $hike['duration'] ?> min</td>
                <td><i class="fa-solid fa-arrow-trend-up"></i><?= $hike['elevation_gain'] ?> m</td>
                <td>
                    <ul>
                        <?php
                        $hikesTagsController = new \App\Controllers\HikestagsController();
                        $tags =$hikesTagsController->find($hike['id']);
                        if (empty($tags)): ?>
                            <li><?="/"?></li>
                        <?php
                        endif;
                        foreach ($tags as $tag):
                            ?>
                            <li><?= $tag->name ?></li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
    </table>
    <button id="see-more"> See more </button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //I'm sorry i dindn't find how to do this in php for the moment :(
        $(document).ready(function() {
            var hikesPerPage = 10;
            var totalHikes = <?= count($hikes) ?>;
            var currentIndex = hikesPerPage;
            
            $("#see-more").click(function() {
                for (var i = currentIndex; i < currentIndex + hikesPerPage; i++) {
                    if (i >= totalHikes) {
                        $("#see-more").hide();
                        break;
                    }
                    var row = $(".hike-row:eq(" + i + ")");
                    row.show();
                }
                currentIndex += hikesPerPage;
            });

            // Initially hide all rows except the first 10
            $(".hike-row:gt(" + (hikesPerPage - 1) + ")").hide();
        });
    </script>
<?php else: ?>
    <p>Look like there are no available hikes at the moment...</p>
<?php endif; ?>

