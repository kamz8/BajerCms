<?php

namespace App\Http\Controllers\Admin;
use App\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use App\Providers\AuthServiceProvider;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.show')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();

        return $roles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if ($request->ajax()){
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|between:6,20',
                'password_confirmation' => 'required|same:password',
                'roles' => 'required'

            ]);

            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ), 400); // 400 being the HTTP code for an invalid request.
            }else{
                $user = User::create($request->all());
                $user->roles()->attach($request->roles);
                return Response::json($user, 200);
            }
        }
        return \response("Nie masz dostępu do tego zasobu", 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()){
            return User::with('roles')->find($id);
        }
        else return \response("Nie masz dostępu do tego zasobu", 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $rolesIds = new Collection();
        $user->roles->map(function ($value) use ($rolesIds){
            $rolesIds->push($value['id']);
        });
        return Response::json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $rolesIds
        ]);
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
        $user = User::with('roles')->findOrFail($id);
        if ($request->ajax()){

            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5',
                'email'=>'required|email|unique:users,email,'.$id,
                'password' => 'between:6,20',
                'password_confirmation' => 'same:password',
                'roles' => 'required'
            ]);
            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                ), 400); // 400 being the HTTP code for an invalid request.
            }else{
                if(!empty($request->password)){
                    $user->setPasswordAttribute($request->passwort);
                    $user->update($request->except('password'));
                }
                else{
                    $user->update($request->all());
                    $user->roles()->sync($request->roles);
                    $updatedUser = $user->fresh(['roles']);
                }
                return Response::json($updatedUser->jsonSerialize(), 200);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // prevent delete self-deleting or super admin
        if(Auth::user()->id != $user->id || Auth::user()->id === 1){
            return response([
                'status'=> 'success',
                'message'=> 'Użytkownik został usunęty!',
                'user' => $user
            ]);
        }else return response(['status'=>'warning','message'=>'Nie możesz usunąć samego siebie!'],400);

    }
}
