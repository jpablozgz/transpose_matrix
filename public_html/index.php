<?php
	
require_once("../application/models/matrixModel.php");

if($_POST) // a button was pressed
{
	$combinations = $_POST['combinations'];
	if (isset($_POST['regenerate']))   // if pressed regenerate button
	{
		$dimMatrix = ((is_numeric($_POST['dim']) && intval($_POST['dim']) >= 1
				&& intval($_POST['dim']) <= 100)? intval($_POST['dim']) : rand(2,5));
		$matrix = randomMatrix($dimMatrix);
	}
	else								// pressed transpose button
	{
		$matrix = transpose(unserialize($_POST['matrix']));
		$dimMatrix = count($matrix);
	}
}
else // the page was reloaded
{
	$dimMatrix = rand(2,5);
	$combinations = rand(1,4);
	$matrix = randomMatrix($dimMatrix);
}

// generate all combinations of $combinations elements of $matrix
// NOTE: done only if the dimension of the matrix is lower than 3
$bool_genComb = ($dimMatrix<=3 &&
				$combinations<=$dimMatrix*$dimMatrix &&
				$combinations>=0);
$combinationsList = ($bool_genComb ? generateCombinations($matrix,$combinations) : array());

// update screen
include("../application/views/showMatrix.php");
?>
