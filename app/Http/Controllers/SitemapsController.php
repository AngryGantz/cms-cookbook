<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Sitemap;
use URL;
use Storage;

class SitemapsController extends BaseController
{

    public function index()
    {
        // Get a general sitemap.
        Sitemap::addSitemap('/sitemaps/general');

        // You can use the route helpers too.
        Sitemap::addSitemap(URL::route('sitemaps.posts'));
        Sitemap::addSitemap(route('sitemaps.users'));

        // Return the sitemap to the client.
        return Sitemap::index();
    }


    public function posts()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Sitemap::addTag(route('post.show', $post), $post->updated_at, 'daily', '0.8');
            Sitemap::addTag(route('post.showslug', $post->slug), $post->updated_at, 'daily', '0.9');
        }
        Storage::put('sitemap.xml', Sitemap::render());
        copy(storage_path('app/sitemap.xml'), public_path('sitemap.xml'));
        return Sitemap::render();
    }
}
