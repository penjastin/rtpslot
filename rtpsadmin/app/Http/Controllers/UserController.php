<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Sitelist;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        
        $users = User::all();
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->site_permission !== '1') {
            // Redirect or show an error message for unauthorized access
            abort(403);
        }
        $sites = SiteList::all();
        return view('users_create',compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'site_permission' => 'required',
        ]);

        // Create a new user instance
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->site_permission = $validatedData['site_permission'];
        $user->save();

        // Redirect to a success page or perform any additional actions

        return redirect()->back()->with('success', 'User added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('users_show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id === 'profile') {
            $id = auth()->user()->id;
        } else {
            $user = User::find($id);

            if (!$user) {
                // Handle user not found
            }

            // Check if the authenticated user has the appropriate permission
            if (auth()->user()->site_permission != 1 && auth()->user()->id != $user->id) {
                abort(403, 'Unauthorized');
            }
        }

        $sites = Sitelist::orderBy('id')->get();

        return view('users_edit', compact('user', 'sites'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        if ($user === 'profile') {
            $user = auth()->user();
        } else {
            $user = User::find($user);
        }

        // Check if the authenticated user has the appropriate permission
        if (auth()->user()->site_permission != 1 && auth()->user()->id != $user->id) {
            abort(403, 'Unauthorized');
        }

        $validator = \Validator::make($request->all(), [
            'name' => ['string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'active' => ['required', 'in:0,1'],
            'site_permission' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->active = $request->input('active');
        if (auth()->user()->site_permission == 1) {
            // Get the corresponding SiteList record based on site_permission value
            $sitePermission = $request->input('site_permission');
            $site = Sitelist::findOrFail($sitePermission);
    
            // Update the user's site_permission
            $user->site_permission = $sitePermission;
        }
        
        if (!empty($request->input('password'))) {
            $user->password = \Hash::make($request->input('password'));
        }

        $user->save();

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Profile updated successfully');
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (auth()->user()->site_permission !== '1') {
            // Redirect or show an error message for unauthorized access
            abort(403);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
