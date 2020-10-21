<?php

namespace App\Http\Controllers\Front;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepo->listCategories();
        return view('front.index', compact('categories'));
    }

    public function pgw_pfe3ds()
    {
        return redirect()->away('www.pgw-pfe3ds.dz');
    }
}
