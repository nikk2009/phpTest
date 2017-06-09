<?php 
include '../view/header.php'; 

?>
<html>
<link rel="stylesheet" href="../main.css" />
<main>

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <!-- display a search form -->
	<label>Email:</label>
		<form action="product_register.php" method="post">
			<input type="hidden" name="action" value="email"; >
			<input type="text" name="email" value="">
			<input type="submit" value="Login">
		</form>
	
</main>
</html>

<?php include '../view/footer.php'; ?>