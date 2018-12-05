<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'slug', 'content', 'image', 'description',
        'category_id', 'user_id', 'status', 'view', 'is_featured'
    ];

    public static function getPopularPosts()
    {
        return self::orderBy('view', 'desc')->take(3)->get();
    }

    public static function getFeaturedPosts()
    {
        return self::orderBy('created_at', 'desc')->where('is_featured', 1)->take(3)->get();
    }

    public static function getRecentPosts()
    {
        return self::orderBy('created_at', 'desc')->take(4)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add(array $request)
    {
        $post = new self;
        $post->fill($request);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function edit(array $data)
    {
        $this->fill($data);
        $this->slug = SlugService::createSlug(Post::class, 'slug', $data['title']);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->image !== null)
        {
            Storage::delete('posts/'.$this->image);
        }
    }

    public function uploadImage(UploadedFile  $image = null)
    {
        if($image == null)
        {
            return;
        }
        if($this->image)
        {
            dump(228);
            $this->removeImage();
        }

        $imageName = str_random(20).'.'.$image->extension();
        $image->storeAs('posts', $imageName);
        $this->image = $imageName;
        $this->save();
    }

    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.jpg';
        }
        return asset('storage/posts/'.$this->image);
    }

    public function getTagsTitles()
    {
        return implode(', ',$this->tags->pluck('title')->all());
    }

    public function setTags($ids)
    {
        if($ids == null)
        {
            return;
        }
        $this->tags()->sync($ids);
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postId = $this->hasPrevious();
        return self::find($postId);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postId = $this->hasNext();
        return self::find($postId);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function views()
    {
        $this->view++;
        $this->save();
    }

    public function sendEmailToSubs()
    {
        $subs = Subscription::all()->where("token", null);
        foreach($subs as $sub)
        {
            Mail::send('emails.new_post', ["post" => $this], function ($message) use ($sub){
                $message->to($sub->email, "Новое письмо")->subject("Новый пост");
                $message->from("laravelproekt@gmail.com");
        });
        }
}


}
