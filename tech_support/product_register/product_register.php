<?php include '../view/header.php'; 

require('../model/database.php');
$email =filter_input(INPUT_POST, 'email');

if ($email != false){


	$query = 'SELECT firstName, lastName, customerID FROM customers
					WHERE email = :email';
	$statement = $db-> prepare($query);
	$statement ->bindValue(':email', $email);
	$statement ->execute();
	$results=$statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	
}

$query = 'SELECT * FROM products';
$statement = $db-> prepare($query);
$statement ->execute();
$products=$statement ->fetchAll(PDO::FETCH_ASSOC);
$statement ->closeCursor();


?>
<main>
<link rel="stylesheet" href="../main.css" />
    <h2>Register Product</h2>
    
        <p></p>
    
        <form action="finish_register.php" method="post" id="aligned">
			
			<label>Customer:</label>
			<?php foreach ($results as $result) : ?>
				<?php echo $result['firstName']." ".$result['lastName']?>
            <?php endforeach ?>
			
				<br>
			<label>Product:</label>
				<select name="productCode" id = "productCode">
					<?php foreach ($products as $product) : ?>
						<option value = <?php echo $product['productCode']; ?>>
						<?php echo $product['name']; ?>
						</option>
					<?php endforeach ?>
					<?php echo $product['productCode']; ?>
				</select>
				<br>

				<label>&nbsp;</label>
			
			<input type='hidden' name='customerID' value="<?php echo $result['customerID'] ?>" >
            <input type="submit" value="Register Product" >
        </form>


</main>

<?php include '../view/footer.php'; ?>