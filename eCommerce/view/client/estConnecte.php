<main>
    <div>
        <h2><?php $title ?></h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        /* if(isset($message)){
          echo $message;
          } */
        ?>
    </div>
</main>