<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public Category $category;
    public $search = '', $mode = [
        'add' => false,
        'edit' => false,
        'delete' => false
    ], $oderBy = [
        'column' => 'id',
        'direction' => 'desc'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ], $rules = [
        'category.name' => 'required|string|unique:categories,name',
    ];

    public function mount()
    {
        $this->initModel();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetForm()
    {
        $this->reset(['mode']);

        return $this;
    }

    public function initModel($id = 0)
    {
        if ($id > 0) $this->category = Category::find($id);
        else  $this->category = new Category();

        return $this;
    }

    public function setMode($type, $id = 0)
    {
        $this->resetForm()->initModel($id)->mode[$type] = true;
    }

    public function render()
    {
        return view('livewire.categories.index', [
            'collection' => Category::where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->oderBy['column'], $this->oderBy['direction'])
                ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->validate();

        $this->category->save();

        $this->resetForm()->emit('saved');
    }

    public function update()
    {
        $this->validate([
            'category.name' => 'required|string|unique:categories,name,' . $this->category->id . ',id',
        ]);

        $this->category->save();

        $this->resetForm()->emit('saved');
    }

    public function delete()
    {
        $this->category->delete();

        $this->resetForm()->emit('saved');
    }
}
