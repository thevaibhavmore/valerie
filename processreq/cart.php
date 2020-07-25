<?php
require_once("../includes/initialize.php");
$action = $_POST["action"];
$jsonarray = array();

if ($action == "add") {
    $id = $_POST["id"];
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $myrow = mysqli_fetch_array($result)) {
        $product = $myrow;
    } else {
        $error = 1;
        $error_msg = "Invalid product";
        $jsonarray["code"] = $error;
        $jsonarray["msg"] = $error_msg;
        echo json_encode($jsonarray);
        exit;
    }

    $cartProducts = $_SESSION["products"] ?? [];
    $userId = $_SESSION["USER_ID"] ?? false;
    if ($userId) {
        $sql = "SELECT * FROM cart WHERE user_id = '$userId'";
        $result = mysqli_query($con, $sql);
        $cartProducts = [];
        while ($result && $myrow = mysqli_fetch_array($result)) {
            $cartProducts[$myrow["product_id"]] = $myrow;
        }
    }

    $productExist = $cartProducts[$id] ?? false;
    if ($productExist) {
        $quantity = $cartProducts[$id]["quantity"] + 1;
        if ($userId) {
            $quantity = $cartProducts[$id]["quantity"] + 1;
            $amount = $product['sale_price'];
            $totalAmount = $amount * $quantity;
            $sql = "UPDATE cart SET quantity ='$quantity', amount='$amount', total_amount ='$totalAmount', modifiedon = NOW() WHERE product_id = '$id' AND user_id = '$userId'";
            $result = mysqli_query($con, $sql);
            if (mysqli_affected_rows($con) <= 0) {
                $error = 1;
                $error_msg = "something went wrong while updating cart";
                $jsonarray["code"] = $error;
                $jsonarray["msg"] = $error_msg;
                echo json_encode($jsonarray);
                exit;
            }
        } else {
            $_SESSION["products"][$id] = [
                "quantity" => $quantity,
                "amount" => $product["sale_price"],
                "total_amount" => $product["sale_price"] * $quantity
            ];
        }
    } else {
        if ($userId) {
            $sql = "INSERT INTO cart (user_id, product_id, quantity, amount, total_amount, addedon) VALUES ('$userId', '$id', 1, " . $product['sale_price'] . ", " . $product['sale_price'] . ",  NOW())";
            
//            echo $sql;exit;
            
            $result = mysqli_query($con, $sql);
            if (mysqli_affected_rows($con) <= 0) {
                $error = 1;
                $error_msg = "something went wrong while inserting cart";
                $jsonarray["code"] = $error;
                $jsonarray["msg"] = $error_msg;
                echo json_encode($jsonarray);
                exit;
            }
        } else {
            $cartProducts[$id] = [
                "amount" => $product["sale_price"],
                "total_amount" => $product["sale_price"],
                "quantity" => 1,
            ];

            $_SESSION["products"] = $cartProducts;
        }
    }

    $error = 0;
    $error_msg = "Product added in cart successfully";
    $jsonarray["code"] = $error;
    $jsonarray["msg"] = $error_msg;
    echo json_encode($jsonarray);
    exit;
} else if ($action == "get-count") {
    $cartProducts = $_SESSION["products"] ?? [];
    $userId = $_SESSION["USER_ID"] ?? false;
    if ($userId) {
        $sql = "SELECT * FROM cart WHERE user_id = '$userId'";
        $result = mysqli_query($con, $sql);
        $cartProducts = [];
        while ($result && $myrow = mysqli_fetch_array($result)) {
            $cartProducts[$myrow["product_id"]] = $myrow;
        }
    }
    $jsonarray["code"] = 0;
    $jsonarray["count"] = count($cartProducts);
    echo json_encode($jsonarray);
    exit;
} elseif ($action == "get") {
    $cartProducts = $_SESSION["products"] ?? [];
    $userId = $_SESSION["USER_ID"] ?? false;
    if ($userId) {
        $sql = "SELECT * FROM cart WHERE user_id = '$userId'";
        $result = mysqli_query($con, $sql);
        $cartProducts = [];
        while ($result && $myrow = mysqli_fetch_array($result)) {
            $cartProducts[$myrow["product_id"]] = $myrow;
        }
    }
    foreach ($cartProducts as $key => $value) {
        $id = $key;
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        if ($result && $myrow = mysqli_fetch_array($result)) {
            $cartProducts[$key]["name"] = $myrow["product_name"];
            $image_array = explode("|", $myrow["itemimage"]);
            $cartProducts[$key]["image"] = EXISTING_IMAGE_VIEW . $image_array[0];
        } else {
            $error = 1;
            $error_msg = "Invalid product";
            $jsonarray["code"] = $error;
            $jsonarray["msg"] = $error_msg;
            echo json_encode($jsonarray);
            exit;
        }
    }

    $jsonarray["code"] = 0;
    $jsonarray["data"] = $cartProducts;
    echo json_encode($jsonarray);
    exit;
} elseif ($action == "remove") {
    $id = $_POST["id"];
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $myrow = mysqli_fetch_array($result)) {
        $product = $myrow;
    } else {
        $error = 1;
        $error_msg = "Invalid product";
        $jsonarray["code"] = $error;
        $jsonarray["msg"] = $error_msg;
        echo json_encode($jsonarray);
        exit;
    }

    $userId = $_SESSION["USER_ID"] ?? false;
    if ($userId) {
        $sql = "Delete FROM cart WHERE user_id = '$userId' AND product_id = '$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_affected_rows($con) <= 0) {
            $error = 1;
            $error_msg = "something went wrong while deleting item from cart";
            $jsonarray["code"] = $error;
            $jsonarray["msg"] = $error_msg;
            echo json_encode($jsonarray);
            exit;
        }
    }
    else {
        unset($_SESSION["products"][$id]);
    }
    $jsonarray["code"] = 0;
    echo json_encode($jsonarray);
    exit;
} elseif ($action == "update") {
    $id = $_POST["id"];
    $quantity = $_POST["qtn"];
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result && $myrow = mysqli_fetch_array($result)) {
        $product = $myrow;
    } else {
        $error = 1;
        $error_msg = "Invalid product";
        $jsonarray["code"] = $error;
        $jsonarray["msg"] = $error_msg;
        echo json_encode($jsonarray);
        exit;
    }

    $userId = $_SESSION["USER_ID"] ?? false;
    if ($userId) {
        $amount = $product['sale_price'];
        $totalAmount = $amount * $quantity;
        $sql = "UPDATE cart SET quantity ='$quantity', amount='$amount', total_amount ='$totalAmount', modifiedon = NOW() WHERE product_id = '$id' AND user_id = '$userId'";
        $result = mysqli_query($con, $sql);
        if (mysqli_affected_rows($con) <= 0) {
            $error = 1;
            $error_msg = "something went wrong while updating cart";
            $jsonarray["code"] = $error;
            $jsonarray["msg"] = $error_msg;
            echo json_encode($jsonarray);
            exit;
        }
    } else {
        $_SESSION["products"][$id] = [
            "quantity" => $quantity,
            "amount" => $product["sale_price"],
            "total_amount" => $product["sale_price"] * $quantity
        ];
    }
    $jsonarray["code"] = 0;
    echo json_encode($jsonarray);
    exit;
} elseif ($action == "total_amount") {
    $cartProducts = $_SESSION["products"] ?? [];
    $userId = $_SESSION["USER_ID"] ?? false;
    if ($userId) {
        $sql = "SELECT * FROM cart WHERE user_id = '$userId'";
        $result = mysqli_query($con, $sql);
        $cartProducts = [];
        while ($result && $myrow = mysqli_fetch_array($result)) {
            $cartProducts[$myrow["product_id"]] = $myrow;
        }
    }
    $totalAmount = 0;
    foreach ($cartProducts as $key => $value) {
        $totalAmount += $value["total_amount"];
    }

    $jsonarray["code"] = 0;
    $jsonarray["data"] = $totalAmount;
    echo json_encode($jsonarray);
    exit;
}
