<?php

function solution($A)
{
    // write your code in PHP8.0 
    $cost = INF;
    for ($firstCut = 1; $firstCut <= (count($A) - 4); ++$firstCut) {
        for ($secondCut = $firstCut + 2; $secondCut <= (count($A) - 2); ++$secondCut) {
            $currentCost = $A[$firstCut] + $A[$secondCut];

            if ($currentCost < $cost) {
                $cost = $currentCost;
            }
        }
    }

    return $cost;
}