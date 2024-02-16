<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string $image_path
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image_path',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function updateImage(?UploadedFile $file)
    {
        if ($file) {
            $folder = 'images';
            $fileName = uniqid() . '.' . $file->extension();

            $imagePath = $folder . '/' . $fileName;

            $file->storeAs('public/' . $folder, $fileName);

            $this->image_path = $imagePath;
            $this->save();
        }
    }
}
