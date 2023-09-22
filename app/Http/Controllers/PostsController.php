<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = Post::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'phone' => 'required|unique:posts|numeric'
        ])->validate();

        $post = new Post;
        $post->phone = $request->phone;
        $post->save();

        $this->sendMessage('Post registered successfully!!', $request->phone);
        return back()->with(['success' => "{$request->phone} registered"]);
    }

    public function sendCustomMessage(Request $request)
    {
        \Validator::make($request->all(), [
            'post' => 'required|array',
            'body' => 'required',
        ])->validate();

        $recipients = $request->post;

        foreach ($recipients as $recipient) {
            $this->sendMessage($request->body, $recipient);
        }
        return back()->with(['success' => "Message on its way to recipients!"]);
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
        $post = Post::whereId($post->id)->update([
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