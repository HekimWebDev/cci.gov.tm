<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class NewsItem extends News implements Feedable
{
    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id'      => $this->id,
            'title'   => $this->title,
            'summary' => $this->desc,
            'updated' => Carbon::parse($this->publish_at),
            'link'    => route('news_single', $this->slug),
            'author'  => 'cci.gov.tm',
        ]);
    }

    public static function getFeedItems()
    {
        return self::all();
    }
}
