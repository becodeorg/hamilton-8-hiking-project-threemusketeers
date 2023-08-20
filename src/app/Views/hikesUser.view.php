<table>
    <tr>
        <th>Type of hike</th>
        <th>Distance</th>
        <th>Duration</th>
        <th>Elevation gain</th>
        <th>Manage hike</th>
    </tr>
    <?php foreach($displayUserHikes as $hike): ?>
        <tr>
        <?php foreach($hike as $key=>$keyValue): ?>
        <?php 
        switch($key){
            case "name":
                echo "<td>$keyValue</td>";
                break;
            case "distance":
                echo "<td>$keyValue km</td>";
                break;
            case "duration":
                echo "<td>$keyValue minutes</td>";
                break;
            case "elevation_gain":
                echo "<td>$keyValue meters</td>";
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

<a href='/newHike'><button>new hike</button></a>








