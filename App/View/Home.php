<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Carrinho de Compras PHP/POO</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<div class="page-header">
  			<h1>Home</h1>
		</div>

		<table class="table table-striped">
			<thead>
                <tr>
					<th>#</th>
					<th>Produto</th>
					<th>Preço</th>
					<th></th>
				</tr>

			</thead>
			<tbody>
            <?php foreach ($products as $product) :?>
				<tr>
					<td> <?php echo $product->getId(); ?> </td>
					<td> <?php echo $product->getName(); ?> </td>
					<td> <?php echo number_format($product->getPrice(), 2, ',', '.'); ?> </td>
					<td>
                        <form action="index.php?page=cart&action=add" method="post">
                            <input name="id" type="hidden" value="<?php echo $product->getId() ?>">
                            <button type="submit" class="btn btn-primary">Add ao carrinho</button>
                        </form>
                    </td>
				</tr>
            <?php endforeach ?>
			</tbody>
		</table>
	</div>


</body>
</html>