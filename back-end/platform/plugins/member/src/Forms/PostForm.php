<?php

namespace Botble\Member\Forms;

use Botble\Blog\Models\Post;
use Botble\Member\Forms\Fields\CustomEditorField;
use Botble\Member\Forms\Fields\CustomImageField;
use Botble\Member\Http\Requests\PostRequest;

class PostForm extends \Botble\Blog\Forms\PostForm
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        parent::buildForm();

        if (!$this->formHelper->hasCustomField('customEditor')) {
            $this->formHelper->addCustomField('customEditor', CustomEditorField::class);
        }

        if (!$this->formHelper->hasCustomField('customImage')) {
            $this->formHelper->addCustomField('customImage', CustomImageField::class);
        }

        $tags = null;

        if ($this->getModel()) {
            $tags = $this->getModel()->tags()->pluck('name')->all();
            $tags = implode(',', $tags);
        }

        $this
            ->setupModel(new Post)
            ->setFormOption('template', 'plugins/member::forms.base')
            ->setFormOption('enctype', 'multipart/form-data')
            ->setValidatorClass(PostRequest::class)
            ->setActionButtons(view('plugins/member::forms.actions')->render())
            ->remove('status')
            ->remove('is_featured')
            ->remove('content')
            ->remove('image')
            ->addAfter('description', 'content', 'customEditor', [
                'label'      => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows' => 4,
                ],
            ])
            ->addBefore('tag', 'image', 'customImage', [
                'label'      => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->modify('tag', 'tags', [
                'label'      => trans('plugins/blog::posts.form.tags'),
                'label_attr' => ['class' => 'control-label'],
                'value'      => $tags,
                'attr'       => [
                    'placeholder' => trans('plugins/blog::base.write_some_tags'),
                    'data-url'    => route('public.member.tags.all'),
                ],
            ], true)
            ->setBreakFieldPoint('format_type');
    }
}
