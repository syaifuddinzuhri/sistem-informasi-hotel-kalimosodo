<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Repositories\Repository;
use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    protected $model;

    public function __construct(Room $room)
    {
        $this->model = new Repository($room);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.room.index');
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
    public function store(RoomRequest $request)
    {
        $payload = $request->all();
        if($request->hasFile('image')){
			$payload['image'] = uploadFoto($request->file('image'), 'image');
        }
        $this->model->create($payload);
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
    public function update(RoomRequest $request, $id)
    {
        $payload = $request->all();
        $room = Room::findOrFail($id);
		if($request->hasFile('image')){
            $payload['image'] = updateFoto($room->image_gudang, 'image', $request->file('image'), 'image');
        }else{
            $payload['image'] = $room->image;
        }
        $room->update($payload);
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

    public function room(){
        $data = $this->model->all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $update = '<a href="#" data-bs-toggle="modal" class="btn-edit-room"
                data-bs-target="#editRoomModal"
                data-id="'. $data->id .'"><span class="badge bg-success">
                <i class="fas fa-edit"></i>
            </span></a>
            <a href="#" data-bs-toggle="modal" class="btn-delete-room"
                data-bs-target="#deleteRoomModal"
                data-id="'. $data->id .'"><span class="badge bg-danger">
                <i class="fas fa-trash"></i>
            </span></a>
                ';
                return $update;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
