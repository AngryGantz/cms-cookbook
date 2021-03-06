<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Marker;
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

        $markers = Marker::all();
        foreach ($markers as $marker) {
            Sitemap::addTag(route('post.showbymarker', $marker->id), $marker->updated_at, 'daily', '0.6');
            Sitemap::addTag(route('post.showbymarkerslug', $marker->slug), $marker->updated_at, 'daily', '0.7');
        }

        Storage::put('sitemap.xml', Sitemap::render());
        copy(storage_path('app/sitemap.xml'), public_path('sitemap.xml'));
        return Sitemap::render();
    }

    public function generateMarkerSlug()
        {
            $markers = Marker::all();
            foreach($markers as $marker)
            {
                $marker->slug = \Slug::make($marker->name);
                $marker->save();
            }

        }

}
