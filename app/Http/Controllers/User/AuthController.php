<?php

namespace App\Http\Controllers\user;


use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Suburb;
use App\Models\Payment;
use App\Mail\WelcomMail;
use App\Models\Dependent;
use Illuminate\Http\Request;
use App\Models\SecurityQuestions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view(
            'user.account',
            [
                'roles'             => Role::all(),
                'securityQuestions' => SecurityQuestions::all(),
                'cities'            => City::all(),
                'suburbs'           => Suburb::all()
            ]
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'idNo' => 'required|min:13',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:16',
            'security_question_id' => 'required|string|max:6',
            'security_answer' => 'required|string|max:255',
        ]);
        $user = User::create($validatedData);

        $user->main_members()->create([
            'name' => $request->name,
            'email' => $request->email,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'idNo' => $request->idNo,
        ]);

        $data = ['fullName' => $request->input('name') . ' ' . $request->input('surname'), 'email' => $request->input('email')];

        Mail::to($request->input('email'))->send(new WelcomMail($request));

        return redirect()->route('registration.success', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        return view(
            'user.user_profile',
            [
                'dependents' => Dependent::where('main_member_id', $user_id)->get(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
            'user.profile_edit',
            [
                'roles' => Role::all(),
                'user' => User::find($id)

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phone' => 'required|numeric|min:10',
            'idNo' => 'required|min:13',
            'gender' => 'required',
        ]);
        $user = User::find($id);

        $user->main_members()->update([
            'name' => $request->name,
            'email' => $request->email,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'idNo' => $request->idNo,
            'phone' => $request->phone,
            'addressLine1' => $request->addressLine1,
            'addressLine2' => $request->addressLine2,
            'med_aid_number' => $request->med_aid_number,
            'med_aid_YN' => $request->med_aid_YN,
            'med_aid_plan_id' => $request->med_aid_plan_id,
            'suburb_id' => $request->suburb_id,
        ]);

        //$user->update($request->except(['_token', 'roles']));

        $request->session()->flash('success', 'Your profile was updated successfully!');

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', 'You have deleted the user');
        return redirect(route('admin.users.index'));
    }
}
