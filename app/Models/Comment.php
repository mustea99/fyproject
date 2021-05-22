<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['chapter'];

    protected static ?Comment $comment = null;


    protected static function getProposalComment(int $uploadId)
    {
        if(!self::$comment){
            self::$comment = self::query()
                ->where('chapter', $uploadId)
                ->get()
                ->first();
        }

        if(null == self::$comment){
            self::$comment = self::query()->create([
                'chapter' => $uploadId
            ]);
        }

        return self::$comment;
    }

    public static function post(array $commentData)
    {
        $student = auth('student')->user();

        return CommentMessage::query()->create([
            'sender' => $student->id,
            'receiver' => $student->Supervisor_id,
            'comment' => self::getProposalComment($commentData['uploadId'])->id,
            'message' => $commentData['message']
        ]);
    }

    public static function getComments(int $uploadId)
    {
        return CommentMessage::query()
            ->where('comment', self::getProposalComment($uploadId)->id)
            ->get();
    }
}
