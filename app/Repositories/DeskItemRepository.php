<?php

namespace App\Repositories;


use App\DeskItem;
use App\DeskItemPresenter;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeskItemRepository
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getDeskList(Request $request)
    {
        $deskItems = DeskItem::orderBy('queue_order')->paginate(10);
        $presenter = $deskItems->map(function (DeskItem $item) use (&$request){
            return new DeskItemPresenter($item, $request->user());
        })->all();
        $deskLinks = $deskItems->links();
        $arr['deskItems'] = $presenter;
        $arr['links'] = $deskLinks;

        return $arr;
    }

    public function createDeskItem(Request $request)
    {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $imageUrl = url('storage/images/' . $imageName);
        $isSaved = $request->image->move(public_path('storage/images/'), $imageName);

        if($isSaved) {
            $userId = Auth::user()->getAuthIdentifier();
            DeskItem::create([
                'user_id' => $userId,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image_path' => $imageUrl,
                'queue_order' => $request->input('queue_order'),
            ]);
        }
    }

    public function deleteDeskItem(Request $request)
    {
        $itemId = $request->input('item_id');
        $deletedItem = DeskItem::find($itemId);
        $image = $deletedItem->image_path;

        preg_match('/images\/(.*)/i', $image, $match);
        $image = $match[0];

        $deletedItem->delete();
        if($deletedItem)
        {
            Storage::disk('public')->delete($image);
        }
    }

    public function editDeskItem(Request $request)
    {
        $userId = $request->input('item_id');
        $deskItem = DeskItem::find($userId);

        if($request->image !== null){
            $imageName = $deskItem->image_path;
            preg_match('/images\/(.*)/i', $imageName, $match);
            $imageName = $match[0];

            Storage::disk('public')->delete($imageName);

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $imageUrl = url('storage/images/' . $imageName);
            $request->image->move(public_path('storage/images/'), $imageName);
            $deskItem->image_path = $imageUrl;
        }
        $title = $request->input('title');
        $description = $request->input('description');
        $queueOrder = $request->input('queue_order');

        $deskItem->title = $title;
        $deskItem->description = $description;
        $deskItem->queue_order = $queueOrder;
        $deskItem->save();
    }
}