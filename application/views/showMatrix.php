<!DOCTYPE html>
<html lang="en">
<head>
<title>Exercise course CTA: Transpose matrix</title>
<meta name="robots" content="noarchive,noodp,noydir">
<meta name="description" content="Transpose matrix">
<meta name="keywords" content="Transpose,Matrix,Web,PHP">
<meta charset="UTF-8" />
</head>
<body>
<div id="matrix">
	<table border="1">
<? for ($i=1;$i<=$dimMatrix;$i++):?>
	<tr>
<? for ($j=1;$j<=$dimMatrix;$j++):?>
		<td><?=$matrix[$i][$j]?></td>
<? endfor;?>
	</tr>
<? endfor;?>
	</table>
</div>
<div id="formulario">
	<form action="index.php" method="POST">
		<input type="hidden" name="matrix" value="<?=serialize($matrix);?>"/>
		dimension: <input type="text" name="dim" value="<?=$dimMatrix?>"/>
		combinations: <input type="text" name="combinations" value="<?=$combinations?>"/><br />
		<input type="submit" name="regenerate" value="Regenerate!"/>
  		<input type="submit" name="transpose" value="Transpose"/>
  	</form>
</div>
<div id="combinatorias">
	<p><b>Combinations (only if 2&lt;=dimension&lt;=3):</b></p>
<? foreach($combinationsList as $combination):?>
		(<?=implode(',',$combination);?>)<br />
<? endforeach;?>
</div>
</body>
</html>