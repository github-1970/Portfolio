<?php

use App\Services\Aparat\AparatHandler;
use Illuminate\Database\Eloquent\Model;

function active_route($route, $exactly = false)
{
    $route = route($route);

    if ($exactly) {
        if ($route == url()->current()) return 'active';
        return;
    }

    $route = str_replace('/', '\/', $route);
    if (preg_match("/$route/", url()->current())) return 'active';
}

function text_limitation($text, $limit = 50)
{
    if (mb_strlen($text) <= $limit) return $text;
    return mb_substr($text, 0, $limit) . '...';
}

function image_upload($file, $destinationPath)
{
    return file_upload($file, $destinationPath);
}

function image_delete($path)
{
    file_delete($path);
}

function video_upload($file, $destinationPath)
{
    return file_upload($file, $destinationPath);
}

function video_delete($path)
{
    file_delete($path);
}

function file_upload($file, $destinationPath)
{
    try {
        // check has file
        if (is_null($file)) throw new Exception('Not Implemented');

        // move file
        $fileName = uniqid(time() . mt_rand()) . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        // return name, relative_path
        $fullPath = $destinationPath . '/' . $fileName;
        $WithoutPublicPath = preg_replace('~.+[\\\/]public[\\\/]~', '', $fullPath);
        return [
            'name' => $fileName,
            'relative_path' => $WithoutPublicPath,
        ];
    } catch (Exception $e) {
        // return error page
        return abort(501, $e->getMessage());
    }
}

function file_delete($path)
{
    if (file_exists($path)) unlink($path);
}

function aparat(): AparatHandler
{
    return new AparatHandler;
}

function add_https_if_needed($url)
{
    if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
        return $url;
    } else {
        return 'https://' . $url;
    }
}

function disableAllStatus($model, $status, $id, $update=false)
{
    if ($status)
        return $model::where('status', true)->where('id', '!=', $id)->update(['status' => false]);
    // If only the row is active in the update, it is disabled
    if ($update && $model::where('status', true)->count() <= 1)
        return $model::first()->update(['status' => true]);
}

function cantDisable($model)
{
    if($model::where('status', true)->count() <= 1)
        return back()->with(['error' => 'در صورتی که هیچ وضعیت دیگری فعال نباشد، نمی‌توانید وضعیت ردیف انتخاب شده را غیرفغال کنید!']);
}
