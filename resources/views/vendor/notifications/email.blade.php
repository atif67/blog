@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Merhaba!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
<p>Aşağıdaki Butonu Kullanarak Email adresinizi onaylayın</p>
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
ONAYLA
@endcomponent
@endisset

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Eğer butona basmakla ilgili problem yaşıyorsanız aşağıdaki bağlantıya tıklayın veya bağlantıyı kopyalayıp tarayıcınıza yapıştırın: "
    ,
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
