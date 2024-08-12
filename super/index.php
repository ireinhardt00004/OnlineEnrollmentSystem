<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Super Admin</title>
  <style>
    /* Styles for the modal */
    body {
      background-color: #01796F;
    }
    .modal {
      display: block;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
      font-family: Arial sans-serif !important;

    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 30%;
      border-radius: 25px;

    }
    h1 {
      text-align: center  ;
    }
    /* Styles for the form */
    input[type="text"],
    input[type="password"],
    button {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      border-radius: 25px;
    }

    button {
      background-color: darkgreen;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 20px;
    }

    /* Add some spacing to the button */
    button[type="button"] {
      margin-top: 10px;
    }
   input {
      font-size: 1em ;
    }
    select {
      font-size: 1em;
      max-width: 100%;
    }
  </style>
</head>

<body>
  
  

  <!-- The Modal -->
  <div id="loginModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <h1> PORTAL</h1><br><br>
      
      <form method="post" action="logon.php" style="font-family: arial sans-serif; font-size: 2em; text-align: center;">
        <?php if (isset($_GET['error'])) { ?>
                            <p style="color:red; font-size:20px;  "class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
        <label for="username">USERNAME:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">PASSWORD:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="submit">LOGIN</button>
      </form>
    </div>
  </div>

 
</body>

</html>
