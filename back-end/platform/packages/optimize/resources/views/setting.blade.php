<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2>{{ trans('packages/optimize::optimize.settings.title') }}</h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note">{{ trans('packages/optimize::optimize.settings.description') }}</p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group">
                <label class="text-title-field"
                       for="optimize_page_speed_enable">{{ trans('packages/optimize::optimize.settings.enable') }}
                </label>
                <label class="hrv-label">
                    <input type="radio" name="optimize_page_speed_enable" class="hrv-radio"
                           value="1"
                           @if (setting('optimize_page_speed_enable')) checked @endif>{{ trans('core/setting::setting.general.yes') }}
                </label>
                <label class="hrv-label">
                    <input type="radio" name="optimize_page_speed_enable" class="hrv-radio"
                           value="0"
                           @if (!setting('optimize_page_speed_enable')) checked @endif>{{ trans('core/setting::setting.general.no') }}
                </label>
            </div>
        </div>
    </div>
</div>