<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\DataTables\AdvertisementDataTable;
use App\DataTables\ApprovedAdvertisementDataTable;
use App\DataTables\DisapprovedAdvertisementDataTable;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdvertisementDataTable $dataTable)
    {
        return $dataTable->render('dashboard.advertisement.index');
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
    public function store(Request $request)
    {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertisement::destroy([$id]);
        return redirect()->back()->with('success', 'record was deleted successfully');
    }
    public function approve($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->approved = true;
        $advertisement->disapproved = false;
        $advertisement->approved_at = now();
        if ($advertisement->save()) {
            return back()->with('success', 'approved successfully');
        }
        return back()->with('error', 'something went wrong');
    }

    public function disapprove($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->approved = false;
        $advertisement->disapproved = true;
        $advertisement->disapproved_at = now();
        if ($advertisement->save()) {
            return back()->with('success', 'disapproved successfully');
        }
        return back()->with('error', 'something went wrong');
    }
}