<?php
include 'Config.php';

// Add Product
if ($_POST['action'] == 'add') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id']; // Get category_id from POST

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    $sql = "INSERT INTO products (name, description, image, price, category_id) VALUES ('$name', '$description', '$imagePath', '$price', '$category_id')";
    $conn->query($sql);
}

// Fetch Products
if ($_POST['action'] == 'fetch') {
      $sql = "SELECT p.*, c.name AS category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id"; // Join with categories
      $result = $conn->query($sql);
      
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['name']}</td>
                  <td><img src='{$row['image']}' width='100'></td>
                  <td>{$row['description']}</td>
                  <td>{$row['price']}</td>
                  <td>{$row['category_name']}</td> <!-- Display category name -->
                  <td>
                      <button class='buttonaction editProduct' data-id='{$row['id']}'>
                          <i class='bi bi-pencil-square' ></i>
                      </button>
                      <button class='button deleteProduct' data-id='{$row['id']}'>
                          <i class='bi bi-trash-fill'></i>
                      </button>
                  </td>
                </tr>";
      }
  }
  

// Get a specific product for editing
if ($_POST['action'] == 'getProduct') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);
    echo json_encode($result->fetch_assoc());
}

// Update Product
if ($_POST['action'] == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id']; // Get category_id from POST

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$imagePath', category_id='$category_id' WHERE id='$id'";
    } else {
        $sql = "UPDATE products SET name='$name', description='$description', price='$price', category_id='$category_id' WHERE id='$id'"; // Update category_id
    }
    
    $conn->query($sql);
}

// Delete Product
if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM products WHERE id='$id'";
    $conn->query($sql);
}

// Fetch Categories (for dropdowns)
if ($_POST['action'] == 'fetchCategories') {
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    echo json_encode($categories);
}



$conn->close();
?>
