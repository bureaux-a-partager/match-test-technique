<?php

function solutionUbiq($a): int
{
    $mins = [];
    if (count($a) < 5) {
        return -1;
    }
    
    foreach ($a as $i => $e) {
        // Avoid edges
        if ($i === 0 || $i === count($a) - 1) {
            continue;
        }
        // Store the 4 minimums in $a, keep it sorted
        if (count($mins) < 4 || $a[$mins[3]] > $e) {
            // Find the index to put the new index min
            for ($k = min(count($mins) - 1, 2); $k >= 0; $k--) {
                if ($e >= $a[$mins[$k]]) {
                    break;
                }
                $mins[$k + 1] = $mins[$k];
            }
            $mins[$k + 1] = $i;
        }
    }

    // Init sum min to max of mins * 2 + 1 (more than every pair sums)
    $sumMin = ($a[$mins[count($mins) - 1]] * 2) + 1;
    
    // Cumpute the sums of elements
    foreach($mins as $index1) {
        foreach ($mins as $index2) {
            if (abs($index1 - $index2) > 1) {
                $newSum = $a[$index1] + $a[$index2];
                if ($newSum < $sumMin) {
                    $sumMin = $newSum;
                }
                break;
            }
        }
    }
    return $sumMin;
}