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
use App\Models\Section;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            'homePage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::all(),
            'about' => About::get()[0],
            'features' => Feature::all(),
            'carousels' => Carousel::all(),
            
            'latestGalleries' => Gallery::latest()->limit(6)->get(), 
            'latestPosts' => Post::latest()->limit(3)->get(),

            'latestGallerySection' => Section::where('code', 'galeri-terbaru')->where('on_page', 'Beranda')->get()[0],
            'latestPostSection' => Section::where('code', 'artikel-terbaru')->where('on_page', 'Beranda')->get()[0]
        ]);
    }
    
    Public function about()
    {
        return view('about', [
            // cuurentPage saya set sebagai isi tag <title> dengan gabungan nama_situs
            'currentPage' => 'Tentang Kami',
            'aboutPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::all(),
            'features' => Feature::all(),
            'events' => Event::latest()->get(),
            'about' => About::get()[0],

            'pageTitleSection' => Section::where('code', 'judul-halaman')->where('on_page', 'Tentang')->get()[0],
            'eventSection' => Section::where('code', 'acara-dan-kegiatan')->where('on_page', 'Tentang')->get()[0]
        ]);
    }

    public function post()
    {
        return view('post', [
            // cuurentPage saya set sebagai isi tag <title> dengan gabungan nama_situs
            'currentPage' => 'Artikel',
            'postPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            'posts' => Post::latest()->filter(request(['search', 'category', 'author', 'tag']))->paginate(10),
            'categories' => PostCategory::get(),
            'recentPosts' => Post::latest()->limit(4)->get(),

            'pageTitleSection' => Section::where('code', 'judul-halaman')->where('on_page', 'Artikel')->get()[0]
        ]);
    }

    public function postDetail(Post $post)
    {
        return view('post-detail', [
            // cuurentPage saya set sebagai isi tag <title> dengan gabungan nama_situs
            'currentPage' => $post->title,
            'postPage' => true,
            'postDetail' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            'post' => $post,
            'categories' => PostCategory::get(),
            'recentPosts' => Post::latest()->limit(4)->get(),
            
            'pageTitleSection' => Section::where('code', 'judul-halaman')->where('on_page', 'Artikel')->get()[0]
        ]);
    }

    public function gallery()
    {
        return view('gallery', [
            // cuurentPage saya set sebagai isi tag <title> dengan gabungan nama_situs
            'currentPage' => 'Galeri',
            'galleryPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            'galleries' => Gallery::latest()->paginate(1),
            // section langsung panggil fieldnya ga perlu pakek perulangan karena sudah memanggil indeks pertama
            'pageTitleSection' => Section::where('code', 'judul-halaman')->where('on_page', 'Galeri')->get()[0],
            'allGalleriesSection' => Section::where('code', 'semua-galeri')->where('on_page', 'Galeri')->get()[0],
        ]);
    }

    public function contact()
    {
        return view('contact', [
            // cuurentPage saya set sebagai isi tag <title> dengan gabungan nama_situs
            'currentPage' => 'Kontak Kami',
            'contactPage' => true,
            'profile' => Profile::get()[0],
            'socials' => Social::get(),
            // section langsung panggil fieldnya ga perlu pakek perulangan karena sudah memanggil indeks pertama
            'pageTitleSection' => Section::where('code', 'judul-halaman')->where('on_page', 'Kontak')->get()[0],
            'waFormSection' => Section::where('code', 'wa-form')->where('on_page', 'Kontak')->get()[0],
        ]);
    }

    public function contactSend(Request $request)
    {   
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:50',
            'message' => 'required|min:5|max:1000'
        ]);
        $telephone = Profile::get()[0]->telephone;

        if(substr($telephone, 0, 1) == '0'){
            $telephone = Str::replaceFirst('0', '62', $telephone);
        }
        
        echo "
        <script>
            window.location.href = 'https://api.whatsapp.com/send?phone={$telephone}&text=Nama:%20{$request->name}%0D%0AEmail:%20{$request->email}%0D%0APesan:%20{$request->message}'
        </script>";
    }

    
}
