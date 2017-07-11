<?php

namespace Reaction\SymlinkFaker\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SymlinkController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $path = $request->path();
        $path = str_replace(config('symlink-faker.folder'), '', $path);
        $path = storage_path('app/public' . $path);

        if (File::exists($path)) {
            return response()->file($path);
        }

        throw new NotFoundHttpException;
    }
}