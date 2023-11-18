<?php

function renderCollection($limit = '0', $home = '0', $search = '')
{
    echo '<div class="feature-product-container">';
    global $conn;
    if ($search == '') {
        if ($limit == '0') {
            $sql = "SELECT * FROM `collection` ;";
        } else {
            $sql = "SELECT * FROM `collection` limit $limit;";
        }
    } else {
        $sql = "SELECT * FROM `collection` WHERE `name` LIKE '%$search%';";

    }

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['unlisted'] == '1') {
                continue;
            }
            echo '
            
        <div class="feature-product-box">
        <!-- img -->';
            if ($home == '1') {
                echo '<a href="./Collection.php">';
            }
            echo '  <div class="product-feature-img">
            <img src="' . $row['photo'] . '" alt="" />
        </div>';
            if ($home == '1') {
                echo '</a>';
            }
            echo ' <!-- text container -->
        <div class="product-feature-text-container">
            <!-- text -->
            <div class="product-feature-text">
                <strong>' . $row['name'] . '</strong>
                <span>LKR ' . $row['price'] . '</span>
            </div>';


            if ($home == '0') {

                echo '       <!-- cart like icon -->
      <form class="cart-like" action="./Collection.php" method="post">
      <!-- cart icon -->
              <input type="text" name="item" value="' . $row['id'] . '" style="display: none;">
              <button name="cartadd" type="submit"><i class="fas fa-shopping-cart"></i></button>
      </form>';
            }

            echo '</div></div>';

        }
    } else {
        echo "0 results";
    }

    echo '</div>';
}

?>