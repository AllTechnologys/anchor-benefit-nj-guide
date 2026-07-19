<?php

function anchorBenefitEligibility($income, $propertyType, $age)
{
    $result = [
        'eligible' => false,
        'benefit' => 0,
        'message' => ''
    ];

    $income = floatval($income);
    $age = intval($age);
    $propertyType = strtolower(trim($propertyType));

    if ($propertyType == 'homeowner') {

        if ($income > 250000) {
            $result['message'] = 'Not eligible. Homeowner income exceeds $250,000.';
            return $result;
        }

        $result['eligible'] = true;

        if ($income <= 150000) {
            $result['benefit'] = 1500;
        } else {
            $result['benefit'] = 1000;
        }

        $result['message'] = 'Eligible for ANCHOR Benefit.';
    }

    elseif ($propertyType == 'renter') {

        if ($income > 150000) {
            $result['message'] = 'Not eligible. Renter income exceeds $150,000.';
            return $result;
        }

        $result['eligible'] = true;

        if ($age >= 65) {
            $result['benefit'] = 700;
        } else {
            $result['benefit'] = 450;
        }

        $result['message'] = 'Eligible for ANCHOR Benefit.';
    }

    else {
        $result['message'] = 'Invalid property type.';
    }

    return $result;
}

// Example
$result = anchorBenefitEligibility(120000, 'homeowner', 40);

echo "<pre>";
print_r($result);
echo "</pre>";

?>
