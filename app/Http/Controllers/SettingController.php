<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Biodata;
use Laratrust\LaratrustFacade as Laratrust;

class SettingController extends Controller
{
    //hanya untuk yang sudah login
    public function __construct()
	{
		$this->middleware('auth');
	}

	//form edit password -> user
	public function editPassword(Request $request)
    {	
        //memastikan hanya peserta yang aktif hanya bisa mengubah passwordnya
        $user = $request->user()->biodata()->get()->toArray();

        if(empty($user) && Laratrust::hasRole('peserta')){
            Auth::logout();
            return redirect('/');
        }
        
    	return view('setting.edit-password');
    }

    //form edit password -> admin
    public function editPasswordAdmin()
    {	
    	return view('setting.edit-password-admin');
    }

    //update password -> user
    public function updatePassword(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,//membuat custom validasi passcheck
    		'new_password' => 'required|confirmed|min:6',
    	],
    	[
    		'password.passcheck' => 'Password lama tidak sesuai',//menyesuaikan pesan error passcheck
    	]);

    	$user->password = bcrypt($request->get('new_password'));
    	$user->save();
    	return redirect()->route('kategori.index');
    }

    //update password ->admin
    public function updatePasswordAdmin(Request $request)
    {
    	$user = Auth::user();
    	$this->validate($request,[
    		'password' => 'required|passcheck:'.$user->password,//membuat custom validasi passcheck
    		'new_password' => 'required|confirmed|min:6',//menyesuaikan pesan error passcheck
    	],
    	[
    		'password.passcheck' => 'Password lama tidak sesuai',
    	]);

    	$user->password = bcrypt($request->get('new_password'));
    	$user->save();

    	Session::flash('flash_message','Password berhasil diubah.');
    	return redirect('/admin');
    }
}
