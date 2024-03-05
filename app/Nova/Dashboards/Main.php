<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\OrdersRevenue;
use App\Nova\Metrics\OrdersRevenueNotPaid;
use App\Nova\Metrics\TotalOrders;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */

    public function label()
    {
        return 'Dashboard';
    }

    public function cards()
    {
        return [
            (new OrdersRevenue())->width('1/3'),
            (new OrdersRevenueNotPaid())->width('1/3'),
            (new TotalOrders())->width('1/3'),
        ];
    }
}
