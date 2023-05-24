<?php
# Initialize the session
session_start();

# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$forum_err = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  # Validate link
  if (empty(trim($_POST["link"]))) {
    $link_err = "Please enter a link.";
  } else {
    $build_link = trim($_POST["link"]);
    if (strlen($build_link) > 200) {
      $link_err = "Link cannot contain more than 200 characters.";
    }
  }
  # Validate creator
  if (empty(trim($_POST["creator"]))) {
    $creator_err = "Please enter a creator.";
  } else {
    $creator = trim($_POST["creator"]);
    if (strlen($creator) > 50) {
      $creator_err = "Creator cannot contain more than 50 characters.";
    }
  }
  # Validate title
  if (empty(trim($_POST["title"]))) {
    $title_err = "Please enter a title.";
  } else {
    $title = trim($_POST["title"]);
    if (strlen($title) > 500) {
      $title_err = "Title cannot contain more than 100 characters.";
    }
  }
  # Validate desc
  if (empty(trim($_POST["desc"]))) {
    $desc_err = "Please enter a description.";
  } else {
    $desc = trim($_POST["desc"]);
    if (strlen($desc) > 500) {
      $desc_err = "Description cannot contain more than 500 characters.";
    }
  }
  # Validate table choice
  if (empty(trim($_POST["tablechoice"]))) {
    $tablechoice_err = "Please enter a tablechoice.";
  } else {
    $tablechoice = trim($_POST["tablechoice"]);
    if (strlen($tablechoice) > 20) {
      $tablechoice_err = "Tablechoice cannot contain more than 200 characters.";
    }
  }

  # Check input errors before inserting data into database
  if (empty($forum_err) && empty($link_err) && empty($creator_err) && empty($desc_err) && empty($title_err)) {
    # Prepare an insert statement
    $sql = "INSERT INTO buildsSubmit2(link, creator, title, description, ip_addr, sub_time, tablechoice, completed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql) or die(mysqli_error($link))) {
      # Bind varibales to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssss", $param_link, $param_creator, $param_title, $param_description, $param_ip_addr, $param_sub_time, $param_tablechoice, $param_completed);

      # Set parameters
      $param_link = $build_link;
      $param_title = $title;
      $param_creator = $creator;
      $param_description = $desc;
      $param_ip_addr = $_SERVER['REMOTE_ADDR'];
      $param_sub_time = date("m/d/y");
      $param_tablechoice = $tablechoice;
      $param_completed = 0;

      # Execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "window.location.href='../';" . "</script>";
        exit;
      } else {
        echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
      }

      # Close statement
      mysqli_stmt_close($stmt);
    }
  }

  # Close connection
  mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" value="application/xhtml+xml;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>WynnBuildDB</title>
  <meta name="description" content="WynnBuildDB" />
  <meta name="keywords" content="WynnBuildDB WynnBuild, wynn builds database wynncraft" />
  <link rel="stylesheet" href="../css/index.css" />
  <link rel="stylesheet" href="../css/submit.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="wrapper">
  <header>
    <h2 class="title">Submit a Build</h2>
    <input type="checkbox" id="active" />
    <label for="active" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <div class="wrapper-ham">
      <ul>
        <li>
          <a href="https://discord.com/users/736028271153512489">Contact</a>
        </li>
        <li>
          <a href="/">Go to Home</a>
        </li>
      </ul>
    </div>
  </header>
  <main class="content">
    <?php
    if (!empty($login_err)) {
      echo "<div class='alert alert-danger'>" . $login_err . "</div>";
    }
    ?>
    <form class="form-signin" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" class="form-control" name="link" placeholder="Build Link" required="" autofocus="" />
      <br />
      <input type="text" class="form-control" name="creator" placeholder="Build Creator" required="" autofocus="" />
      <br />
      <input type="text" class="form-control" name="title" placeholder="Build Title" required="" autofocus="" />
      <br />
      <input type="text" class="form-control" name="desc" placeholder="Build Description" required="" autofocus="" />
      <br />
      <select name="tablechoice" id="tablechoice">
        <option value="combat">Combat Builds</option>
        <option value="xp">XP Builds</option>
        <option value="lootrun">Lootrun Builds</option>
      </select>
      <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
      </input>
    </form>
  </main>
  <footer style="margin-top: auto; text-align: center">
    <a class="privacy" href="privacy.html">Privacy Policy</a>
  </footer>
</body>

</html>