<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Account</title>
</head>

<body>

    <h1 id="back"><a href="Home"><i class="bi bi-arrow-left"></i> Back to dashboard</a></h1>
    <section class="profile">
        <h1>Account settings</h1>
        <h2>Profile</h2>
        <div class="profile-container">
            <?php echo form_open('Account', 'enctype="multipart/form-data"'); ?>
            <!-- <form method="POST" enctype="multipart/form-data"> -->
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="profile-picture">
                    <img src="<?php echo $image; ?>" alt="">
                    <div class="select-picture">
                        <i class="bi bi-camera"></i>
                        <input type="file" name="user_profile" accept="image/*" id="image-picker">
                    </div>
                </div>
                <div class="inputs">
                    <div class="input">
                        <h1>First name</h1>
                        <input type="text" name="first_name" placeholder="First name" value="<?php echo $first_name; ?>" autocomplete="off">
                    </div>
                    <div class="input">
                        <h1>Last name</h1>
                        <input type="text" name="last_name" placeholder="First name" value="<?php echo $last_name; ?>" autocomplete="off">
                    </div>
                    <div class="input">
                        <h1>Email</h1>
                        <input type="text" name="email" placeholder="First name" value="<?php echo $email; ?>" autocomplete="off">
                    </div>
                    <input type="submit" name="update" value="UPDATE PROFILE">
                </div>
            </form>
        </div>
    </section>

    <section class="password">
        <h2>Password</h2>
        <?php echo form_open('Account'); ?>
        <!-- <form method="POST"> -->
            <div class="password-container">
                <div class="new-password">
                    <div class="input">
                        <h1>New password</h1>
                        <input type="password" name="new_password" placeholder="New password">
                    </div>
                    <div class="input">
                        <h1>Confirm new password</h1>
                        <input type="password" name="cnew_password" placeholder="Confirm new password">
                    </div>
                </div>
                <div class="old-update">
                    <div class="input">
                        <h1>Old password</h1>
                        <input type="password" name="old_password" placeholder="Old password">
                    </div>
                    <input type="submit" name="change" value="CHANGE PASSWORD">
                </div>
            </div>
        </form>
    </section>
    <section class="errors">
        <?php if (!empty(form_error('first_name'))) : ?>
            <div class="error error-danger">
                <p><?php echo form_error('first_name'); ?></p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
        <?php endif; ?>
        <?php if (!empty(form_error('email'))) : ?>
            <div class="error error-danger">
                <p><?php echo form_error('email'); ?></p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
        <?php endif; ?>
        <?php if (!empty(form_error('last_name'))) : ?>
            <div class="error error-danger">
                <p><?php echo form_error('last_name'); ?></p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
        <?php endif; ?>
        <?php if (!empty(form_error('new_password'))) : ?>
            <div class="error error-danger">
                <p><?php echo form_error('new_password'); ?></p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
        <?php endif; ?>
        <?php if (!empty(form_error('cnew_password'))) : ?>
            <div class="error error-danger">
                <p><?php echo form_error('cnew_password'); ?></p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
        <?php endif; ?>
        <?php if (!empty(form_error('old_password'))) : ?>
            <div class="error error-danger">
                <p><?php echo form_error('old_password'); ?></p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error">
                <p>Update Success</p>
                <button class="close-toast"><i class="bi bi-x"></i></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    </section>
    <script src="<?php echo base_url() ?>assets/javascript/account.js"></script>
</body>

</html>