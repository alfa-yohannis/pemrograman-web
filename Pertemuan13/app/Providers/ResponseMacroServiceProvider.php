<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
  public function boot()
  {
    Response::macro('api', function ($data, $message, $error = null, $statusCode = 200) {
      return Response::json([
        'data' => $data,
        'message' => $message,
        'error' => $error,
        'statusCode' => $statusCode,
      ])->setStatusCode($statusCode);
    });
  }
}
