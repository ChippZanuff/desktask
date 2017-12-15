<?php

namespace App;


class DeskItemPresenter
{
    /**
     * @var DeskItem
     */
    private $item;
    /**
     * @var User
     */
    private $user;

    public function __construct(DeskItem $item, User $user)
    {
        $this->item = $item;
        $this->user = $user;
    }

    public function links()
    {
        dd($this->item->links());
        return $this->item->links();
    }

    private function getAdminId()
    {
        return config('app.isAdmin');
    }

    public function isAdmin()
    {
        return $this->user && $this->user->id == $this->getAdminId();
    }

    public function isOwner()
    {
        return $this->user && $this->item->user_id == $this->user->id;
    }

    public function getDescription()
    {
        return $this->item->description;
    }

    public function getTitle()
    {
        return $this->item->title;
    }

    public function getImagePath()
    {
        return $this->item->image_path;
    }

    public function getId()
    {
        return $this->item->id;
    }

    public function getQueueOrder()
    {
        return $this->item->queue_order;
    }
}