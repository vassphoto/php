    <pre>
    <?php

    $connection = mysqli_connect("localhost:3306", "root", "", "gyakorlas3");

    mysqli_set_charset($connection, "utf8mb4");
    echo mysqli_error($connection);

    $sql = mysqli_query($connection, "select * from orszagok where id=1");
    while ($adat = mysqli_fetch_array($sql)) {
        print_r($adat["orszag"]."<br>");
    }

    ?>