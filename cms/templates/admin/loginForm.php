<?php 
$brad="href=../cms/art.php";
$title="Travel";

$travel="active";
include_once '../public/header.php'; ?>
<?php include "templates/include/header.php" ?>

      <form action="admin.php?action=login&lang=<?=$_SESSION['lang']?>" method="post" style="width: 70%;">
        <input type="hidden" name="login" value="true" />

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="username" id="admin">Username</label>
            <input type="text" name="username" id="username" placeholder="Your admin username" required autofocus maxlength="20" />
          </li>

          <li>
            <label for="password" id="admin">Password</label>
            <input type="password" name="password" id="password" placeholder="Your admin password" required maxlength="20" />
          </li>

        </ul>

        <div class="buttons">
          <input type="submit" name="login" value="Login" />
        </div>

      </form>

<?php include "templates/include/footer.php" ?>
<?php include_once '../public/footer.php'; ?>
