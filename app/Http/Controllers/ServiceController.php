<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function show($id)
    {
        return Service::find($id);
    }

    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        return 'ok';
    }

    public function create(Request $request)
    {
        $data       = $request->all();
        self::validation($data)->validated();
        $service    = Service::create($data);
        return $service;
    }

    public function searchName($name)
    {
        return Service::where('name', $name)->first();
    }

    public function searchNameLast($name)
    {
        return Service::where('name',$name)
                        -> orderBy ('updated_at','desc')
                        ->first();
    }

    public function update(Request $request)
    {
        $id         = $request->id;
        $data       = $request->all();
        $service    = Service::find($id);
        $service    = $service->update($data);
        return $service;
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'description'   => 'required'
        ], [
            'name.required'         => 'O campo name é obrigatório',
            'description.required'  => 'O campo description é obrigatório'
        ]);
    }
}
