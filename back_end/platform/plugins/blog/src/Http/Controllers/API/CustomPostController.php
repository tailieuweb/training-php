<?php

namespace Botble\Blog\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Botble\Base\Http\Responses\CustomResult;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Member\Models\Member;
use Google\Service\BigtableAdmin\Split;
use Google\Service\ManufacturerCenter\Count;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class CustomPostController extends Controller
{
    private $result;

    // Construct
    function __construct()
    {
        $this->result = CustomResult::getInstance();
    }

    /*
     * Get all category
     * Lấy tất cả danh mục
     */
    function getAllCategories()
    {
        try {
            $categories = Category::where('status', 'published')
                ->orderByDesc('is_featured')
                ->get();
            return response($this->result->setData($categories));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /*
     * get profile by Categories
     * Lấy tất cả  bài viết theo danh mục
     * Lấy tất cả  bài viết
     */
    function getPostByCategory(Request $request)
    {
        $cateid = $request->category_id;
        try {
            if ($cateid == null) {
                return response($this->result->setError("Khong tim thay category"));
            }
            if ($cateid == '*') {
                $posts = Post::select('posts.*', 'members.first_name as members_first_name', 'members.last_name as members_last_name', 'categories.name as category_name', 'members.avatar as authorAvatar')
                    ->join('members', 'members.id', '=', 'posts.author_id')
                    ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
                    ->join('categories', 'categories.id', '=', 'post_categories.category_id')
                    ->get();
            } else {
                $posts = Post::select('posts.*', 'members.first_name as members_first_name', 'members.last_name as members_last_name', 'categories.name as category_name', 'members.avatar as authorAvatar')
                    ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
                    ->join('categories', 'categories.id', '=', 'post_categories.category_id')
                    ->join('members', 'members.id', '=', 'posts.author_id')
                    ->where('categories.id', '=', $cateid)
                    ->get();
            }
            return response($this->result->setData($posts));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /**
     *
     * Get all post of member
     */
    function getListPostMember(Request $request)
    {
        try {
            if (isset($request->id_member_test)) {
                if (is_numeric($request->id_member_test)) {
                    $memberId = $request->id_member_test;
                }else{
                    return response($this->result->setError("Wrong at user_id !!"));  
                }
            } else {
                $member = $request->user();
                $memberId = $member->id;
            }
            $posts = Post::select('posts.*', 'members.first_name as authorFirstName', 'members.last_name as authorLastName', 'members.avatar as authorAvatar')
                ->join('members', 'members.id', '=', 'posts.author_id')
                ->where('members.id', $memberId)
                ->orderByDesc('id')
                ->get();
            // Get Star Rating and Comment Count
            foreach ($posts as $post) {
                $postId = $post->id;
                // Get Comment And rating of post
                $post['commentTotal'] = DB::table('post_comment_ratings')->where([
                    ['post_id', $postId],
                ])->count();
                // Get total average star
                $post['starAverage'] = round(DB::table('post_comment_ratings')->where([
                    ['post_id', $postId],
                    ['author_id', '!=', $post->author_id]
                ])->avg('star_rating'), 2);
            }
            return response($this->result->setData($posts));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /**
     *
     * Detail post
     * Chi tiết bài viết
     */
    function getPostById(Request $request)
    {
        try {
            $postId = $request->postID;
            // Get Post Information
            $post = Post::select('posts.*', 'members.first_name as authorFirstName', 'members.last_name as authorLastName', 'members.avatar as authorAvatar')
                ->join('members', 'members.id', '=', 'posts.author_id')
                ->where('posts.id', $postId)->first();
            if ($post == null) {
                return response($this->result->setError("There are no posts !"));
            }
            if ($post->status != "published") {
                return response($this->result->setError("This post has not been approved !"));
            }
            // Update views of post
            $post->views += 1;
            $post->save();
            // Get Comment And rating of post
            $post['commentTotal'] = DB::table('post_comment_ratings')->where([
                ['post_id', $postId],
            ])->count();
            // Get total average star
            $post['starAverage'] = round(DB::table('post_comment_ratings')->where([
                ['post_id', $postId],
                ['author_id', '!=', $post->author_id]
            ])->avg('star_rating'), 2);
            $post['starAverage'] = $post['starAverage'] ? $post['starAverage'] . "/5" : "0/5";

            return response($this->result->setData($post));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /**
     *
     * Create post
     */
    function createPost(Request $request)
    {
        try {
            $member = $request->user();
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:60',
                'description' => 'nullable|min:4|max:60',
                'content' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png',
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Some field is not true !!'));
            }

            // Processing list category id
            $listCategoryId = $request->categoriesId;
            if (!$listCategoryId) {
                return response($this->result->setError('Category not found !!'));
            }

            $listCategoryId = explode(',', $listCategoryId);
            $newListCategoryId = [];
            // Filter Category Id
            foreach ($listCategoryId as $categoryId) {
                if (is_numeric($categoryId) && $this->checkCategoryIdExist($categoryId)) {
                    array_push($newListCategoryId, $categoryId);
                }
            }
            if (count($newListCategoryId) == 0) {
                return response($this->result->setError('Not sending in the correct format !!'));
            }

            // Insert Data
            $post = Post::create([
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'status' => 'pending',
                'author_id' => $member->id,
                'author_type' => "Botble\Member\Models\Member",
                'format_type' => 'default'
            ]);
            $get_image = $request->file('image');
            $avatar_name = $post->id . '.' . $get_image->getClientOriginalExtension();
            $post->image = 'news/' . $avatar_name;
            $post->save();

            // Save image 600 x 600
            $image_resize = Image::make($get_image->getRealPath());
            $image_resize->resize(600, 600);
            $image_resize->save(public_path('storage/news/' . $avatar_name));

            // Create image by size
            $this->createImageBySize($post, $get_image, $image_resize);

            // Insert data into 'post_categories' table
            foreach ($newListCategoryId as $categoryId) {
                DB::table('post_categories')->insert([
                    'post_id' => $post->id,
                    'category_id' => $categoryId
                ]);
            }

            return response($this->result->setData($post));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    function createImageBySize($post, $get_image, $image_resize)
    {
        $arrSize = array("150x150", "540x360", "565x375");

        for ($i = 0; $i < count($arrSize); $i++) {
            $avatar_name = $post->id . "-" . $arrSize[$i] . "." . $get_image->getClientOriginalExtension();
            $arrNumberSize = explode("x", $arrSize[$i]);
            $image_resize->resize($arrNumberSize[0], $arrNumberSize[1]);
            $image_resize->save(public_path('storage/news/' . $avatar_name));
        }
    }

    function checkCategoryIdExist($categoryID)
    {
        $arrCategories = Category::all();

        foreach ($arrCategories as $category) {
            if ($category->id == $categoryID) {
                return true;
            }
        }
        return false;
    }

    /**
     *
     * Update post
     */
    function updatePost(Request $request)
    {
        try {
            $member = $request->user();
            $validator = Validator::make($request->all(), [
                'postID' => 'required',
                'name' => 'required|min:2|max:60',
                'description' => 'nullable|min:4|max:60',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Some field is not true !!'));
            }

            // Processing list category id
            $listCategoryId = $request->categoriesId;
            if (!$listCategoryId) {
                return response($this->result->setError('Category not found !!'));
            }

            $listCategoryId = explode(',', $listCategoryId);
            $newListCategoryId = [];
            // Filter Category Id
            foreach ($listCategoryId as $categoryId) {
                if (is_numeric($categoryId) && $this->checkCategoryIdExist($categoryId)) {
                    array_push($newListCategoryId, $categoryId);
                }
            }
            if (count($newListCategoryId) == 0) {
                return response($this->result->setError('Not sending in the correct format !!'));
            }

            // update post
            $post = Post::where('id', '=', $request->postID)->first();
            if ($post == null) {
                return response($this->result->setError("No posts found!"));
            }
            if ($post->author_id != $member->id) {
                return response($this->result->setError("Non-owned posts cannot be edited !!"));
            }

            // Check image
            $get_image = $request->file('image');
            if ($get_image) {
                // Get file name
                $get_name_image = $get_image->getClientOriginalName(); // Lay ten hinh (image.cbvcc)
                $arr = explode('.', $get_name_image);
                $check_file = end($arr);
                if ($check_file) {
                    if (
                        strtolower($check_file) == 'jpg' ||
                        strtolower($check_file) == 'jpeg' ||
                        strtolower($check_file) == 'png'
                    ) {
                        // Delete File only image have value
                        if ($post->image) {
                            // Delete Old Image
                            $imageLink = $post->image;
                            $temp = explode(".", $imageLink);
                            $endOfImage = $temp[count($temp) - 1];
                            $image1 = $post->id . "." . $endOfImage;
                            $image2 = $post->id . "-150x150." . $endOfImage;
                            $image3 = $post->id . "-540x360." . $endOfImage;
                            $image4 = $post->id . "-565x375." . $endOfImage;

                            $arrImage = array($image1, $image2, $image3, $image4);

                            for ($i = 0; $i < count($arrImage); $i++) {
                                $destinationPath = 'storage/news/' . $arrImage[$i];
                                // Delete Image
                                if (file_exists($destinationPath)) {
                                    unlink($destinationPath);
                                }
                            }
                        }

                        // Insert images
                        $get_image = $request->file('image');
                        $avatar_name = $post->id . '.' . $get_image->getClientOriginalExtension();
                        $post->image = 'news/' . $avatar_name;
                        $post->save();

                        // Save image 600 x 600
                        $image_resize = Image::make($get_image->getRealPath());
                        $image_resize->resize(600, 600);
                        $image_resize->save(public_path('storage/news/' . $avatar_name));

                        // Create image by size
                        $this->createImageBySize($post, $get_image, $image_resize);
                    }
                }
            }
            $post->name = $request->name;
            $post->description = $request->description;
            $post->content = $request->content;
            $post->save();

            DB::table('post_categories')->where('post_id', $post->id)->delete();

            // Insert data into 'post_categories' table
            foreach ($newListCategoryId as $categoryId) {
                DB::table('post_categories')->insert([
                    'post_id' => $post->id,
                    'category_id' => $categoryId
                ]);
            }
            return response($this->result->setData("Update successful!"));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }


    /**
     *
     * Delete post.
     */

    function deletePost(Request $request)
    {
        try {
            $member = $request->user();
            $post = Post::where('id', $request->postID)->first();
            if ($post == null) {
                return response($this->result->setError("Post not found !"));
            }
            if ($post->author_id != $member->id) {
                return response($this->result->setError("The post is not owned by the owner, cannot be deleted !"));
            }
            $postID = $post->id;
            DB::table('post_categories')->where('post_id', $postID)->delete();

            // Delete Image
            $imageLink = $post->image;
            $temp = explode(".", $imageLink);
            $endOfImage = $temp[count($temp) - 1];
            $image1 = $postID . "." . $endOfImage;
            $image2 = $postID . "-150x150." . $endOfImage;
            $image3 = $postID . "-540x360." . $endOfImage;
            $image4 = $postID . "-565x375." . $endOfImage;

            $arrImage = array($image1, $image2, $image3, $image4);

            for ($i = 0; $i < count($arrImage); $i++) {
                $destinationPath = 'storage/news/' . $arrImage[$i];
                // Delete Image
                if (file_exists($destinationPath)) {
                    unlink($destinationPath);
                }
            }

            // Delete post
            $post->delete();
            return response($this->result->setData("Delete successfull!"));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    // Get datetime Viet Nam Now
    private function getDatetimeVietNamNow()
    {
        // Get date
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return date('Y/m/d H:i:s', time());
    }

    //Get URL Sever
    function get_url_sever()
    {
        $server_name = $_SERVER['SERVER_NAME'];

        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $port = ":$_SERVER[SERVER_PORT]";
        } else {
            $port = '';
        }

        if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
            $scheme = 'https';
        } else {
            $scheme = 'http';
        }
        return $scheme . '://' . $server_name . $port;
    }

    /**
     * WEB 2 START HERE
     */
    // Get list Related Post
    function getRelatedPost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'post_id' => 'integer|required'
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Wrong at Post Id'));
            }
            $post_id = $request->post_id;
            // Find the post
            $post = Post::where("id", $post_id)
                ->where('status', 'published')
                ->first();
            if (!$post) {
                return response($this->result->setError('Post not found !!'));
            }
            // Get that post's category
            $categoryList = DB::table('post_categories')
                ->select("category_id")
                ->where('post_id', $post->id)
                ->get();

            //Get Category list id
            $categoryListId = [];
            foreach ($categoryList as $cate) {
                array_push($categoryListId, $cate->category_id);
            }
            $listPost = Post::select(
                "posts.*",
                "members.first_name as author_firstname",
                "members.last_name as author_lastname",
                "members.avatar as author_avatar"
            )
                ->join("post_categories", "post_categories.post_id", "posts.id")
                ->join("members", "members.id", "posts.author_id")
                ->whereIn("post_categories.category_id", $categoryListId)
                ->where("posts.id", "!=", $post->id)
                ->where('posts.status', 'published')
                ->where('posts.author_type', 'like', '%Member%')
                ->distinct()
                ->orderByDesc("posts.id")
                ->limit(4)
                ->get();
            return response($this->result->setData($listPost));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }
    // Filter Post
    function filterListPostByMember(Request $request)
    {
        try {
            // Check request
            $validator = Validator::make($request->all(), [
                'filter_by' => 'required|in:date,name,created_at',
                'order_by' => 'required|in:DESC,ASC',
            ]);
            if ($validator->fails()) {
                return $this->getListPostMember($request);
            }
            $posts = [];
            // Processing date separately and name,created_at separately
            // Processing filter by name,created_at
            if ($request->filter_by != 'date') {
                $posts = Post::select(
                    'posts.*',
                    'members.first_name as authorFirstName',
                    'members.last_name as authorLastName',
                    'members.avatar as authorAvatar'
                )
                    ->join('members', 'members.id', '=', 'posts.author_id')
                    ->where([
                        ['posts.author_id', $request->user()->id],
                        ['posts.author_type', 'like', '%member%']
                    ])
                    ->orderBy($request->filter_by, $request->order_by)
                    ->get();
            }
            // Processing filter by date
            else {
                $date = $request->time;
                // Check time request
                if ((bool)preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date)) {
                    $posts = Post::where([
                        ['author_id', $request->user()->id],
                        ['author_type', 'like', '%member%'],
                    ])
                        ->whereDate('created_at', '>=', $date)
                        ->orderBy('created_at', $request->order_by)
                        ->get();
                } else {
                    return response($this->result->setError('The time is not datetime formate, Please send with format yyyy-mm-dd'));
                }
            }
            foreach ($posts as $post) {
                $postId = $post->id;
                // Get Comment And rating of post
                $post['commentTotal'] = DB::table('post_comment_ratings')->where([
                    ['post_id', $postId],
                ])->count();
                // Get total average star
                $post['starAverage'] = round(DB::table('post_comment_ratings')->where([
                    ['post_id', $postId],
                    ['author_id', '!=', $post->author_id]
                ])->avg('star_rating'), 2);
                $post['starAverage'] = $post['starAverage'] ? $post['starAverage'] . "/5" : "0/5";
            }
            return response($this->result->setData($posts));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    // getRatingPost
    function getRatingPost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'post_id'      => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return response($this->result->setError("Post Id not valid !"));
            }
            $comments = DB::table('post_comment_ratings')
                ->select(
                    "post_comment_ratings.*",
                    'members.first_name as members_first_name',
                    'members.last_name as members_last_name',
                    'members.avatar as authorAvatar'
                )
                ->join("members", "members.id", "post_comment_ratings.author_id")
                ->where('post_comment_ratings.post_id', $request->post_id)
                ->orderByDesc('post_comment_ratings.id')
                ->get();
            return response($this->result->setData($comments));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }
    // createRatingPost
    function createRatingPost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'text_content'      => 'required|min:2',
                'star_rating'       => 'required|integer|min:1|max:5',
                'post_id'           => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return response($this->result->setError("Some field not true!"));
            }
            $post = Post::where("id", $request->post_id)->first();
            if ($post == null) {
                return response($this->result->setError("Not found post!"));
            }
            // Get date
            $date = $this->getDatetimeVietNamNow();
            // Create Post Comment Rating
            DB::table('post_comment_ratings')
                ->insert([
                    'text_content' => $request->text_content,
                    'star_rating' => $request->star_rating,
                    'post_id' => $request->post_id,
                    'author_id' => $request->user()->id,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            return response($this->result->setData("Comment successful!"));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }
    // List Post By Member LoadMore
    function listPostByMemberLoadMore(Request $request)
    {
        $temp = $this->filterListPostByMember($request)->content();
        $isJson = json_decode($temp);
        if ($isJson) {
            $isSuccess = isset($isJson->isSuccess) ? $isJson->isSuccess : false;
            if ($isSuccess) {
                $data = $isJson->data;
                // Processing load more number
                $post_in_one = 5;
                $page = is_numeric($request->load_more_number) ? $request->load_more_number : 1;
                $page = $page <= 0 ? 1 : $page;
                $postCount = $post_in_one * $page;
                $maxPage = ceil(count($data) / $post_in_one);
                if ($page >= $maxPage) {
                    return response($this->result->setData((object)[
                        "maxPage" => $maxPage,
                        "data" => $data
                    ]));
                }
                $valueReturn = [];
                for ($i = 0; $i < $postCount; $i++) {
                    array_push($valueReturn,$data[$i]);  
                }
                return response($this->result->setData((object)[
                    "maxPage" => $maxPage,
                    "data" => $valueReturn
                ]));
            } else if (isset($isJson->error)) {
                return response($this->result->setError($isJson->error));
            }
        }
        return response($this->result->setError("Ops, some thing Wrong"));
    }
}
