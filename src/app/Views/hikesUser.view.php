<table>
    <tr>
        <th>Type of hike</th>
        <th>Distance</th>
        <th>Duration</th>
        <th>Elevation gain</th>
        <th>Manage hike</th>
    </tr>
    <?php foreach($displayUserHikes as $hikeKey=>$keyValue): ?>
        <tr>
        <?php foreach($keyValue as $key=>$keyValue): ?>
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
            <a href="#">Delete</a>   
            <br>
            <a href="#">Modify</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>

