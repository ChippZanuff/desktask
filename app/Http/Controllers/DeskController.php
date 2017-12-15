<?php

namespace App\Http\Controllers;

use App\Repositories\DeskItemRepository;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index(Request $request)
    {
        $repository = new DeskItemRepository($request->user());
        $result = $repository->getDeskList($request);

        return view('desk.desk', ['deskItems' => $result['deskItems'], 'links' => $result['links']]);
    }

    public function createDeskItem(Request $request)
    {
        $repository = new DeskItemRepository($request->user());
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $repository->createDeskItem($request);

        return redirect('/desk');
    }

    public function deleteDeskItem(Request $request)
    {
        $repository = new DeskItemRepository($request->user());
        $repository->deleteDeskItem($request);

        return redirect('/desk');
    }
}
