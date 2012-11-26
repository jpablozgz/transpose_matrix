<?php
	
require_once("../application/models/matrixModel.php");

if($_POST) // a button was pressed
{
	//FIXME: If the button 'transpose' is pressed, dimMatrix shouldn't change
	$dimMatrix = $_POST['dim'];
	$combinations = $_POST['combinations'];
	if (isset($_POST['regenerate']))   // if pressed regenerate button
		$matrix = randomMatrix($dimMatrix);
	else								// pressed transpose button
		$matrix = transpose(unserialize($_POST['matrix']));
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
