<?php

class AttendanceControllerTest extends TestCase
{
    private $user;
    private $group;
    private $customers = [];
    private $attendance = [];

    public function setUp()
    {
        parent::setUp();

        $this->user = \App\User::create([
            'name' => 'vi@mailtrap.io',
            'email' => 'vi@mailtrap.io',
            'password' => 'test',
        ]);

        $this->group = \App\CustomerGroup::create(['groupname' => 'Group 1']);

        $customer = \App\Customer::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '01234567891',
            'group_id' => $this->group->id,
            'email' => 'jd@mailtrap.io',
            'birthday' => '1990-01-01',
        ]);
        $this->customers[] = $customer;

        $customer = \App\Customer::create([
            'firstname' => 'John',
            'lastname' => 'Resig',
            'phone' => '01234567891',
            'group_id' => $this->group->id,
            'email' => 'jr@mailtrap.io',
            'birthday' => '1990-01-01',
        ]);
        $this->customers[] = $customer;

        $customer = \App\Customer::create([
            'firstname' => 'Taylor',
            'lastname' => 'Otwell',
            'phone' => '01234567891',
            'group_id' => $this->group->id,
            'email' => 'to@mailtrap.io',
            'birthday' => '1990-01-01',
        ]);
        $this->customers[] = $customer;

        foreach ($this->customers as $customer) {
            $customer->save();
        }

        $this->attendance[] = \App\Attendance::create([
            'group_id' => $this->group->id,
            'customer_id' => $this->customers[0]->id,
            'was_at' => new Carbon\Carbon('2015-01-01')
        ]);

        $this->attendance[] = \App\Attendance::create([
            'group_id' => $this->group->id,
            'customer_id' => $this->customers[1]->id,
            'was_at' => new Carbon\Carbon('2015-01-01')
        ]);

        $this->attendance[] = \App\Attendance::create([
            'group_id' => $this->group->id,
            'customer_id' => $this->customers[2]->id,
            'was_at' => new Carbon\Carbon('2015-01-01')
        ]);
    }

    public function tearDown()
    {
        DB::table('attendance')->delete();
        DB::table('customer')->delete();
        DB::table('lesson')->delete();
        DB::table('customer_group')->delete();
        DB::table('users')->delete();
        parent::tearDown();
    }


    public function testIndex()
    {
        $response = $this->call('GET', route('attendance.index', [$this->group->id]));
        $this->assertRedirectedTo('/auth/login');

        $this->be($this->user);
        $response = $this->call('GET', route('attendance.index', [$this->group->id]));
        $this->assertEquals(count($this->attendance), count($response->original['attendance']));
    }

    public function testCreate()
    {
        $response = $this->call('GET', route('attendance.create', [$this->group->id]));
        $this->assertRedirectedTo('/auth/login');

        $this->be($this->user);
        $response = $this->call('GET', route('attendance.create', [$this->group->id]));
        $view = $response->original;
        $this->assertEquals(count($this->customers), count($view['customers']));
    }

    public function testStore()
    {
        Session::start();

        $date = '2015-01-01';
        $time = '20:00';
        $payload = [
            'date' => $date,
            'time' => $time,
            'customers' => [
                $this->customers[0]->id,
                $this->customers[1]->id,
            ],
            '_token' => csrf_token(),
        ];
        $response = $this->call('POST', route('attendance.store', [$this->group->id]), $payload);
        $this->assertRedirectedTo('/auth/login');

        $this->be($this->user);
        $response = $this->call('POST', route('attendance.store', [$this->group->id]), $payload);
        $this->assertRedirectedTo(route('attendance.index', [$this->group->id]));

        $this->assertSessionHas('status');

        $attendance = \App\Attendance::where('group_id', $this->group->id)
            ->where('was_at', sprintf('%s %s', $date, $time))->get();
        $this->assertEquals(2, count($attendance));
    }

}
