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
  			<h1>Carrinho</h1>
            <a href="index.php" class="btn btn-default">Produtos</a>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Produto</th>
					<th>Quantidade</th>
					<th>Preço</th>
					<th>Subtotal</th>
                    <th></th>
				</tr>
			</thead>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td><b>R$ <?php echo number_format($cartTotal, 2,',','.') ?></b></td>
                    <td></td>
                </tr>
            </tfoot>
			<tbody>
            <?php foreach ($cartItems as $item) : ?>
				<tr>
					<td> <?php echo $item->getProduct()->getId() ?> </td>
					<td> <?php echo $item->getProduct()->getName() ?> </td>
					<td>
                        <form action="index.php?page=cart&action=update" method="post">
                            <input name="id" type="hidden" value="<?php echo $item->getProduct()->getId() ?>">
                            <input type="text" name="quantity" value="<?php echo $item->getQuantity() ?>">
                            <button type="submit" class="btn btn-primary btn-xs">Alterar</button>
                        </form>
                            <?php echo $item->getQuantity() ?> 
                    </td>
					<td>R$: <?php echo number_format($item->getProduct()->getPrice(), 2,',','.') ?> </td>
					<td>R$: <?php echo number_format($item->getProduct()->getSubTotal(),2,',','.') ?> </td>
					<td>
                        <a class="btn btn-danger" href="index.php?page=cart&action=delete&id=<?php echo $item->getProduct()->getId()?>">Excluir</a>
                    </td>
				</tr>
            <?php endforeach; ?>
            </tbody>
			</tbody>
		</table>
	</div>





    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>