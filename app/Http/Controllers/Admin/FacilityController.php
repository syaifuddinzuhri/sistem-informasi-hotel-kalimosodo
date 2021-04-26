<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Repositories\Repository;
use App\Http\Requests\FacilityRequest;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    protected $model;

    public function __construct(Facility $facility)
    {
        $this->model = new Repository($facility);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.facility.index');
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
    public function store(FacilityRequest $request)
    {
        $data = $request->all();
        $this->model->create($data);
        if($request->ajax()){
            \Session::flash('success','Data Fasilitas Berhasil Di Simpan');
            $response = array(
                'status' => 'success',
                'url' => route('admin.facility.index'),
            );
            return $response;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->model->getModel()::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityRequest $request, $id)
    {
        $data = $request->all();
        $this->model->update($data, $id);
        if($request->ajax()){
            \Session::flash('success','Data Fasilitas Berhasil Di Update');
            $response = array(
                'status' => 'success',
                'url' => route('admin.facility.index'),
            );
            return $response;
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
        $this->model->delete($id);
        return redirect()
            ->route('admin.facility.index')
            ->with('success', 'Data Fasilitas Berhasil di Hapus');
    }

    public function facility(){
        $data = $this->model->all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $update = '<a class="btn btn-primary btn-xs modal-edit-facility" href="#" data-toggle="modal" data-target="#exampleModalCenter"
                data-id="'. $data->id .'">Edit</a>
                    <form style="display: inline-block;" method="POST" action=" '.route('facility.destroy', $data->id).'" class="hapus" data-facility="'.$data->name.'">
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