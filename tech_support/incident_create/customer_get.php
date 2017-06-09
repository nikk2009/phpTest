<?php include '../view/header.php'; ?>
<main>
<link rel="stylesheet" href="../main.css" />
    <h2>Get Customer</h2>
    <p>You must enter the customer's email address to select the customer.</p>
    <!-- display a search form -->
    <form action="" method="post">
        <input type="hidden" name="action" value="get_customer">
        <label>Email:</label>&nbsp;
        <input type="input" name="email" 
               value="">&nbsp;
        <input type="submit" value="Get Customer">
    </form>

</main>
<?php include '../view/footer.php'; ?>