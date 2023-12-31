<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Cart;
class Search extends Component
{
    use WithPagination;
    public $selectedOption = 5;
    public $sortField = 'created_at'; // Default sort field
    public $sortDirection = 'desc'; // Default sort direction
    public $sortname ='Defult' ; // Add this line

    public $min_value=0;
    public $max_value=10000;
    
    public function addToWisshList($product_id, $product_name, $product_price){

        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);

    }
    public function deleteFromWisshList($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id )
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                return;
            }
        }

    }






    public function sortBy($field)
    {
        if ($field === $this->sortField) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
        $this->updateSortName($field);

        $this->render(); // Add this line to refresh the Livewire component
    }
    private function updateSortName($field)
    {
        switch ($field) {
            case 'created_at':
                $this->sortname = 'Defult';
                break;
            case 'regular_price':
                $this->sortname = 'Price: ' . ($this->sortDirection === 'asc' ? 'Low to High' : 'High to Low');
                break;
            case 'release_date':
                $this->sortname = 'Featured';
                break;
            case 'avg_rating':
                $this->sortname = 'Avg Rating';
                break;
            default:
                $this->sortname = '';
                break;
        }
    }
    public function UpdatedPageSize($size)
    {
        $this->selectedOption = $size; // Fix the typo here
    }

    public function store($product_id, $product_name, $product_price)
    {
        // Using the 'associate' method with the fully-qualified namespace
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
    
        // Flashing a success message to the session
        session()->flash('success_message', 'Item added to the cart successfully');
    
        // Redirecting to the 'shop.cart' route
        return redirect()->route('shop.cart');
    }

    public $q;
    public $search_item;
    public function mount(){

        $this->fill(request()->only('q'));
        $this->search_item = '%'.$this->q .'%';
    }
   
    
    public function render()
    {
        $products = Product::where('name', 'like' , $this->search_item )
        ->whereBetween( 'regular_price', [$this->min_value , $this->max_value])
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->selectedOption); // Fix the typo here
        $category = Category::orderBy('name', 'Asc')->get();

        return view('livewire.search', ['products' => $products , 'category'=>$category]);



    }
    
   
}












  




