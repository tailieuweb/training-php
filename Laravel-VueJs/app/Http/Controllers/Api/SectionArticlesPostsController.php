<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SectionArticlesPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionArticlesPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get section article post with category_article_post_id
        $SectionArticlePost_ID = SectionArticlesPosts::join('category_article_post', 'section_articles_posts.category_article_post_id', '=', 'category_article_post.id')
            ->select('section_articles_posts.*')->whereRaw('section_articles_posts.category_article_post_id = ?' , [$id])->get();
        return response($SectionArticlePost_ID, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Lấy hết thông tin new post tại innovation page
     */
    public function allSectionArticlePostNew_Innovation()
    {
        $sectionArticlePostNew =
            SectionArticlesPosts::join('category_article_post', 'section_articles_posts.category_article_post_id', '=', 'category_article_post.id')
            ->select(
                'section_articles_posts.*',
                'section_articles_posts.id',
                'category_article_post.category_post_name',
                'category_article_post.id as category_post_id'
            )->whereRaw('section_articles_posts.category_article_post_id = ?',[1])->get();
        return response($sectionArticlePostNew, 200);
    }

    /**
     * Lấy thông tin bài post với section-article-post.id
     */
    public function getSectionArticlePostInnovationById($id)
    {
        $sectionArticlePostNew =
            SectionArticlesPosts::join('category_article_post', 'section_articles_posts.category_article_post_id', '=', 'category_article_post.id')
            ->select(
                'section_articles_posts.*',
                'category_article_post.category_post_name',
                'category_article_post.id as category_post_id'
            )
            ->whereRaw('section_articles_posts.id = ?', $id)->get();
        return response($sectionArticlePostNew, 200);
        // $sectionArticlePostNew =
        // SectionArticlesPosts::find($id);
        // return response($sectionArticlePostNew,200);
    }

    /**
     *
     *
     */
    public function updateSectionArticlePostByID(Request $req, $id)
    {

        if ($req->hasFile('image')) {
            $fileName = $req->file('image');
            $fileExits =  'images/assets/articles-post-innovation/' . $fileName->getClientOriginalName();
            if (file_exists($fileExits)) {
                return response(['exists_image' => 'Tên ảnh đã tồn tại']);
            } else {
                //Nếu ảnh người dùng chọn chưa tồn tại, thì xóa ảnh cũ, và chèn ảnh mới
                if (!empty($req->imageOld != "")) {
                    $oldPath = 'images/assets/articles-post-innovation/' . $req->imageOld;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                    $fileName->move('images/assets/articles-post-innovation/', $fileName->getClientOriginalName());
                    $saveSectionAricle = SectionArticlesPosts::whereRaw('id = ?',[$id])->update([
                        'category_article_post_id' => $req->type_post,
                        'image_article' => 'images/assets/articles-post-innovation/' . $fileName->getClientOriginalName(),
                        'title_article' => $req->title,
                        'subtitle_article' => $req->subtitle,
                    ]);
                    return response(['success' => 'Đã sửa']);
                } else {
                    $fileName->move('images/assets/articles-post-innovation/', $fileName->getClientOriginalName());
                    $saveSectionAricle = SectionArticlesPosts::whereRaw('id = ?', [$id])->update([
                        'category_article_post_id' => $req->type_post,
                        'image_article' => 'images/assets/articles-post-innovation/' . $fileName->getClientOriginalName(),
                        'title_article' => $req->title,
                        'subtitle_article' => $req->subtitle,
                    ]);
                    return response(['success' => 'Đã sửa']);
                }
            }
        }
        else{
            $saveSectionAricle = SectionArticlesPosts::whereRaw('id = ?', [$id])->update([
                'category_article_post_id' => $req->type_post,
                'title_article' => $req->title,
                'subtitle_article' => $req->subtitle,
            ]);
            return response(['success' => 'Đã sửa']);
        }
    }

     /**
     *
     *
     */
    public function addSectionArticlePost(Request $req)
    {
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $title = $req->title;
            $subtitle = $req->subtitle;
            $type_post = $req->type_post;
            $image->move('images/assets/articles-post-innovation/', $image->getClientOriginalName());

            $addPost = SectionArticlesPosts::create([
                'category_article_post_id' => $type_post,
                'menu_main_header_id' => 4,
                'image_article' =>  'images/assets/articles-post-innovation/' . $image->getClientOriginalName(),
                'title_article' => $title,
                'subtitle_article' => $subtitle,
                'created_at' => now()
            ]);
            return response(['success' => 'Đã thêm']);
        } else {
            $addPost = SectionArticlesPosts::create([
                'category_article_post_id' => $req->type_post,
                'menu_main_header_id' => 4,
                'title_article' => $req->title,
                'subtitle_article' => $req->subtitle,
                'created_at' => now()
            ]);
            return response(['success' => 'Đã thêm']);
        }
    }
}
