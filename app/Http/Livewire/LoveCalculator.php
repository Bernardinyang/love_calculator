<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoveCalculator extends Component
{
    public string $her_name = "";
    public string $his_name = "";
    public int $score = 0;
    private string $love = "love";

    public function render()
    {
        return view('livewire.love-calculator');
    }

    private static function findSum(int $no)
    {
        $sum = 0;
        while ($no > 0) {
            $sum += $no % 10;
            $no /= 10;
        }
        return $sum;
    }

    public function calculate()
    {
        $firstSum = 0;
        $secondSum = 0;
        $loveSum = 0;
        $totalSum = 0;
        $his_name = strtolower($this->his_name);
        $her_name = strtolower($this->her_name);

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

        $this->score = $totalSum * 100 / $loveSum;
    }
}
