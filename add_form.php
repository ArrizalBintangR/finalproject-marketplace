<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "marketplace";

// Membuat koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Memproses form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_name = $_POST["item_name"];
  $description = $_POST["description"];
  $price = $_POST["price"];

  // Mengambil informasi file gambar
  $image = $_FILES["image"];
  $image_name = $image["name"];
  $image_tmp = $image["tmp_name"];
  $image_size = $image["size"];
  $image_error = $image["error"];

  // Memeriksa apakah file gambar diunggah dengan sukses
  if ($image_error === UPLOAD_ERR_OK) {
    // Menentukan lokasi penyimpanan file gambar
    $image_destination = "images/" . $image_name;

    // Memindahkan file gambar ke lokasi penyimpanan
    if (move_uploaded_file($image_tmp, $image_destination)) {
      // Menyimpan data ke tabel "Items"
      $sql = "INSERT INTO Items (item_name, description, price) VALUES ('$item_name', '$description', '$price')";
      if (mysqli_query($conn, $sql)) {
        // Mendapatkan ID item yang baru ditambahkan
        $item_id = mysqli_insert_id($conn);

        // Menyimpan data ke tabel "Images"
        $sql = "INSERT INTO Images (item_id, image_url) VALUES ('$item_id', '$image_destination')";
        if (mysqli_query($conn, $sql)) {
          echo "Item added successfully.";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "Failed to move uploaded file.";
    }
  } else {
    echo "Error uploading image.";
  }
}

// Menutup koneksi ke database
mysqli_close($conn);
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

    /* Additional CSS for centering the form */
    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form {
      max-width: 500px;
      padding: 30px;
      border: 1px solid #dddddd;
      border-radius: 5px;
    }

    .form label,
    .form input,
    .form textarea {
      display: block;
      margin-bottom: 15px;
      width: 100%;
    }

    .form .form-group {
      display: flex;
      align-items: center;
    }

    .form .form-group .form-input {
      flex: 1;
    }

    .price-submit {
      margin-top: 15px;
      display: flex;
      align-items: center;
    }

    .price-submit input[type="submit"] {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      background-color: #152238;
      color: #ffffff;
      border: none;
      cursor: pointer;
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

  <div class="form-container">
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
      </div>

      <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
      </div>

      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
      </div>

      <div class="price-submit">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</body>

</html>