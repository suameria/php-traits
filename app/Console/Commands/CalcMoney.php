<?php

namespace App\Console\Commands;

use App\Traits\MoneyTrait;
use Illuminate\Console\Command;

class CalcMoney extends Command
{
    use MoneyTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calc-money {income} {working_days} {working_hours}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $income = $this->argument('income');
        $working_days = $this->argument('working_days');
        $working_hours = $this->argument('working_hours');

        // 月給から年収を出力
        $yearly_income = $this->calcIncomeFromMonthlyToYearly($income);
        $message = '年収: ' . number_format($yearly_income) . '円';
        $this->info($message);

        // 月給から日給を出力
        $daily_income = $this->calcIncomeFromMonthlyToDaily($income, $working_days);
        $message = '日給: ' . number_format($daily_income) . '円';
        $this->info($message);

        // 月給から時給を出力
        $hourly_income = $this->calcIncomeFromMonthlyToHourly($income, $working_days, $working_hours);
        $message = '時給: ' . number_format($hourly_income) . '円';
        $this->info($message);
    }
}
