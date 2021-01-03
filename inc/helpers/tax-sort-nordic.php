<?php

function sort_nordic(&$array) {
    uasort($array, 'nordic_cmp');
}

function nordic_cmp($a, $b) {
    // If å, ä, and ö is missing from first string, just use PHP's native function
    if (preg_match('/([å]|[ä]|[ö]|[Å]|[Ä]|[Ö])/', $a) == 0) {
        return strcoll($a, $b);
    }
    // If å, ä, and ö is missing from second string, also use PHP's native function
    if (preg_match('/([å]|[ä]|[ö]|[Å]|[Ä]|[Ö])/', $b) == 0) {
        return strcoll($a, $b);
    }

    // Arriving here both the strings contains some characters we have too look out for
    // First, create arrays from the strings so we can easily loop over the characters
    // Comparison is made in lowercase
    $a_arr = preg_split('//u', mb_strtolower($a), -1, PREG_SPLIT_NO_EMPTY);
    $b_arr = preg_split('//u', mb_strtolower($b), -1, PREG_SPLIT_NO_EMPTY);

    // Get the length of the shortest string
    $end = min(mb_strlen($a), mb_strlen($b));

    // Loop over the characters and compare them in pairs
    for ($i = 0; $i < $end; $i++) {
        // Check if character in the first string is one that we have to correct for
        if (mb_stripos("åäö", $a_arr[$i]) !== false) {
            // Computes the corrected return value. The first character "-" is just a
            // nonsene placeholder to return 1 for "ä", 2 for "å" and 3 for "ö"
            $r = mb_stripos("-åäö", $a_arr[$i]) - mb_stripos("-åäö", $b_arr[$i]);
            if ($r != 0) {
                return $r;
            }
        } else {
            // If the character is not a character that we have to correct for
            // the PHP native works fine
            $r = strcoll($a_arr[$i], $b_arr[$i]);
            if ($r != 0) {
                return $r;
            }
        }
    }
    // Fallback: If so far there has been no call to return() then the
    // strings are idenical up until the length of the shorter string.
    // Then let the lengths of the strings determine the order
    return mb_strlen($a) - mb_strlen($b);
}

function sortTaxNordic($hierarchy) {
    $sortTaxAZ = [];
    $hierarchyNew = [];

    foreach ($hierarchy as $key => $singleTax) {
        if (is_array($singleTax)) {
            $sortTaxAZ[$key] = $singleTax['name'];
        } else if (is_object($singleTax)){
            $sortTaxAZ[$key] = $singleTax->name;
        } else {
            $sortTaxAZ[$key] = $singleTax;
        }
    }

    sort_nordic($sortTaxAZ);

    foreach ($sortTaxAZ as $key => $name) {
        $hierarchyNew[$key] = $hierarchy[$key];
    }

    return $hierarchyNew;
}