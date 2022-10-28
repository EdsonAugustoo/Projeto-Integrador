<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    public function index()
    {
        return Publication::all();
    }

    public function show($id)
    {
        return Publication::find($id);
    }

    public function getByUser($user_id)
    {
    return Publication:: where('user-id', $user_id)
                        ->orderby('name','asc')
                        ->get();
    }

    public function delete($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data   = $request->all();
        self::validation($data)->validated();
        $publication   = Publication::create($data);
        return $publication;
    }

    public function update(Request $request)
    {
        $id             = $request->id;
        $data           = $request->all();
        $publication    = Publication::find($id);
        $publication    = $publication->update($data);

        return $publication;
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
