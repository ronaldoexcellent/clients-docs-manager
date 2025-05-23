<?php session_start(); ?>

<?php include "../base.php"; ?>
<?php base("includes/page.php"); ?>
<?php include("../includes/alert.php"); ?>

<body>
    <?php
        $_SESSION['msg'] = alert('success', 'You are now logged out!');
        session_unset();
        session_destroy();
        header("location: ".baseUrl('index.php'));
    ?>
</bodu>