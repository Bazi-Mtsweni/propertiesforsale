<?php

include '../routes/paths.php';
session_start();

if (!isset($_SESSION['title']) && !isset($_SESSION['body'])) {
  header("Location: " . BASE_URL);
  session_destroy();
  exit;
}

?>


<!DOCTYPE html>
<html lang="en-za">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Thank You! - Properties For Sale | Springs</title>

  <!-- Fav Icon -->
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">

  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/sent.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php include(ROOT_PATH . '/../components/header.php'); ?>

  <main>
    <section class="hero">
      <div class="info">
        <div class="image-container">
          <img src="../images/sent/paper-airplane.webp" alt="Paper airplane">
        </div>
        <h1><?php echo $_SESSION["title"]; ?></h1>
        <p><?php echo $_SESSION["body"]; ?></p>
        <div class="cta flex">
          <a href="<?php echo BASE_URL; ?>" class="btn-primary mr-2">Go Back home</a>
          <a href="<?php echo BASE_URL . '#services'; ?>" class="btn-secondary">Browse More Services</a>
        </div>
      </div>
    </section>
  </main>

  <?php include(ROOT_PATH . '/../components/footer.php'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../js/pages.js"></script>
</body>

</html>

<?php

session_destroy();

?>