<aside class="widget st--widget">
    <?php
    $query = "SELECT * FROM list_ads WHERE id = '1'  ";
    $data = $database->select($query);
    $result = $data->fetch_assoc();
    $ad468 = $result['ad468'];
    echo $ad468;
    ?>
</aside>