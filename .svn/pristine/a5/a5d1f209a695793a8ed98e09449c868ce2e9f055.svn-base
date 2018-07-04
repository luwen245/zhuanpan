<?php

namespace App\Http\Requests;

class UploadRequest extends BaseRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'file'=> [
                "mimes:".config('config.uploads.extension'),
                'required',
                'max:'.config('config.uploads.max_size').'kb',
                'min:'.config('config.uploads.min_size').'kb'
             ]
        ];
    }

   public function messages ()
   {
       return [
          'file.mimes'=> '请上传正确格式的文件！',
          'file.required'=>'请上传文件！',
          'file.max'=>'文件尺寸超大',
          'file.min'=>'文件尺寸超小'
       ];
   }
}
