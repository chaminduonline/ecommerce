<?php

namespace App\Repository;

use App\Iface\ItemRepositoryInterface;
use App\Item;

class ItemRepository implements ItemRepositoryInterface
{
    /**
     * findById
     */
    public function findById($id)
    {
        return Item::query()->select('id','category_id','name','base_price','description','thumbnail_url')->find($id);
    }

    public function findAll()
    {
        return Item::query()->get();
    }
}
