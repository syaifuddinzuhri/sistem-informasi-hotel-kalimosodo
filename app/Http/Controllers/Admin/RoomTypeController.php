<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Repositories\Repository;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    protected $model;

    public function __construct(RoomType $room_type)
    {
        $this->model = new Repository($room_type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.room-type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $data = $request->all();
        $this->model->create($data);
        return response()->json(['success' => true], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model->getModel()::findOrFail($id);
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->getModel()::findOrFail($id);
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, $id)
    {
        $data = $request->all();
        $this->model->update($data, $id);
        return response()->json(['success' => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json(['success' => true], 200);
    }

    public function room_type(){
        $data = $this->model->all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $update = '<a class="btn btn-primary btn-xs modal-edit-room-type" href="#" data-toggle="modal" data-target="#exampleModalCenter"
                data-id="'. $data->id .'">Edit</a>
                    <form style="display: inline-block;" method="POST" action=" '.route('room-type.destroy', $data->id).'" class="hapus" data-room-type="'.$data->name.'">
                    '. method_field('delete'). '
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <a href="#" class="btn btn-danger btn-xs">Hapus</a>                   
                </form>
                ';
                return $update;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
