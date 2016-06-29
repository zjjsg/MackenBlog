<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Input;

class Category extends Model
{

    //
    protected $table = 'category';


    protected $fillable = [
        'cate_name',
        'as_name',
        'parent_id',
        'seo_title',
        'seo_key',
        'seo_desc',
    ];

    static $catData = [
        0 => '顶级分类',
    ];

    static $category = [];


    public $html;

    /**
     * 获取分类列表
     * @return mixed
     */
    public static function getCategoryDataModel()
    {
        $category = self::all();
        $data = tree($category);
        return $data;
    }

    /**
     * 此方法维护静态数组 $category
     */
    private static function getCategoryArr($catId)
    {
        if (!isset(self::$category[$catId])) {
            $cate = self::select('cate_name')->find($catId);
            if (empty($cate)) {
                return false;
            }
            self::$category[$catId] = $cate->cate_name;
        }
        return self::$category[$catId];
    }

    public static function getCategoryNameByCatId($catId)
    {
        $cate = self::getCategoryArr($catId);
        return !empty($cate) ? $cate : '分类不存在';
    }

    /**
     * 取得树结构的分类数组
     * @return array
     */
    public static function getCategoryTree()
    {
        $data = self::getCategoryDataModel();
        foreach ($data as $k => $v) {
            self::$catData[$v->id] = $v->html . $v->cate_name;
        }

        return self::$catData;
    }

    /**
     * 根据别名取分类信息
     * @param $asName
     * @return mixed
     */
    public static function getCatInfoModelByAsName($asName)
    {
        return self::where('as_name', '=', $asName)->first();
    }
}
