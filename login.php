<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
    }

    .login-container {
      display: flex;
      align-items: center;
    }

    .login-form {
      background-color: #fff;
      width: 400px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .login-form h2 {
      text-align: center;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .login-form label {
      display: block;
      font-weight: bold;
    }

    .login-form .remember-me {
      display: flex;
      align-items: center;
      margin-bottom: 5%;
    }

    .login-form input[type="checkbox"] {
      margin-right: 5px;
    }

    .login-form button[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #152238;
      border: none;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      border-radius: 4px;
    }

    .login-form .register-link {
      text-align: center;
      margin-top: 10px;
      color:darkgrey;
    }

    .login-image {
      margin-right: 500px;
    }
  </style>
</head>
<body>
    <a href="index.php">.</a>
  <div class="login-container">
    <img class="login-image" src="market-image.jpg" alt="Market Image">
    <div class="login-form">
      <h2>Login</h2>
      <form>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <div class="remember-me">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Remember me</label>
        </div>

        <button type="submit">Submit</button>

        <div class="register-link">
          <a href="register.php">Don't have an account? Register Here</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
