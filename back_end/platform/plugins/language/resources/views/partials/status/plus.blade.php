@if (!is_in_admin() || (Auth::check() && Auth::user()->hasPermission($route['create'])))
    <a href="{{ route($route['create']) }}?ref_from={{ $item->id }}&ref_lang={{ $language->lang_code }}" class="tip" title="{{ trans('plugins/language::language.add_language_for_item') }}"><i class="fa fa-plus"></i></a>
@else
    <i class="fa fa-plus text-primary"></i>
@endif
