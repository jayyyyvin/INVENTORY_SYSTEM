<?php
 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
 
class AuthController extends Controller
{ 
    public function index(): View
    {
        //
        $user = User::latest()->paginate(5);
        
        return view('userlist',compact('user'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy(User $user): RedirectResponse
    {
        //
        $user->delete();
         
        return redirect()->route('userlist')
                        ->with('success','User deleted successfully');
    }
 


    public function forgotpass()
    {
        $user = User::all();
   
        return view('forgotpass',compact('user'));
       
    }

    public function newpassword(Request $request)
    {
    
        $newPassword = $request->input('newpassword');
        $newHashedPassword = bcrypt($newPassword);
        
        // Update the hashed password in the database
        $user = User::where('email', $request->input('email'))->first();
        $user->password = $newHashedPassword;
        $user->save();
            
    
            return redirect()->route('forgotpass')
                            ->with('success','Password Updated successfully!');
        }
    
   

    public function register(Request $request)
    {
        return view('register');
       
       
    }

   
 
    public function registerPost(Request $request)
    {
       
        try { 
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'role_name' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
         

              

               // Check if a profile image is provided
        if ($request->hasFile('profile_image')) {
            $profilepath = $request->file('profile_image')->store('profile_images', 'public');
            $data['profile_image'] = $profilepath;
        }

        $regpost = User::create($data);
        
                return back()->with('success', 'User added successfully');
            }
            
        catch (\Illuminate\Database\QueryException $e) 
            {
                // Catch the exception for duplicate entry error
                $errorCode = $e->errorInfo[1];

                if ($errorCode == 1062) {
                    // Handle duplicate entry error, for example, redirect back with an error message
                    return redirect()->back()->with('error', 'Duplicate entry for email.');
                }

                return redirect()->back()->with('error', 'An error occurred during registration.');
            }
    }
   








    public function login()
    {
        return view('login');
    }
 
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

    
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Success');
        }

     
        return back()->with('error', 'Error Email or Password');
    }


 
    public function logout()
    {
        Auth::logout();
        return view('/welcome');
        // return redirect('/welcome')->route('/welcome');
    }



  

    public function edit(): View
    {
        //
        $user = Auth::user();
        return view('editprofile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $testimonial): RedirectResponse
    // {
    //     try {
    //         $data = $request->validate([
    //             'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //             'content' => 'required',
    //             'author' => 'required',
    //             'job_title' => 'required',
    //         ]);
    
    //         if ($request->hasFile('profile_img')) {
    //             $profilePath = $request->file('profile_img')->store('testimonialprofile', 'public');
    //             $data['profile_img'] = $profilePath;
    //         }
    
    //         $testimonial->update($data);
    
    //         return redirect()->route('updatetestimonial', ['testimonial' => $testimonial])
    //                         ->with('success','Testimonial updated successfully.');
    //     } 
    //     catch (\Illuminate\Database\QueryException $e) {
    //         // Handle database query exceptions if needed
    //         return redirect()->back()->with('error', 'An error occurred during testimonial update.');
    //     }
    // }

    public function update(Request $request, User $user): RedirectResponse
    {
        try{
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


    // Check if a profile image is provided
    if ($request->hasFile('profile_image')) {
        $imagepath = $request->file('profile_image')->store('profile_images','public');
        $data['profile_image'] = $imagepath;
       
    }

    
    $user->update($data);


    return back()->with('success', 'Profile updated successfully');
}
    catch (\Illuminate\Database\QueryException $e) 
    {
        // Catch the exception for duplicate entry error
        $errorCode = $e->errorInfo[1];

        if ($errorCode == 1062) {
            // Handle duplicate entry error, for example, redirect back with an error message
            return redirect()->back()->with('error', 'Duplicate entry for email.');
        }

        return redirect()->back()->with('error', 'An error occurred during registration.');
    }
      
     }





     public function changepass():View
     {
        $user = Auth::user();
        return view('/changepassword',compact('user'));
     }





     public function changepassword(Request $request): RedirectResponse
     {
        $user = Auth::user();

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required', // You can adjust the validation rules as needed
            'confirmpass' => 'required',
        ]);

         // Check if the old password matches the current password
        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Old password does not match.');
        }

         // Check if the new password and confirm password match
         if ($request->newpassword !== $request->confirmpass) {
            return redirect()->back()->with('error', 'New password and confirm password do not match.');
        }

         // Update the user's password
         $user->password = Hash::make($request->newpassword);
         $user->update();
 
         return redirect()->back()->with('success', 'Password updated successfully.');

     }
}