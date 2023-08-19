<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = "e um teste ";

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('livewire.show-tweets', compact('tweets'));
    }


    public function create() {

        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        // Tweet::create([
        //     'content' => $this->content,
        //     'user_id' => Auth::id(),
        // ]);

        $this->content = '';
    }

    public function like($idTweet) {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Tweet $tweet) {

        $tweet->likes()->delete();
    }


}
