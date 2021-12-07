#!/usr/local/bin/php
<?php
    session_save_path(__DIR__ . '/sessions/');
    session_name('shutTheBox');
    session_start();

    //welcome check for set and true/false
    $welcome = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
    if($welcome === false) {
      header('Location: login.php');
      exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Shut The Box</title>
    <script src="username.js?v=10" defer></script>
    <script src="welcome.js?v=10" defer></script>
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to play "Shut The Box"?</h1>
    </header>

  <main>
  
    <section>
      <h2>Choose a Username</h2>
      <p>
       So that we can post your score(s), please choose a username.
      </p>
    </section>
    
    <fieldset class="section_layout">
      <label for="username">Username:</label>
      <input type="text" id='username'>
      <input type="button" value="Submit" id='submitBtn' onclick='enter_username()'>
    </fieldset>

  </main>

    <footer>
      <hr>
      <small>
        &copy; Alexandra Lansing, 2021
      </small>
    </footer>
  </body>

</html>