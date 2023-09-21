<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Iface\ItemLinksRepositoryInterface;
use App\Iface\ItemRepositoryInterface;
use App\Iface\ItemVariationRepositoryInterface;

class ItemController extends Controller
{
    private $itemRepositoryInterface;
    private $itemVariationRepositoryInterface;
    private $imageLinksRepositoryInterface;

    /**
     * @param ItemRepositoryInterface $itemRepository
     * @param ItemVariationRepositoryInterface $itemVariationRep
     * @param ItemLinksRepositoryInterface $itemLinksRepository
     */
    public function __construct(ItemRepositoryInterface $itemRepositoryInterface, ItemVariationRepositoryInterface $itemVariationRepositoryInterface, ItemLinksRepositoryInterface $imageLinksRepositoryInterface)
    {
        $this->itemRepositoryInterface = $itemRepositoryInterface;
        $this->itemVariationRepositoryInterface = $itemVariationRepositoryInterface;
        $this->imageLinksRepositoryInterface = $imageLinksRepositoryInterface;
    }

    /**
     * @return ItemRepositoryInterface
     */
    public function view($id)
    {
        $item = $this->itemRepositoryInterface->findById($id);
        $item_attributes = $this->itemVariationRepositoryInterface->getItemVariationByItemId($id);
        $image_links = $this->imageLinksRepositoryInterface->findImagesByItemId($id);
        return response()->json(['item' => $item, 'item_variations' => $item_attributes, 'image_links' => $image_links]);
    }

    /**
     * @param ItemRepositoryInterface
     */
    public function findAll()
    {
        $items = $this->itemRepositoryInterface->findAll();
        return response()->json(['items' => $items]);
    }
}
