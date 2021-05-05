<?php


namespace App;


class PageMsg
{
    public static function renderAll(): ?string
    {
        return self::render('msg:error', 'danger')
            . self::render('msg:warning')
            . self::render('msg:info', 'info')
            . self::render('msg:success', 'success');
    }

    public static function render(string $key, string $type = 'warning'): ?string
    {
        $msg = session()->get($key);

        if (!$msg) return null;

        return '<div class="alert alert-' . $type . '">' . $msg . '</div>';
    }
}
