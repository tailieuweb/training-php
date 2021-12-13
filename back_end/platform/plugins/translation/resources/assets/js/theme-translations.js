$(document).ready(function () {
    $(document).on('click', '.button-save-theme-translations', event => {
        event.preventDefault();
        let _self = $(event.currentTarget);
        _self.addClass('button-loading');

        let $form = _self.closest('form');

        let translations = [];
        $.each($form.find('.table tbody tr'), function (index, el) {
            translations.push({
                key: $(el).find('.translation-key').val(),
                value: $(el).find('.translation-value').val()
            });
        });

        $.ajax({
            url: $form.prop('action'),
            type: 'POST',
            data: {
                locale: $form.find('input[name=locale]').val(),
                translations: JSON.stringify(translations)
            },
            success: data => {
                _self.removeClass('button-loading');

                if (data.error) {
                    Botble.showError(data.message);
                } else {
                    Botble.showSuccess(data.message);
                    $form.removeClass('dirty');
                }
            },
            error: data => {
                _self.removeClass('button-loading');
                Botble.handleError(data);
            }
        });
    });
});
