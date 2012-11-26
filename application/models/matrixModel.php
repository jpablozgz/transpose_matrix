<?php

/**
 * Generates a random square matrix
 * @param int $dim Dimension of the matrix
 * @return array: Resulting random matrix
 */
function randomMatrix($dim)
{
	$matrix = array();
	for($i=1;$i<=$dim;$i++)
		for($j=1;$j<=$dim;$j++)
			$matrix[$i][$j]=rand(1,$dim*$dim);
	return $matrix;
}

/**
 * Transposes a matrix
 * @param array $matrix_src Original matrix
 * @return array: Transposed matrix
 */
function transpose($matrix_src)
{
	$matrix = array();
	$dim = count($matrix_src);
	for($i=1;$i<=$dim;$i++)
		for($j=1;$j<=$dim;$j++)
			$matrix[$i][$j]=$matrix_src[$j][$i];
	return $matrix;
}

/**
 * Recursive function invoked by generateCombinations
 * @param array $combinationsList List of combinations already computed
 * @param array $combination First elements of the combination being now computed
 * @param array $elementsLeft List of elements left to choose
 * @param int $combinLeft Number of elements left to choose
 */
function rGenCombinations(&$combinationsList,$combination,$elementsLeft,$combinLeft)
{
	if($combinLeft!=0)
	{
		for ($i=0;$i<=count($elementsLeft)-$combinLeft;$i++)
		{
			$newCombination = $combination;
			$newCombination[] = $elementsLeft[$i];
			rGenCombinations($combinationsList,$newCombination,
						array_slice($elementsLeft,$i+1),$combinLeft-1);
		}
	}
	else
		$combinationsList[] = $combination;
}

/**
 * Generates all combinations of n elements of a matrix
 * @param array $matrix Matrix whose elements are combined
 * @param int $combinations Number of elements belonging to a combination
 * @return array: List of possible combinations
 */
function generateCombinations($matrix,$combinations)
{
	$combinationsList=array();
	$elements=array();
	foreach($matrix as $row)
		$elements = array_merge($elements,$row);
	rGenCombinations($combinationsList,array(),$elements,$combinations);
	return $combinationsList;
}
?>