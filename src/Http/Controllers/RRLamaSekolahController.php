<?php

namespace Bantenprov\RRLamaSekolah\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\RRLamaSekolah\Facades\RRLamaSekolahFacade;

/* Models */
use Bantenprov\RRLamaSekolah\Models\Bantenprov\RRLamaSekolah\RRLamaSekolah;

/* Etc */
use Validator;

/**
 * The RRLamaSekolahController class.
 *
 * @package Bantenprov\RRLamaSekolah
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RRLamaSekolahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RRLamaSekolah $rr_lama_sekolah)
    {
        $this->rr_lama_sekolah = $rr_lama_sekolah;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->rr_lama_sekolah->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->rr_lama_sekolah->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rr_lama_sekolah = $this->rr_lama_sekolah;

        $response['rr_lama_sekolah'] = $rr_lama_sekolah;
        $response['status'] = true;

        return response()->json($rr_lama_sekolah);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RRLamaSekolah  $rr_lama_sekolah
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rr_lama_sekolah = $this->rr_lama_sekolah;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:rr_lama_sekolahs,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $rr_lama_sekolah->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $rr_lama_sekolah->label = $request->input('label');
                $rr_lama_sekolah->description = $request->input('description');
                $rr_lama_sekolah->save();

                $response['message'] = 'success';
            }
        } else {
            $rr_lama_sekolah->label = $request->input('label');
            $rr_lama_sekolah->description = $request->input('description');
            $rr_lama_sekolah->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rr_lama_sekolah = $this->rr_lama_sekolah->findOrFail($id);

        $response['rr_lama_sekolah'] = $rr_lama_sekolah;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RRLamaSekolah  $rr_lama_sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rr_lama_sekolah = $this->rr_lama_sekolah->findOrFail($id);

        $response['rr_lama_sekolah'] = $rr_lama_sekolah;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RRLamaSekolah  $rr_lama_sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rr_lama_sekolah = $this->rr_lama_sekolah->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:rr_lama_sekolahs,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $rr_lama_sekolah->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $rr_lama_sekolah->label = $request->input('label');
                $rr_lama_sekolah->description = $request->input('description');
                $rr_lama_sekolah->save();

                $response['message'] = 'success';
            }
        } else {
            $rr_lama_sekolah->label = $request->input('label');
            $rr_lama_sekolah->description = $request->input('description');
            $rr_lama_sekolah->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RRLamaSekolah  $rr_lama_sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rr_lama_sekolah = $this->rr_lama_sekolah->findOrFail($id);

        if ($rr_lama_sekolah->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
