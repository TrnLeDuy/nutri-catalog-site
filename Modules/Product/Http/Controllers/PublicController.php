<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\CategoryRepository;
use Modules\Customer\Repositories\CustomerRepository;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PublicController extends BasePublicController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;
    private $categoryRepository;
    private $customerRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getProductByCategory(Request $request, $slug)
    {
        $category = $this->categoryRepository->findBySlugInLocale($slug, app()->getLocale());
        if ($category && $category->status == true) {
            $s = $request->s;
            $products = $this->productRepository->getProductByCategory($category->id, $s);
            
            // Generate localized URLs for each supported locale
            $localizedUrls = [];
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $translatedCategory = $category->translate($localeCode);
                if ($translatedCategory) {
                    $params = ['s' => $s];
                    $localizedUrls[$localeCode] = '/' . $localeCode . '/' . 
                        trans('product::products.router.product', [], $localeCode) . '/' .
                        trans('product::products.router.category', [], $localeCode) . '/' .
                        $translatedCategory->slug .
                        ($s ? '?' . http_build_query(array_filter($params)) : '');
                }
            }
            
            $page = (object) [
                'title' => trans('product::products.title.products'),
                'subtitle' => $category->title,
                'meta_title' => trans('product::products.title.products'),
                'meta_description' => trans('product::products.title.products')
            ];
            
            return view('page.product', compact('category', 'products', 's', 'page', 'localizedUrls'));
        } else {
            abort(404);
        }
    }

    public function detail($slug, Request $request)
    {
        $product = $this->productRepository->findBySlugInLocale($slug, app()->getLocale());
        if ($product && $product->status == true) {
            $category = $this->categoryRepository->findByAttributes(['id' => $product->category_id]);
            $product_seen = session('product_seen');
            $productImage = $product->getAvatar();
            $productSlideImages = $product->getImages();
            if (is_array($product_seen)) {
                if (!in_array($product->id, $product_seen)) {
                    session()->push('product_seen', $product->id);
                }
            } else {
                session()->forget('product_seen');
                session()->push('product_seen', $product->id);
            }
            $productRelated = $this->productRepository->getProductRelated($category->id, $product->id);
            
            // Add localized URLs for each supported locale
            $localizedUrls = [];
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $translatedProduct = $product->translate($localeCode);
                if ($translatedProduct) {
                    $localizedUrls[$localeCode] = '/' . $localeCode . '/' . 
                        trans('product::products.router.product', [], $localeCode) . '/' . 
                        $translatedProduct->slug;
                }
            }
            
            return view('products.detail', compact('product', 'category', 'productRelated', 'productImage', 'productSlideImages', 'localizedUrls'));
        } else {
            abort(404);
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword != "" && $keyword != false) {
            $s = $request->s;
            $cid = $request->cid;
            
            // Generate localized URLs for each supported locale
            $localizedUrls = [];
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $params = [
                    'keyword' => $keyword,
                    'cid' => $cid,
                    's' => $s
                ];
                
                $localizedUrls[$localeCode] = '/' . $localeCode . '/' . 
                    trans('product::products.router.product', [], $localeCode) . '/' .
                    trans('product::products.router.search', [], $localeCode) . 
                    '?' . http_build_query(array_filter($params));
            }
            
            $products = $this->productRepository->getProductByKeyword($keyword, $s, $cid, app()->getLocale());
            $page = (object) [
                'title' => trans('product::products.title.products'),
                'meta_title' => trans('product::products.title.products'),
                'meta_description' => trans('product::products.title.products')
            ];
            
            return view('page.product', compact('products', 'keyword', 's', 'localizedUrls', 'page'));
        } else {
            return back();
        }
    }
}
