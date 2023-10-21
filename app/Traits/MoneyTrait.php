<?php

namespace App\Traits;

trait MoneyTrait
{
     public function calcIncomeFromMonthlyToYearly(int $monthly_income): int
     {
        return $monthly_income * 12;
     }

     public function calcIncomeFromMonthlyToDaily(int $monthly_income, int $working_days): int
     {
        return $monthly_income / $working_days;
     }

     public function calcIncomeFromMonthlyToHourly(int $monthly_income, int $working_days, int $working_hours): int
     {
        return $monthly_income / $working_days / $working_hours;
     }
}