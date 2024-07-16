<?php
header("Content-Type: application/json");

include ("database.php");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (!empty($_GET['id'])) {
            getProduct($conn, $_GET['id']);
        } else {
            getProducts($conn);
        }
        break;
    case 'POST':
        addProduct($conn);
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        updateProduct($conn, $_PUT);
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        deleteProduct($conn, $_DELETE['id']);
        break;
    default:
        echo json_encode(["message" => "Method not supported"]);
        break;
}

function getProducts($conn)
{
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    echo json_encode($products);
}

function getProduct($conn, $id)
{
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        echo json_encode($product);
    } else {
        echo json_encode(["message" => "Product not found"]);
    }

    $stmt->close();
}

function addProduct($conn)
{
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data['name'] ?? '';
    $description = $data['description'] ?? '';
    $price = $data['price'] ?? '';

    if ($name && $price) {
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssd", $name, $description, $price);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Product added successfully"]);
        } else {
            echo json_encode(["message" => "Failed to add product"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["message" => "Name and price are required"]);
    }
}

function updateProduct($conn, $data)
{
    $id = $data['id'] ?? '';
    $name = $data['name'] ?? '';
    $description = $data['description'] ?? '';
    $price = $data['price'] ?? '';

    if ($id && $name && $price) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $name, $description, $price, $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Product updated successfully"]);
        } else {
            echo json_encode(["message" => "Failed to update product"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["message" => "ID, name, and price are required"]);
    }
}

function deleteProduct($conn, $id)
{
    if ($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Product deleted successfully"]);
        } else {
            echo json_encode(["message" => "Failed to delete product"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["message" => "ID is required"]);
    }
}

$conn->close();
?>