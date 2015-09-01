<?php namespace App\Http\Controllers;

use App\CustomerGroup;

class CustomerGroupController extends Controller
{
    protected $group;

    function __construct(CustomerGroup $group)
    {
        $this->group = $group;
    }

    public function editGroup($groupId)
    {
        $group = CustomerGroup::findOrFail($groupId);

        return view('customer-group.edit')
            ->with('group', $group);
    }

    public function removeGroup($groupId)
    {
        $group = CustomerGroup::findOrFail($groupId);
        $group->delete();

        return \Redirect::to('/customer-groups');
    }

    public function saveGroup($groupId)
    {
        $group = CustomerGroup::findOrFail($groupId);
        $group->fill(\Input::all());
        if (!$group->save()) {
            return \Redirect::route('customer-groups.edit', $groupId)
                ->withErrors($group->getErrors())
                ->withInput();
        }

        return \Redirect::to('/customer-groups');
    }
    
    public function showGroups()
    {
        return view('customer-group/show-groups')
            ->with('body', 'customer-groups');
    }

    public function showGroup()
    {
        return view('customer-group.show');
    }

    public function showMembers($groupId)
    {
        $group = CustomerGroup::findOrFail($groupId);

        return view('customer-group.members')
            ->with('group', $group);
    }

    public function createGroup()
    {
        $group = $this->group->fill(\Input::only('groupname'));
        if (!$group->save()) {
            return \Redirect::route('customer-groups.addForm')
                ->withErrors($group->getErrors())
                ->withInput();
        }

        return \Redirect::to('/customer-groups');
    }

    public function table()
    {
        $operations = [
            '<li><a href="{{route("customer-groups.edit", ["groupId" => $id])}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></li>',
            '<li><a href="{{route("customer-groups.remove", ["groupId" => $id])}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a></li>',
            '<li><a href="{{route("attendance.index", ["groupId" => $id])}}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Attendace</a></li>',
        ];

        $groups = CustomerGroup::select([
                                 'customer_group.id',
                                 'customer_group.groupname',
                             ]);

        return \Datatables::of($groups)
                         ->add_column('operations', '<ul class="operations">' . implode($operations) . '</ul>')
                         ->add_column('show', '{{route("customers.show", ["customerId" => $id])}}')
                         ->remove_column('id')
                         ->make(true);
    }
}