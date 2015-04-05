<?php namespace App\Http\Controllers;

use App\CustomerComment;

class CustomerCommentController extends Controller
{
    public function addComment($customerId)
    {
        $input = \Input::only('comment');
        $comment = CustomerComment::create($input);
        $comment->customer_id = $customerId;
        $comment->save();

        return \Redirect::to("/customers/show/{$customerId}");
    }
} 