<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\withPagination;

use App\Models\Commodity;
use App\Models\Category;
use App\Models\City;


class Product extends Component
{
    
    use withPagination;

    public $cat;
    public $checkboxes = [];    

    protected $queryString = [
        'cat' => ['except' => ''],
        'checkboxes' => ['except' => 0],
    ];    


    public function render()
    {
        $items = Commodity::with(['category', 'cities'])
            ->when($this->cat, function($query) { // filter field
                return $query->where('category_id', $this->cat);
            })
            ->when($this->checkboxes, function($query) { // filter category field
                $query->whereHas('cities', function($query) {
                    $query->whereIn( 'city_id', $this->checkboxes );
                });
            })
            ->paginate(50);

        $categories = Category::orderBy('title')->get();
        $cities = City::orderBy('name')->get();

        return view('livewire.product', [
            'items' => $items,
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }


    public function updatingCat()
    {
        $this->resetPage();
    }


    public function updatingCheckboxes()
    {
        $this->resetPage();
    }


    public function resetFilter()
    {
        $this->reset();
    }

}
