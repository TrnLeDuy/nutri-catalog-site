<?php

namespace Modules\Page\Repositories\Cache;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Page\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'page.categories';
        $this->repository = $category;
    }

    public function findCategory($notId)
    {
        $this->clearCache();

        return $this->repository->findCategory($notId);
    }
    
    public function getListCategory()
    {
        $this->clearCache();
        return $this->repository->getListCategory();
    }

    public function getAllCategory()
    {
        $this->clearCache();
        return $this->repository->getAllCategory();
    }

    public function findBySlugInLocale($slug, $locale)
    {
        $key = $this->getBaseKey() . "findBySlugInLocale.{$slug}-{$locale}";
        return $this->remember(function () use ($slug, $locale) {
            return $this->repository->findBySlugInLocale($slug, $locale);
        }, $key);
    }

    public function findBySlug($slug)
    {
        $key = $this->getBaseKey() . "findBySlug.{$slug}";
        return $this->remember(function () use ($slug) {
            return $this->repository->findBySlug($slug);
        }, $key);
    }
}
