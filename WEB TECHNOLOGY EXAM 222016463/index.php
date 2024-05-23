<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: url('2.jpg') center/cover no-repeat;
    /* Replace 'background-image.jpg' with your image path */
    /* background-color: #FFFFFF; /* White fallback */
    color: #FFFFFF; /* White */
    background-blend-mode: overlay;
    height: 100vh;
    
  }

  .overlay {
    background-color: rgba(0, 0, 0, 0.5); /* Overlay color with 50% opacity */
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1; /* Ensure overlay is above the background */
  }

  .container {
    position: relative;
    z-index: 2; /* Ensure container is above the overlay */
  }

  h1 {
    font-size: 3rem;
    margin-bottom: 20px;
  }

  p {
    font-size: 1.2rem;
    margin-bottom: 30px;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2rem;
    text-decoration: none;
    color: #FFFFFF; /* White */
    background-color: #007BFF; /* Blue */
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #0056b3; /* Darker Blue */
    box-shadow: 2px;
  }

  .btn-register {
    background-color: #000000; /* Black */
    margin-left: 20px;
  }

  .btn-register:hover {
    background-color: #333333; /* Darker Black */
  }
  .dropdown-contents {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    left: 0; /* Aligning dropdown contents to the left */
  }
  .dropdown:hover .dropdown-contents {
    display: block;
  }
  .dropdown-contents a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
</style>
</head>
<body style="background-image: url('./image/logo.jpg');background-repeat: no-repeat;background-size:cover;">
<body>

<div class="overlay">
  <div class="container">
    <h1>Welcome to Our Website</h1>
    <p>Your one-stop destination for all your needs</p>
    <a href="login.html" class="btn">Login</a>
    <a href="register.html" class="btn btn-register">Register</a>
  </div>
</div>

</body>
</html>