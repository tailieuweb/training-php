@foreach($supportedLocales as $localeCode => $properties)
    <link rel="alternate" href="{{ Language::getLocalizedURL($localeCode, url()->current()) }}" hreflang="{{ $localeCode }}" />
@endforeach
