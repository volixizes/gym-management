<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\Member;

class MemberController extends Controller
{
    public function create(Request $request){
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_type = $request->membershiptype;
        $member->membership_expiration = $request->membershipexpiration;
        $member->save();

        return redirect()->route('welcome')->with('success','New member added!');
    }
}
