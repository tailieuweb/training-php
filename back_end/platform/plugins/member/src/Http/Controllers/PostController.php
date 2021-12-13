<?php

namespace Botble\Member\Http\Controllers;

use Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Models\Post;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Blog\Services\StoreCategoryService;
use Botble\Blog\Services\StoreTagService;
use Botble\Member\Forms\PostForm;
use Botble\Member\Http\Requests\PostRequest;
use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\MemberActivityLogInterface;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Botble\Member\Tables\PostTable;
use EmailHandler;
use Exception;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Response;
use RvMedia;
use SeoHelper;
use Throwable;

class PostController extends Controller
{
    /**
     * @var MemberInterface
     */
    protected $memberRepository;

    /**
     * @var PostInterface
     */
    protected $postRepository;

    /**
     * @var MemberActivityLogInterface
     */
    protected $activityLogRepository;

    /**
     * PostController constructor.
     * @param Repository $config
     * @param MemberInterface $memberRepository
     * @param PostInterface $postRepository
     * @param MemberActivityLogInterface $memberActivityLogRepository
     */
    public function __construct(
        Repository $config,
        MemberInterface $memberRepository,
        PostInterface $postRepository,
        MemberActivityLogInterface $memberActivityLogRepository
    ) {
        $this->memberRepository = $memberRepository;
        $this->postRepository = $postRepository;
        $this->activityLogRepository = $memberActivityLogRepository;

        Assets::setConfig($config->get('plugins.member.assets', []));
    }

    /**
     * @param Request $request
     * @param PostTable $postTable
     * @return JsonResponse|View|Response
     * @throws Throwable
     */
    public function index(PostTable $postTable)
    {
        SeoHelper::setTitle(trans('plugins/blog::posts.posts'));

        return $postTable->render('plugins/member::table.base');
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @throws Throwable
     */
    public function create(FormBuilder $formBuilder)
    {
        SeoHelper::setTitle(trans('plugins/member::member.write_a_post'));

        return $formBuilder->create(PostForm::class)->renderForm();
    }

    /**
     * @param PostRequest $request
     * @param StoreTagService $tagService
     * @param StoreCategoryService $categoryService
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|RedirectResponse
     *
     * @throws FileNotFoundException
     */
    public function store(
        PostRequest $request,
        StoreTagService $tagService,
        StoreCategoryService $categoryService,
        BaseHttpResponse $response
    ) {

        if ($request->hasFile('image_input')) {
            $result = RvMedia::handleUpload($request->file('image_input'), 0, 'members');
            if ($result['error'] == false) {
                $file = $result['data'];
                $request->merge(['image' => $file->url]);
            }
        }

        /**
         * @var Post $post
         */
        $post = $this->postRepository->createOrUpdate(array_merge($request->except('status'), [
            'author_id'   => auth('member')->user()->getAuthIdentifier(),
            'author_type' => Member::class,
            'status'      => BaseStatusEnum::PENDING,
        ]));

        event(new CreatedContentEvent(POST_MODULE_SCREEN_NAME, $request, $post));

        $this->activityLogRepository->createOrUpdate([
            'action'         => 'create_post',
            'reference_name' => $post->name,
            'reference_url'  => route('public.member.posts.edit', $post->id),
        ]);

        $tagService->execute($request, $post);

        $categoryService->execute($request, $post);

        EmailHandler::setModule(MEMBER_MODULE_SCREEN_NAME)
            ->setVariableValues([
                'post_name'   => $post->name,
                'post_url'    => route('posts.edit', $post->id),
                'post_author' => $post->author->name,
            ])
            ->sendUsingTemplate('new-pending-post');

        return $response
            ->setPreviousUrl(route('public.member.posts.index'))
            ->setNextUrl(route('public.member.posts.edit', $post->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return string
     *
     * @throws Throwable
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $post = $this->postRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('member')->user()->getAuthIdentifier(),
            'author_type' => Member::class,
        ]);

        if (!$post) {
            abort(404);
        }

        event(new BeforeEditContentEvent($request, $post));

        SeoHelper::setTitle(trans('plugins/blog::posts.edit') . ' "' . $post->name . '"');

        return $formBuilder
            ->create(PostForm::class, ['model' => $post])
            ->renderForm();
    }

    /**
     * @param int $id
     * @param PostRequest $request
     * @param StoreTagService $tagService
     * @param StoreCategoryService $categoryService
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse|RedirectResponse
     *
     * @throws FileNotFoundException
     */
    public function update(
        $id,
        PostRequest $request,
        StoreTagService $tagService,
        StoreCategoryService $categoryService,
        BaseHttpResponse $response
    ) {
        $post = $this->postRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('member')->user()->getAuthIdentifier(),
            'author_type' => Member::class,
        ]);

        if (!$post) {
            abort(404);
        }

        if ($request->hasFile('image_input')) {
            $result = RvMedia::handleUpload($request->file('image_input'), 0, 'members');
            if ($result['error'] == false) {
                $file = $result['data'];
                $request->merge(['image' => $file->url]);
            }
        }

        $post->fill($request->except('status'));

        $this->postRepository->createOrUpdate($post);

        event(new UpdatedContentEvent(POST_MODULE_SCREEN_NAME, $request, $post));

        $this->activityLogRepository->createOrUpdate([
            'action'         => 'update_post',
            'reference_name' => $post->name,
            'reference_url'  => route('public.member.posts.edit', $post->id),
        ]);

        $tagService->execute($request, $post);

        $categoryService->execute($request, $post);

        return $response
            ->setPreviousUrl(route('public.member.posts.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function destroy($id, BaseHttpResponse $response)
    {
        $post = $this->postRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('member')->user()->getAuthIdentifier(),
            'author_type' => Member::class,
        ]);

        if (!$post) {
            abort(404);
        }

        $this->postRepository->delete($post);

        $this->activityLogRepository->createOrUpdate([
            'action'         => 'delete_post',
            'reference_name' => $post->name,
        ]);

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    /**
     * Get list tags in db
     *
     * @param TagInterface $tagRepository
     * @return array
     */
    public function getAllTags(TagInterface $tagRepository)
    {
        return $tagRepository->pluck('name');
    }
}
