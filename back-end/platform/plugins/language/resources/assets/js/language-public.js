class LanguagePublicManagement {
    init() {
        $('.language-wrapper .dropdown .dropdown-toggle').on('click', event => {
            event.preventDefault();
            if ($(event.currentTarget).hasClass('active')) {
                $('.language-wrapper .dropdown .dropdown-menu').hide();
                $(event.currentTarget).removeClass('active');
            } else {
                $('.language-wrapper .dropdown .dropdown-menu').show();
                $(event.currentTarget).addClass('active');
            }
        });
        $(document).on('click', event => {
            if ($(event.currentTarget).closest('.language-wrapper').length === 0) {
                $('.language-wrapper .dropdown .dropdown-menu').hide();
                $('.language-wrapper .dropdown .dropdown-toggle').removeClass('active');
            }
        });
    }
}

$(document).ready(() => {
    new LanguagePublicManagement().init();
});
