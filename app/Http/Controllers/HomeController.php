<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Social;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use App\Models\Carousel;
use App\Models\Feature;
use App\Models\About;
use App\Models\Event;

class HomeController extends Controller
{
    public function home()
    {
        // 
    }
    
    Public function about()
    {
        return view('about', [
            'currentPage' => 'Tentang Kami',
            'aboutPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::all(),
            'features' => Feature::all(),
            'events' => Event::latest()->get(),
            'about' => About::get()[0],
        ]);
    }

    public function post()
    {
        $title = '';

        if(request('category')) {
            $title = 'Artikel Tentang ' . PostCategory::where('slug', request('category'))->get()[0]->name;
        }
        elseif(request('author')) {
            $title = 'Artikel Oleh ' . User::where('slug', request('author'))->get()[0]->name;
        }
        elseif(request('tag')) {
            $title = 'Artikel dengan Tanda ' . request('tag');
        }
        elseif(request('search')) {
            $title = 'Cari : ' . request('search');
        }
        else {
            $title = 'Artikel';
        }

        return view('post', [
            'currentPage' => 'Artikel',
            'postPage' => true,
            'pageTitle' => $title,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            'posts' => Post::latest()->filter(request(['search', 'category', 'author', 'tag']))->paginate(1),
            'categories' => PostCategory::get(),
            'recentPosts' => Post::latest()->limit(4)->get()
        ]);
    }

    public function postDetail(Post $post)
    {
        return view('post-detail', [
            'currentPage' => 'Artikel',
            'postPage' => true,
            'pageTitle' => $post->title,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            'post' => $post,
            'categories' => PostCategory::get(),
            'recentPosts' => Post::latest()->limit(4)->get()
        ]);
    }

    public function gallery()
    {
        return view('gallery', [
            'currentPage' => 'Galeri',
            'galleryPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            'galleries' => Gallery::latest()->get()
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'currentPage' => 'Kontak',
            'contactPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
        ]);
    }

    public function contactSend(Request $request)
    {   
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50',
            'message' => 'required|min:5|max:1000'
        ]);
        
        echo "<script>window.location.href = 'https://api.whatsapp.com/send?phone={$request->phone}&text=Nama:%20{$request->name}%0D%0AEmail:%20{$request->email}%0D%0APesan:%20{$request->message}'</script>";
    }

    
}
