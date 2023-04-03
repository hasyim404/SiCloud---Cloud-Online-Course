<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class SearchPagination extends Component
{
    use WithPagination;
    public $searchTerm = '';
    // public $course;

    public function render()
    {
        $course = Course::where('nama_course', 'like', '%'.$this->searchTerm.'%')->paginate(10);
        $search = $this->searchTerm;

        return view('livewire.search-pagination', ['course' => $course, 'search' => $search]);
    }
}
