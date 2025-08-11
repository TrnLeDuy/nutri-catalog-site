<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Menu\Repositories\MenuItemRepository;
use Modules\Page\Entities\Page;
use Modules\Page\Repositories\PageRepository;
use Modules\Page\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PublicController extends BasePublicController
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;

    private $postCategory;

    private $disabledPage = false;

    public function __construct(PageRepository $page, CategoryRepository $postCategory, Application $app)
    {
        parent::__construct();
        $this->page = $page;
        $this->postCategory = $postCategory;
        $this->app = $app;
    }

    /**
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function uri($slug)
    {
        $page = $this->findPageForSlug($slug);

        if ($page && $page->is_home == true) {
            return $this->homepage();
        }

        $this->throw404IfNotFound($page);

        $currentTranslatedPage = $page->getTranslation(locale());
        if ($slug !== $currentTranslatedPage->slug) {
            return redirect()->to($currentTranslatedPage->locale . '/' . $currentTranslatedPage->slug, 301);
        }

        $template = $page->type == "post" ? $this->getTemplateForPost($page) : $this->getTemplateForPage($page);

        if ($template == "page.blogs.blogs") {
            $categories = $this->postCategory->getAllCategory();
            $blogs = getAllBlogs();
            $latestBlogs = $this->page->getLatestBlogs(3);

            $this->addAlternateUrls($this->getAlternateMetaData($page));

            return view($template, compact('page', 'blogs', 'categories', 'latestBlogs'));
        }

        if ($template == "post.default") {
            $relatedBlogs = getRelatePost($page->id, 5);
            $tags = $page->tags;
            $categories = $page->categories;

            // Generate localized URLs for each supported locale
            $localizedUrls = [];
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $translatedPage = $page->translate($localeCode);
                if ($translatedPage) {
                    $localizedUrls[$localeCode] = LaravelLocalization::getLocalizedURL(
                        $localeCode,
                        trans('page::pages.routes.blogs-prefix', [], $localeCode) . '/' . 
                        $translatedPage->slug,
                        [],
                        true
                    );
                }
            }

            return view($template, compact('page', 'relatedBlogs', 'tags', 'categories', 'localizedUrls'));
        }

        if ($template == "page.product") {
            $products = getAllProducts();
            return view($template, compact('page', 'products'));
        }

        if ($template == "page.about") {
            return view($template, compact('page'));
        }

        if ($template == "page.contact") {
            return view($template, compact('page'));
        }

        $this->addAlternateUrls($this->getAlternateMetaData($page));
        return view($template, compact('page', 'relatedBlogs', 'tags', 'categories'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        $page = $this->page->findHomepage();
        $latestBlogs = $this->page->getLatestBlogs(2);
        $this->throw404IfNotFound($page);
        $template = $this->getTemplateForPage($page);
        $this->addAlternateUrls($this->getAlternateMetaData($page));

        return view($template, compact('page', 'latestBlogs'));
    }

    /**
     * Find a page for the given slug.
     * The slug can be a 'composed' slug via the Menu
     * @param string $slug
     * @return Page
     */
    private function findPageForSlug($slug)
    {
        $menuItem = app(MenuItemRepository::class)->findByUriInLanguage($slug, locale());

        if ($menuItem) {
            return $this->page->find($menuItem->page_id);
        }

        return $this->page->findBySlug($slug);
    }

    /**
     * Return the template for the given page
     * or the default template if none found
     * @param $page
     * @return string
     */
    private function getTemplateForPage($page)
    {
        return (view()->exists($page->template)) ? $page->template : 'page.default';
    }

    private function getTemplateForPost($post)
    {
        return (view()->exists($post->template)) ? $post->template : 'post.default';
    }

    /**
     * Throw a 404 error page if the given page is not found or draft
     * @param $page
     */
    private function throw404IfNotFound($page)
    {
        if (null === $page || $page->status === $this->disabledPage) {
            $this->app->abort('404');
        }
    }

    /**
     * Create a key=>value array for alternate links
     *
     * @param $page
     *
     * @return array
     */
    private function getAlternateMetaData($page)
    {
        $translations = $page->getTranslationsArray();

        $alternate = [];
        foreach ($translations as $locale => $data) {
            $alternate[$locale] = $data['slug'];
        }

        return $alternate;
    }

    /**
     * Find a post for the given slug.
     * The slug can be a 'composed' slug via the Menu
     * @param string $slug
     * @return Blog
     */
    public function getBlogsByCategory($slug)
    {
        $category = $this->postCategory->findBySlugInLocale($slug, app()->getLocale());
        if (!$category) {
            abort(404);
        }
        
        $categories = $this->postCategory->getAllCategory();
        $blogs = $this->page->findPageByCategory($category->id);
        $latestBlogs = $this->page->getLatestBlogs(3);
        
        // Generate localized URLs for each supported locale
        $localizedUrls = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $translatedCategory = $category->translate($localeCode);
            if ($translatedCategory) {
                // Remove the locale prefix from current URL and add the new one
                $localizedUrls[$localeCode] = LaravelLocalization::getLocalizedURL(
                    $localeCode,
                    trans('page::pages.routes.category-prefix', [], $localeCode) . '/' . 
                    $translatedCategory->slug,
                    [],
                    true
                );
            }
        }
        
        $page = (object) [
            'title' => trans('page::pages.title.blogs'),
            'subtitle' => $category->title,
            'meta_title' => trans('page::pages.title.blogs'),
            'meta_description' => trans('page::pages.title.blogs')
        ];

        return view('page.blogs.blogs', compact('page', 'category', 'blogs', 'categories', 'latestBlogs', 'localizedUrls'));
    }

    public function search(Request $request)
    {   
        $query = $request->keyword;
        if ($query != "" && $query != false) {
            $categories = $this->postCategory->getAllCategory();
            $blogs = $this->page->search($query, 10);
            $latestBlogs = $this->page->getLatestBlogs(3);
            
            // Generate localized URLs for each supported locale
            $localizedUrls = [];
            foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                $path = trans('page::pages.routes.blogs-prefix', [], $localeCode) . '/' . 
                        trans('page::pages.routes.search-prefix', [], $localeCode);
                $localizedUrls[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode, $path) . 
                    '?keyword=' . urlencode($query);
            }
            
            $page = (object) [
                'title' => trans('page::pages.title.blogs'), 
                'meta_title' => trans('page::pages.title.blogs'), 
                'meta_description' => trans('page::pages.title.blogs'),
            ];
            return view('page.blogs.blogs', compact('page', 'blogs', 'categories', 'latestBlogs', 'localizedUrls'));
        }
        return back();
    }
}
