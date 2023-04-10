<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\User2Datatable;

use App\models\BrokerCommission;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(User2Datatable $admin)
    {
        //
        return $admin->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile'=>['required','numeric','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'type' => 'required',

        ]);

//        dd($request);

        $record = User::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'mobile' => $request['mobile'],
        'email' => $request['email'],
        'type' => $request['type'],
        'password' => Hash::make($request['password']),
    ]);



        flash()->success('Create Success');
        return redirect(route('users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $model = User::findOrFail($id);

//        $commission=BrokerCommission::where('user_id', $id);
//dd($commission);
        return view('admin.users.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $records = User::findOrFail($id);
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile'=>['required','numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],

        ]);

        if($request['password'] !==''){
            $request['password'] =Hash::make($request['password']);

            $records->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        }else{
            $records->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
            ]);
        }


        flash()->success('Update Success');
        return redirect(route('users.index'));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id) != null){
             User::find($id)->delete();
        }
       
        flash()->error('Success Deleted');
        return redirect(url('admin/users'));
    }
}
