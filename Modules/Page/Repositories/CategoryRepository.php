<?php

namespace Modules\Page\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Core\Repositories\BaseRepository;

interface CategoryRepository extends BaseRepository
{
    public function getListCategory();
    public function findCategory($notId);
    public function getAllCategory();
    public function findBySlug($slug);
    public function findBySlugInLocale($slug, $locale);
}
