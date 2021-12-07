#!/usr/local/bin/php
<?php
session_save_path(__DIR__ . '/sessions/');
session_name('shutTheBox');
session_start();

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
    <script src="scores.js?v=10" defer></script>
    <script src="shut_the_box.js?v=17" defer></script>
  </head>

  <body>
    <header>
      <h1>Shut The Box</h1>
    </header>

  <main>
  
    <section>
      <h2>Scores</h2>
      <p>
       Well done! Here are the scores so far...
      </p>
      <p id="displayScores">
      </p>
    </section>
    
    <fieldset class="section_layout">
      <input type="button" value="PLAY AGAIN!!!" onclick="location.href='welcome.php'">
    </fieldset>
    <fieldset class="section_layout">
      <input type="button" value="Force Update / Start Updating" onclick="forceUpdate();">
      <input type="button" value="Stop Updating" onclick="stopUpdate();">
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

