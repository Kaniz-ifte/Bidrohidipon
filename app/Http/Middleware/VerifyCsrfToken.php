<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
     protected $except = [
       '/pay-via-ajax', '/success','/cancel','/fail','/ipn','api/login','api/register','api/subjects-by-course','api/chapters-by-subject','api/videos-by-chapter','api/courses','api/my-courses','api/courses-exam','/api/confirm-order','/api/check-order','/api/exams-by-course','/api/start-exam','/api/update-marks','/api/update-profile','/api/add-comment','/api/post-test','/api/live-classes','/api/subscription-options',
   ];
}
