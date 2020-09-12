<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Posts extends Component
{
    use WithPagination, WithFileUploads;

    public Post $post;
    public $image = null, $search = '', $mode = [
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
        'post.category_id' => 'required',
        'post.title' => 'required|string|unique:posts,title',
        'post.content' => 'required',
        'post.slug' => 'required',
        'image' => 'required|image',
        'post.active' => '',
    ];

    public function mount()
    {
        $this->initModel();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPost($value)
    {
        if (is_string($value) && $value != "" && $this->post->title == $value) {
            $this->post->slug = Str::slug($this->post->title);
        }
    }

    public function resetForm()
    {
        $this->reset(['mode']);

        return $this;
    }

    public function initModel($id = 0)
    {
        if ($id > 0) $this->post = Post::find($id);
        else  $this->post = new Post();

        return $this;
    }

    public function setMode($type, $id = 0)
    {
        $this->resetForm()->initModel($id)->mode[$type] = true;
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'categories' => Category::orderBy('name', 'asc')->get(),
            'collection' => Post::join('categories', 'posts.category_id', '=', 'categories.id')
                ->select(['posts.*', 'categories.name'])
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('name', 'like', '%' . $this->search . '%');
                })
                ->where('user_id', auth()->id())
                ->orderBy($this->oderBy['column'], $this->oderBy['direction'])
                ->paginate(10)
        ]);
    }

    public function store()
    {
        $this->validate();

        $this->post->image = $this->image->store('images', ['disk' => 'public']);
        $this->post->user_id = auth()->id();
        $this->post->active ??= 0;

        $this->post->save();

        $this->resetForm()->emit('saved');
    }

    public function update()
    {
        $this->validate([
            'post.title' => 'required|string|unique:posts,title,' . $this->post->id . ',id',
            'image' => '',
        ]);

        if (is_object($this->image)) {
            $this->post->image = $this->image->store('images', ['disk' => 'public']);
        }
        $this->post->active ??= 0;

        $this->post->save();

        $this->resetForm()->emit('saved');
    }

    public function delete()
    {
        $this->post->delete();

        $this->resetForm()->emit('saved');
    }
}
