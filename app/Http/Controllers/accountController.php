<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class accountController extends Controller
{
    public function registration()
    {
        return view('front.account.registration');
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function processRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Register user
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

        return redirect()->route('account.registration')->with('success', 'User registered successfully! Please login.');
    }

public function authenticate(Request $request)
{
    // Step 1: Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Step 2: Find the user manually (for debugging)
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->route('account.login')->with('error', 'No user found with this email.');
    }

    // Step 3: Check password manually
    if (!Hash::check($request->password, $user->password)) {
        return redirect()->route('account.login')->with('error', 'Password is incorrect.');
    }

    // Step 4: Log the user in manually
    Auth::login($user);

    return redirect()->route('account.profile')->with('success', ' You Have Successfully logged In !');
}

////////

    public function profile()
    {
        $user = Auth::user();
        return view('front.account.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(),[
                'name'=>'required|min:3|max:50',
                'email'=>'required|email|unique:users,email,'.$id.',id',
        ]);
        // If validation passes, this code runs
     if($validator->passes()){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->mobile = $request->mobile;
        $user->save();
        return redirect()->back()->with('success', 'User Updated successfully.');
      }else{
       return redirect()->back()
    ->withErrors($validator)
    ->withInput()
    ->with('error', 'Validation failed.');
    }
    }

   ///////// 
    public function logout(Request $request)
{
    // Log out the user
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate CSRF token for security
    $request->session()->regenerateToken();

    // Redirect to login or home page
    return redirect()->route('account.login')->with('success', 'You have been logged out successfully.');
}

public function updateProfilePic(Request $request)
{
    $id = Auth::user()->id;

    $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($validator->passes()) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = $id . '-' . time() . '.' . $ext;

        // Move image to public/profile_pic/
        $image->move(public_path('/profile_pic/'), $imageName);

        // Save to database
        User::where('id', $id)->update(['image' => $imageName]);

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    } else {
        return redirect()->back()->withErrors($validator)->withInput();
    }
}

public function createJob(){
    return view('front.account.job.create');
}      

}