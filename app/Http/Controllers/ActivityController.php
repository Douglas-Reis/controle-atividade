<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateActivityRequest;

class ActivityController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Activity $activity)
    {
        $this->request = $request;
        $this->repository = $activity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::paginate(30);

        return view('admin.pages.activities.index',[
            'activities' => $activities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateActivityRequest $request)
    {
        $data = $request->only('name', 'description');

        $this->repository->create($data);

        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$activity = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.activities.show',[
            'activity' => $activity
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$activity = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateActivityRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateActivityRequest $request, $id)
    {
        if (!$activity = $this->repository->find($id))
            return redirect()->back();

        $activity->update($request->all());
        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = $this->repository->where('id', $id)->first();
        if (!$activity)
            return redirect()->back();

        $activity->delete();

        return redirect()->route('activities.index');
    }
    /**
     * Search activities
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $activities = $this->repository->search($request->filter);

        return view('admin.pages.activities.index', [
            'activities' => $activities,
            'filters' => $filters,
        ]);
    }
}
