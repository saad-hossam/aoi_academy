<?php

namespace App\Http\Requests;

class UpdateCourseRequest extends StoreCourseRequest
{
    public function rules(): array
    {
        // Same rules as store. Add update-only changes below if you need them.
        return parent::rules();
    }
}
