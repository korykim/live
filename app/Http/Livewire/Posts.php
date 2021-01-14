<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;

    public $title, $body, $post_id; //$posts,
    public $isOpen = 0;

    public $searchTerm = '';
    public $page = 1;
    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('searchTerm', 'page'));
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        //$this->posts = Post::all();
        return view('livewire.posts', [
            'posts' => Post::where('title', 'like', $searchTerm)->orWhere('body', 'like', $searchTerm)->paginate(10)
        ]);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body
        ]);

        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
