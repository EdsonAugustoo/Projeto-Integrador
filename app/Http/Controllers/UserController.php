<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }
    public function searchName($name)
    {
        return User::where('name', $name)->first();
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data   = $request->all();
        self::validation($data)->validated();
        $user    = User::create($data);
        return $user;
    }

    public function update(Request $request)
    {
        $id             = $request->id;
        $data           = $request->all();
        $user     = User::find($id);
        $user     = $user->update($data);

        return $user;
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'description'   => 'required',
            'user-id'       => 'required',
            'active'        => 'requerid'
        ], [
            'name.required'         => 'O campo name é obrigatório',
            'description.required'  => 'O campo description é obrigatório',
            'user_id.required'      => 'o campo user_id é obrigatorio',
            'active.required'       => 'o campo active é obrigatorio'
        ]);
    }
}

