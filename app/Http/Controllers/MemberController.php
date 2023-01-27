<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    public function index(){
        return view('welcome')->with('members', Member::latest()->get());
    }

    public function create(Request $request){
        $member = new Member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_type = $request->membershiptype;
        $member->membership_expiration = $request->membershipexpiration;
        $member->save();

        return redirect()->route('welcome')->with('success','New member added!');
    }

    public function delete($id){
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('welcome', $member->id)->with('success','Member deleted!');
    }

    public function update($id){
        $member = Member::find($id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_type = $request->membershiptype;
        $member->membership_expiration = $request->membershipexpiration;
        $member->save();
    }

   
}