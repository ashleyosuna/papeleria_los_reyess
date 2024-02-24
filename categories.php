<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$product = $_POST["product_name"];

    try {
        require_once "dbh.inc.php";

        //$query = "SELECT * FROM Catalog WHERE name LIKE CONCAT('%', :product_name, '%') or marca LIKE CONCAT('%', :product_name, '%') or category LIKE CONCAT('%', :product_name, '%')";

        //$query = "SELECT * FROM Catalog WHERE category='escuela'";
        //$stmt = $pdo->prepare($query);

        //$stmt->bindParam(":product_name", $product);

        //$stmt->execute();

        //$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //$pdo = null;
        //$stmt = null;
        if (isset($_POST['btnEscolar'])){
            $query = "SELECT * from Catalog where category='escuela'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null;
            $stmt = null;
        } elseif (isset($_POST['btnOficina'])) {
            $query = "SELECT * from Catalog where category='oficina'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null;
            $stmt = null;
        } elseif (isset($_POST['btnRegalos'])) {
            $query = "SELECT * from Catalog where category='regalos'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null;
            $stmt = null;
        } elseif (isset($_POST['btnServicios'])) {
            $query = "SELECT * from Catalog where category='servicios'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null;
            $stmt = null;
        } else {
            header("Location: /los_reyess.php");
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../los_reyess.php");
}

/*try {
    require_once "dbh.inc.php";

    //$query = "SELECT * FROM Catalog WHERE name LIKE CONCAT('%', :product_name, '%') or marca LIKE CONCAT('%', :product_name, '%') or category LIKE CONCAT('%', :product_name, '%')";

    $query = "SELECT * FROM Catalog WHERE category='escuela'";

    $stmt = $pdo->prepare($query);

    //$stmt->bindParam(":product_name", $product);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}*/
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Papelería Los Reyess</title>
        <link rel="stylesheet" type="text/css" href="./los_reyess.css">
        <script src="./los_reyess.js" defer></script>
    </head>
    <body>
        <div class="header">
            <h1>Papelería Los Reyess</h1>
        </div>
        <div class="navigation">
            <img class="shopping_cart_icon" src="./images/shopping-cart.png">
            <div class="categories">
                <button class="categories_menu">Nuestras Categorías</button>
                <div class="dropdown_menu">
                    <form action="categories.php" method="post">
                        <input type="submit" name="btnTodo" value="Todos los productos">
                        <input type="submit" name="btnEscolar" value="Productos Escolares">
                        <input type="submit" name="btnOficina" value="Productos de Oficina">
                        <input type="submit" name="btnRegalos" value="Envolturas y Regalos">
                        <input type="submit" name="btnServicios" value="Impresiones, copias y otros servicios">
                    </form>
                </div>
            </div>
            <div class="search_bar">
                <form action="search.php" method="post">
                    <input type="search" inputmode="search" placeholder="Busca por producto, categoría o marca..." class="search_input" name="product_name">
                    <button class="srch_button">
                        <img class="search_icon" src="./images/search.png">
                    </button>
                </form>
            </div>
        </div>
        <div class="search_results">
            <div class="products">
                <?php
                if(empty($results)){
                    echo "<div>";
                    echo "<p>No resultados</p>";
                    echo "</div>";
                }else {
                    foreach ($results as $row) {
                        echo "<div class='product'>";
                        //echo "<img src=" . $row["img_src"] . ">";
                        echo "<img src='" . $row["img_src"] . "'>";
                        echo "<h5>" . htmlspecialchars($row["description"]) . "</h5>";
                        //echo "<p>" . htmlspecialchars($row["marca"]) . "</p>";
                        echo "<p>$" . htmlspecialchars($row["price"]) . "</p>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>