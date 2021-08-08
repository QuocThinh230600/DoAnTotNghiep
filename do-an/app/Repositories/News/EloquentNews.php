<?php

namespace App\Repositories\News;

use App\Models\News;
use App\Repositories\AbstractRepository;

class EloquentNews extends AbstractRepository implements NewsRepository
{
    protected $model;

    /**
     * EloquentNews constructor.
     * @param News $model
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(News $model)
    {
        $this->model = $model;
    }

    /**
     * Get new position in news
     * @return int
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getNewPosition(): int
    {
        $position = $this->model->max('position');

        return ($position == null) ? 1 : $position + 1;
    }

    /**
     * Get all data news with pivot category
     * @return object
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getAllNews(): object
    {
        return $this->model->with('category')->orderBy('created_at', 'DESC');
    }

    /**
     * Get data news with uuid
     * @param string $uuid
     * @return array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getNewsUuid(string $uuid): array
    {
        $news     = $this->model->where('uuid', $uuid)->first();
        $category = $news->category_news()->pluck('category_id')->toArray();
        $images   = $news->news_images()->select('image','alt','position')->get();

        return [
            'news'     => $news,
            'category' => $category,
            'images'   => $images
        ];
    }
    /**
     * Get data news with category_id
     * @param string $category_id
     * @return array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getAllNewsByCateId($category_id)
    {
        return $this->model->whereHas('category_news', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->whereNull('deleted_at');
    }

    /**
     * Get data news
     * @param string $category_id, $take
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getNews($category_id , $take)
    {
        return $this->model->whereHas('category_news', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->whereNull('deleted_at')->take($take)->get();
    }


    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Quốc Thịnh <luuthinh135@gmail.com>
     */
    public function getCategorys($id)
    {
        return $this->model
        ->join('category_news','news.id','category_news.news_id')
        ->where('news.id','=',$id)
        ->value('category_news.category_id');
    }

    /**
     * Get all data news with pivot category
     * @param string $category_id, $take
     * @return array
     * @author Quốc Thịnh <luuthinh135@gmail.com>
     */
    public function getNewsTop($category_id , $take)
    {
        return $this->model->whereHas('category_news', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->whereNull('deleted_at')->orderBy('created_at', 'DESC')->take($take)->get();
    }
}
