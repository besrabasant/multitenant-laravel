<?php

$header = $header ?? null;
$body = $body ?? null;
$footer = $footer ?? null;
?>

<div class="card shadow">
    @if($header)
        <div class="card-header">
            {!! $header !!}
        </div>
    @endif
    @if($body)
        <div class="card-body">
            {!! $body !!}
        </div>
    @endif
    @if($footer)
        <div class="card-footer">
            {!! $footer !!}
        </div>
    @endif
</div>
