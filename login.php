#!/usr/local/bin/php
<?php
    session_save_path(__DIR__ . '/sessions/');
    session_name('shutTheBox');
    session_start();

    //bool for incorrect/correct submission

    $incorr_submiss = false;

    //password submit, check and update incorrsubmis and session[loggedin]
    if (isset($_POST['passSubmit'])) {
        validate($_POST['passSubmit'], $incorr_submiss);
    }

    function validate($submiss, &$incorr_submiss) {
        $file = fopen('h_password.txt', 'r') or die('Unable to find hashed password');
        //if file is opened successfully

        $hashed_password = fgets($file);
        $hashed_password = rtrim($hashed_password);

        fclose($file);

        $hashed_submiss = hash('md2', $submiss);
        
        if($hashed_password !== $hashed_submiss) {
            $_SESSION['loggedin'] = false;
            $incorr_submiss = true;
        }
        else {
            $_SESSION['loggedin'] = true;
            header('Location: welcome.php');
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Shut The Box</title>
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to play "Shut The Box"?</h1>
    </header>

  <main>
  
    <section>
      <h2>Login</h2>
      <p>
       In order to play you need a password.
      </p>
      <p>
      If you're new to this website, <i>welcome</i>! The password is <b>forMichael8andSam3</b>.
      </p>
    </section>
    <section>
      <fieldset class="section_layout">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <label for="password">Password:</label>
              <input type="password" id='password' name='passSubmit'>
              <input type="submit" value="Login">
          </form>
      </fieldset>

      <?php
          if ($incorr_submiss) {
              echo '<p>Invalid password!</p>';
          }
      ?>
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