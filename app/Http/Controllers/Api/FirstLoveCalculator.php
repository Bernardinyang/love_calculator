<?php

namespace App\Http\Controllers\Api;

use JetBrains\PhpStorm\Pure;

class FirstLoveCalculator
{
    public int $score = 0;
    private string $love = "love";

    private function findSum(int $no): int
    {
        $sum = 0;
        while ($no > 0) {
            $sum += $no % 10;
            $no /= 10;
        }
        return $sum;
    }

    #[Pure] public function calculatePercentage(string $his_name, string $her_name): int
    {
        $firstSum = 0;
        $secondSum = 0;
        $loveSum = 0;
        $his_name = strtolower($his_name);
        $her_name = strtolower($her_name);

        for ($i = 0; $i < strlen($his_name); $i++) {
            $firstSum += ord($his_name[$i]);
        }

        for ($i = 0; $i < strlen($her_name); $i++) {
            $secondSum += ord($her_name[$i]);
        }

        for ($i = 0; $i < strlen($this->love); $i++) {
            $loveSum += ord($this->love[$i]);
        }

        $totalSum = $this->findSum($firstSum + $secondSum);
        $loveSum = $this->findSum($loveSum);

        if ($totalSum > $loveSum) {
            $totalSum = $loveSum - ($totalSum - $loveSum);
        }

        return $totalSum * 100 / $loveSum;
    }
}
