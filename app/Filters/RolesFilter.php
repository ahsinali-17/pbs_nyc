<?php

namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class RolesFilter implements FilterInterface
{
    public function transform($item)
    {
        if (isset($item['level']) && auth()->user() && auth()->user()->level() >= $item['level']) {
            return $item;
        }

        return false;
    }
}
