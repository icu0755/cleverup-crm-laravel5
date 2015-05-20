<?php
namespace App\Http\ViewComposers;

use App\Repositories\CustomerRepository;
use Illuminate\View\View;

class WidgetBirthdayComposer implements ComposerInterface
{
    protected $customers;

    function __construct(CustomerRepository $customers)
    {
        $this->customers = $customers;
    }


    public function compose(View $view)
    {
        $customers = $this->customers->getCustomersWithUpcomingBirthday();
        $view->withCustomers($customers);
    }
}