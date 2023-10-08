<?php

namespace App\Livewire;

use App\Models\post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use function Laravel\Prompts\search;

class PostList extends Component
{

  use WithPagination;

  #[Url()]
  public $sort = 'desc';
  #[Url()]
  public $search = "";
  public function setSort($sort){
    $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
  }


  #[On('search')] // call dispatch search in searchBox
  public function updateSearch($search){
    $this->search = $search;
  }

  #[Computed()]
  public function posts()
  {
    return post::published()->orderBy('published_at', $this->sort)
    ->where("title", "like", "%{$this->search}%")
    ->paginate(5)
      // ->simplePaginate(3)
    ;
  }

  public function render()
  {
    return view(
      'livewire.post-list'
      // ,["posts" => post::published()->orderBy('published_at', 'desc')->paginate(3)]
    );
  }
}
