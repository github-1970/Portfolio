<?php

namespace App\Http\Requests\Admin;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class PortfolioRequest extends FormRequest
{
    private $mediaTypes = [];
    private $mediaType = '';
    private $rules = [];
    private $isRequired = '';

    public function __construct()
    {
        $this->isRequired = 'required';
        if (strtolower(request()->get('_method')) == 'put') {
            $this->isRequired = 'nullable';
            $this->mediaType = Route::current()->parameter('portfolio')->media_type;
        }

        $this->mediaTypes = Portfolio::$mediaTypes;

        $this->rules = [
            'title' => 'required',
            'project_type' => 'required',
            'customer' => 'required',
            'link' => 'required',
            'technology' => 'required',
            'featured_image' => "{$this->isRequired}|file|image|max:4096",
            'status' => 'nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        request()->validate([
            'media_type' => "{$this->isRequired}|in:{$this->mediaTypes[0]},{$this->mediaTypes[1]},{$this->mediaTypes[2]},{$this->mediaTypes[3]}",
        ]);
        session()->flash('media.has', true);

        if (request()['media_type'] == 'slider') $this->sliderRules();
        if (request()['media_type'] == 'video') $this->videoRules();
        if (request()['media_type'] == 'video_link') $this->videoLinkRules();

        return $this->rules;
    }

    private function sliderRules()
    {
        session()->flash('media.slider', true);
        $this->rules['slider'] = "nullable|array|min:3";
        return $this->rules['slider.*'] = 'file|image|max:4096';
    }

    private function videoRules()
    {
        session()->flash('media.video', true);
        return $this->rules['video'] = "nullable|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-ms-wmv,video/x-msvideo,video/x-flv,video/x-matroska|max:30720";
    }

    private function videoLinkRules()
    {
        session()->flash('media.video_link', true);
        return $this->rules['video_link'] = "nullable|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-ms-wmv,video/x-msvideo,video/x-flv,video/x-matroska|max:30720";
    }
}
