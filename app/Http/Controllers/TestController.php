<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Serves\CatalogService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(ProductRepository $productRepository){
        return $productRepository->getByCategoryId();
    }
}
