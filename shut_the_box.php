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
    $userenter = isset($_COOKIE['username']) && $welcome;
    if ($userenter === false) {
      header('Location: welcome.php');
      exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Shut The Box</title>
    <script src="shut_the_box.js?v=22" defer></script>
    <script src="username.js?v=12" defer></script>
  </head>

  <body>
    <header>
      <h1>Shut The Box</h1>
    </header>

    <main>
      <section>
        <h2>The Rules</h2>
        <ol type="i">
          <li>Each turn, you roll the dice (or die) and select 1 or more boxes which sum to the value of your roll.</li>
          <li>You will not be allowed to pick the boxes which you choose on subsequent turns.</li>
          <li>When the sum of the boxes which are left is less than or equal to 6, you will only roll a single die.</li>
          <li>When you cannot make a move or you give up, the sum of the boxes left gives your score.</li>
          <li>Lower scores are better and a score of 0 is called "shutting the box".</li>
        </ol>
      </section>

      <section>
        <h2>Dice Roll</h2>
        <fieldset>
          <section id="dice_roll_result">
            <button id="rolldice">Roll Dice</button>
            <span> Result: </span>
            <span id="diceresult"></span>
          </section>
        </fieldset>
      </section>

      <section>
        <h2>Box Selection</h2>
        <table id='num_table'>
          <thead>
            <tr>
              <td class="num_select">1</td>
              <td class="num_select">2</td>
              <td class="num_select">3</td>
              <td class="num_select">4</td>
              <td class="num_select">5</td>
              <td class="num_select">6</td>
              <td class="num_select">7</td>
              <td class="num_select">8</td>
              <td class="num_select">9</td>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
              <td><input type="checkbox"></td>
            </tr>
          </tbody>
        </table>

        <fieldset class="section_layout">
          <button id="submitbox">Submit Box Selection</button>
          <button id="giveup">I give up / I can't make a valid move</button>
        </fieldset>
      </section>

    </main>

    <footer>
      <hr>
      <small>
        &copy; Alexandra Lansing, 2021
      </small>
    </footer>
  </body>

</html>