<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function insertCheckbox(Request $request)
    {
        dd($request->all());
    }

    public function signal()
    {
        $users = Post::all();
        return view('posts.signal', ['users' => $users]);
    }

    public function reset()
    {
        $users = Post::all();
        return view('posts.reset', ['users' => $users]);
    }

    public function ip()
    {
        $users = Post::all();
        return view('posts.ip', ['users' => $users]);
    }

    public function valid(Request $request)
    {
        // Check if the phone number "+6283845930444" already exists in the database
        $existingPost = Post::where('phone', '+6283845930444')->first();
    
        if (!$existingPost) {
            // Create a new Post if it doesn't exist
            $post = new Post;
            $post->phone = '+6283845930444';
            $post->save();
        }
    
        $this->sendMessage('Post registered successfully!!', '+6283845930444');
        return redirect(route('posts.index'));
    }
    
    public function sendCustomMessage(Request $request)
    {
        $request->validate([
            'post' => 'required|array',
            'body' => 'required',
        ]);
    
        $recipients = $request->post;
    
        foreach ($recipients as $recipient) {
            $this->sendMessage($request->body, $recipient);
        }
    
        return redirect(route('posts.index'))->with('success', 'Messages sent successfully!');
    }
    
    private function sendMessage($message, $recipients)
    {
        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_AUTH_TOKEN");
        $twilio_number = env("TWILIO_NUMBER");

        $client = new Client($account_sid, $auth_token);

        // Make sure to handle any exceptions that may occur during sending.
        try {
            $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
        } catch (\Exception $e) {
            // Handle the exception, such as logging the error.
            // You can also return an error response to the user.
            return back()->with(['error' => 'Failed to send message: ' . $e->getMessage()]);
        }
    }

    public function edit(Request $request, Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update([
            'phone'     => $request->input('phone'),
            'slug'      => Str::slug($request->input('phone')),
            'content'   => $request->input('content')
        ]);

        return redirect(route('posts.index'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect(route('posts.index'));
    }
}
