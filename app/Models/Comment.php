<?php
/**
 * Created by PhpStorm.
 * User: aibang
 * Date: 2016/8/8
 * Time: 9:24
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['ip', 'content'];
}