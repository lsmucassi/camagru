<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="wbstyles/mystyles.css">
    <meta charset="UTF-8">
    <title>Page !found</title>
</header>

<body class="fof-body">



    <?php
    if ($page_not_found) {
        header('This is not the page you are looking for', true, 404);
        include('your_404_page.php');
        exit();
    }?>

</body>
</html>