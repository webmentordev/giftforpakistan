<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class BlogController extends Controller
{

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $filename = $request->file('upload')->storeAs('blog_images', str_replace(' ', '-', $request->file('upload')->getClientOriginalName()), 'public_disk');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/'.$filename); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function index(){
        SEOMeta::setTitle('Blogs | GiftForPakistan');
        SEOMeta::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.');
        SEOMeta::setCanonical('https://giftforpakistan.com/blogs');
        SEOMeta::setRobots('index, follow');
        SEOMeta::addMeta('apple-mobile-web-app-title', 'GiftForPakistan');
        SEOMeta::addMeta('application-name', 'GiftForPakistan');

        OpenGraph::setTitle('Blogs | GiftForPakistan');
        OpenGraph::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.'); 
        OpenGraph::setUrl('https://giftforpakistan.com/blogs');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'eu');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png');
        OpenGraph::addImage('https://giftforpakistan.com/images/cover.png', ['height' => 630, 'width' => 1200]);

        TwitterCard::setTitle('Blogs | GiftForPakistan');
        TwitterCard::setSite('@giftforpakistan');
        TwitterCard::setImage('https://giftforpakistan.com/images/cover.png');
        TwitterCard::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.');

        JsonLd::setTitle('Blogs | GiftForPakistan');
        JsonLd::setDescription('Send gifts to your family and friends allover pakistan. We provide secure and fast gift delievery service.');
        JsonLd::addImage('https://giftforpakistan.com/images/logo.png');
        JsonLd::setType('WebSite');
        JsonLd::addImage('https://giftforpakistan.com/images/cover.png');
        return view('blogs', [
            'blogs' => Blog::latest()->paginate(20)
        ]);
    }

    public function create_index(){
        SEOMeta::setTitle('Create Blog | GiftForPakistan');
        return view('admin.create-blog');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'thumb' => 'required|image|mimes:jpg,png,jpeg,webp|max:300|unique:blogs',
            'summary_ckeditor' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);
        Blog::create([
            'title' => $request->title,
            'thumb' => $request->thumb->storeAs('blog_thumb', str_replace(' ', '-', $request->thumb->getClientOriginalName()), 'public_disk'),
            'message' => $request->summary_ckeditor,
            'tags' => $request->tags,
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'user_id' => auth()->user()->id,
            'description' => $request->description
        ]);
        return back()->with('success', 'Blog has been posted!');
    }


    public function read_blog($slug){
        $blog = Blog::where('slug', $slug)->get();
        if(count($blog) > 0){
            SEOMeta::setTitle($blog[0]->title);
            SEOMeta::setDescription($blog[0]->description);
            SEOMeta::setCanonical("https://giftforpakistan.com/blog/".$blog[0]->slug);
            SEOMeta::addMeta('apple-mobile-web-app-title', $blog[0]->title);
            SEOMeta::addMeta('application-name', 'GiftForPakistan');
            SEOMeta::addMeta('article:published_time', $blog[0]->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:modified_time', $blog[0]->updated_at->toW3CString(), 'property');
            SEOMeta::addMeta('news_keywords', $blog[0]->tags);
            
            OpenGraph::setTitle($blog[0]->title);
            OpenGraph::setDescription($blog[0]->description); 
            OpenGraph::addProperty('type', 'website');
            OpenGraph::addProperty('image:secure', 'http://');
            OpenGraph::addProperty('image:alt', $blog[0]->title. ' Image');
            OpenGraph::addProperty('locale', 'eu');
            OpenGraph::setUrl("/blog/".$blog[0]->slug.'/');
            OpenGraph::addImage("https://giftforpakistan.com/storage/".$blog[0]->thumb);
            OpenGraph::setSiteName($blog[0]->title);
            
            TwitterCard::setTitle($blog[0]->title);
            TwitterCard::setSite('@giftforpakistan');
            TwitterCard::setType('card', 'summary_large_image');
            TwitterCard::setType('domain', 'giftforpakistan.com');
            TwitterCard::setType('url', 'https://giftforpakistan.com/blog/'.$blog[0]->slug);
            TwitterCard::setImage("https://giftforpakistan.com/storage/".$blog[0]->thumb);
            TwitterCard::setDescription($blog[0]->description);
            

            JsonLd::setTitle($blog[0]->title);
            JsonLd::setDescription($blog[0]->description);
            JsonLd::addImage("https://giftforpakistan.com/storage/storage/".$blog[0]->thumb);
            JsonLd::setType('Article');
            JsonLd::addImage("https://giftforpakistan.com/storage/storage/".$blog[0]->thumb);
            return view('blog-read', [
                'blog' => $blog
            ]);
        }else{
            abort(404, 'Page Not Found!');
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'thumb' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:300',
            'summary_ckeditor' => 'required',
            'tags' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ]);
        $array = array(
            "title" => $request->title,
            "message" => $request->summary_ckeditor,
            "tags" => $request->tags,
            "slug" => $request->slug,
            "description" => $request->description
        );
        if($request->thumb != null){
            $thumb = $request->thumb->storeAs('blog_thumb', str_replace(' ', '-', $request->thumb->getClientOriginalName()), 'public_disk');
            $array['thumb'] = $thumb;
        }
        $results = Blog::find($id);
        $results->update(array_filter($array));
        $results->save();
        return back()->with('success', 'Blog Successfully Updated!');
    }

    public function updateIndex($id){
        $result = Blog::find($id);
        if($result != null){
            return view('admin.update-blog', [
                'blogdata' => $result,
                'update_id' => $result->id
            ]);
        }else{
            abort(500, 'Internal Server Error');
        }
    }
}