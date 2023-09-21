<?php

namespace App\Repository;

use App\Iface\ItemLinksRepositoryInterface;
use App\ImageLinks;

class ImageLinksRepository implements ItemLinksRepositoryInterface
{
    public function findImagesByItemId($id)
    {
        return ImageLinks::query()->where(['item_id' => $id])->get();
    }
}
