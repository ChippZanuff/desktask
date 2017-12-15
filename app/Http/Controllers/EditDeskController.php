<?php

namespace App\Http\Controllers;

use App\DeskItem;
use App\DeskItemPresenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EditDeskController extends Controller
{
    public function index(Request $request)
    {
        $itemId = $request->input('item_id');
        $deskItem = DeskItem::find($itemId);
        $presenter = new DeskItemPresenter($deskItem, $request->user());

        return view('desk.editDeskItem', ['deskItem' => $presenter]);
    }

    public function editDeskItem(Request $request)
    {


        return redirect('/desk');
    }
}
