<table>
    <tr>
        <th>Type of hike</th>
        <th>Distance</th>
        <th>Duration</th>
        <th>Elevation gain</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Manage hike</th>
    </tr>
    <?php foreach($displayAllHikes as $hike): ?>
        <tr>
        <?php foreach($hike as $key=>$keyValue): ?>
        <?php 
        switch($key){
            case "name":
                echo "<td>$keyValue</td>";
                break;
            case "distance":
                echo "<td><i class='fa-solid fa-person-hiking'></i> $keyValue m</td>";
                break;
            case "duration":
                echo "<td><i class='fa-solid fa-clock'></i> $keyValue min</td>";
                break;
            case "elevation_gain":
                echo "<td><i class='fa-solid fa-arrow-trend-up'></i> $keyValue m</td>";
                break;
            case "created_at":
                echo "<td><i class='fa-solid fa-clock-rotate-left'></i> $keyValue m</td>";
                break;
            case "updated_at":
                echo "<td><i class='fa-solid fa-clock-rotate-left'></i> $keyValue m</td>";
                break;
            default:
                break;
        }
        ?>
        <?php endforeach; ?>
        <td> 
            <a href="/deleteHike?id=<?= $hike['id']?>" >Delete</a>   
            <br>
            <a href="/modifyHike?id=<?= $hike['id']?>" >Modify</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>




