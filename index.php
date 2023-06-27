<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "marketplace";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Menghapus item dan gambar terkait
if (isset($_GET['item_id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
  $item_id = $_GET['item_id'];

  // Menghapus gambar terkait dari tabel Images
  $delete_image_sql = "DELETE FROM Images WHERE item_id = '$item_id'";
  $delete_image_result = $conn->query($delete_image_sql);

  // Menghapus item dari tabel Items
  $delete_item_sql = "DELETE FROM Items WHERE item_id = '$item_id'";
  $delete_item_result = $conn->query($delete_item_sql);

  if ($delete_item_result && $delete_image_result) {
    echo "Item berhasil dihapus.";
  } else {
    echo "Terjadi kesalahan saat menghapus item: " . $conn->error;
  }
}

// Mengambil data item dari database
$sql = "SELECT Items.*, Images.image_url FROM Items LEFT JOIN Images ON Items.item_id = Images.item_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>My Marketplace</title>
  <style>
    /* CSS styles for the website */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #152238;
      color: #ffffff;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar-title {
      font-size: 24px;
      font-weight: bold;
      margin-right: 20px;
    }

    .navbar-links {
      display: flex;
    }

    .navbar-links a {
      color: #ffffff;
      text-decoration: none;
      margin-right: 10px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .item-options {
      flex: 0 0 20%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .item-options a {
      color: #000000;
      text-decoration: none;
      padding: 8px 16px;
      background-color: #f2f2f2;
      border-radius: 4px;
    }

    .item-image {
      flex: 0 0 200px;
      margin-right: 20px;
    }

    .item-image img {
      max-width: 100%;
    }

    .item-details {
      flex: 1;
    }

    .item-name {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .item-description {
      color: #888888;
      margin-bottom: 10px;
    }

    .item-price {
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <div class="navbar-title">
      MARKETPLACE AOI
    </div>
    <div class="navbar-links">
      <a href="index.php">Home (For Admin)</a>
      <a href="home_user.php">Home (For Buyer)</a>
      <a href="add_form.php">Add New Item</a>
      <a href="#">Cart</a>
      <a href="login.php">Account</a>
    </div>
  </div>

  <div class="container">
    <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $item_id = $row["item_id"];
        $item_name = $row["item_name"];
        $description = $row["description"];
        $price = $row["price"];
        $image_url = $row["image_url"];
    ?>
        <div class="item">
          <div class="item-image">
            <img src="<?php echo $image_url; ?>" alt="Item Image">
          </div>

          <div class="item-details">
            <h2 class="item-name"><?php echo $item_name; ?></h2>
            <p class="item-description"><?php echo $description; ?></p>
            <p class="item-price">$<?php echo $price; ?></p>
          </div>
          <div class="item-options">
            <a href="edit_form.php?item_id=<?php echo $item_id; ?>">EDIT</a>
            <a href="?item_id=<?php echo $item_id; ?>&action=delete">DELETE</a>
          </div>
        </div>
    <?php
      }
    } else {
      echo "Tidak ada item yang ditemukan.";
    }

    // Menutup koneksi database
    $conn->close();
    ?>
  </div>
</body>

</html>