<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('post.show', $post->id);
    }
}
