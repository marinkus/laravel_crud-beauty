<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Photo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'comment'];

    public function getPhotos()
    {
        return $this->hasMany(Photo::class, 'post_id', 'id');
    }

    public function addPhotos(?array $photos) : self
    {
        if ($photos) {
            $postPhoto = [];
            $time = Carbon::now();

            foreach ($photos as $photo) {
                $ext = $photo->getClientOriginalExtension();
                $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
                $photo->move(public_path() . '/photos', $file);

                $postPhoto[] = [
                    'url' => asset('/photos') . '/' . $file,
                    'post_id' => $this->id,
                    'created_at' => $time,
                    'updated_at' => $time
                ];
            }
            Photo::insert($postPhoto);
        }
        return $this;
    }

    public function removePhotos(?array $photos): self
    {
        if ($photos) {
            $toDelete = Photo::whereIn('id', $photos)->get();
            foreach ($toDelete as $photo) {
                $file = public_path() . '/photos/' . pathinfo($photo->url, PATHINFO_FILENAME) . '.' . pathinfo($photo->url, PATHINFO_EXTENSION);
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            Photo::destroy($photos);
        }
        return $this;
    }
    public function lastImageUrl()
    {
        return $this->getPhotos()->orderBy('id', 'desc')->first()->url;
    }
}
