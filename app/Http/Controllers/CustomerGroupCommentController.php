<?php namespace App\Http\Controllers;

use App\CustomerGroupComment;

class CustomerGroupCommentController extends Controller
{
    public function addComment($groupId)
    {
        $input = \Input::all();
        $input['group_id'] = $groupId;
        CustomerGroupComment::create($input);

        return \Redirect::route('customer-groups.members', $groupId);
    }
}
 