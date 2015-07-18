<?php
namespace App\Repositories;

use App\Customer;

class CustomerRepository
{
    public function getCustomersWithUpcomingBirthday($limit = 6)
    {
        return [];
        $customers = Customer::hasBirthday()
            ->get()
            ->filter([$this, 'filterByUpcomingBirthdayWithinMonth'])
            ->sort([$this, 'compareByUpcomingBirthday']);

        return $customers->slice(0, $limit);
    }

    public function filterByUpcomingBirthdayWithinMonth($customer)
    {
        if (in_array($customer->birthday, ['0000-00-00', '1970-01-01'])) {
            return false;
        }

        return $customer->upcomingBirthday->diffInDays() <= 30;
    }

    public function compareByUpcomingBirthday($customer1, $customer2)
    {
        return $customer1->upcomingBirthday->gte($customer2->upcomingBirthday);
    }
}