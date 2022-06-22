<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsEntityRequest;
use App\Http\Requests\UpdateNewsEntityRequest;
use App\Http\Resources\NewsCollection;
use App\Models\NewsEntity;
use Illuminate\Http\JsonResponse;

class NewsEntitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $news = NewsEntity::paginate(10);

            return response()->json([
                'success' => true,
                'data' => NewsCollection::collection($news)
            ], 200);
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'message' => 'Collection could not be found',
                'exception_text' => $exception->getMessage()
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewsEntityRequest  $request
     * @return JsonResponse
     */
    public function store(StoreNewsEntityRequest $request)
    {
        try {
            $path = $request->file('image')->store('public/images/news');
            $newsEntity = NewsEntity::create(array_merge($request->all(), ['image' => $path]));

            return response()->json([
                'success' => true,
                'data' => $newsEntity
            ], 201);
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'message' => 'NewsEntity could not be stored',
                'exception_text' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  NewsEntity  $news
     * @return JsonResponse
     */
    public function show(NewsEntity $news)
    {
        try {

            return response()->json([
                'success' => true,
                'data' => $news
            ], 200);
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'message' => 'NewsEntity could not be found',
                'exception_text' => $exception->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNewsEntityRequest  $request
     * @param  NewsEntity  $news
     * @return JsonResponse
     */
    public function update(UpdateNewsEntityRequest $request, NewsEntity $news)
    {
        try {
            $newValues = $request->all();

            if($request->has('image')) {
                $path = $request->file('image')->store('public/images/news');
                $newValues = array_merge($newValues, ['image' => $path]);
            }
            $news = $news->update($newValues);

            return response()->json([
                'success' => true,
                'data' => $news
            ], 204);
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'message' => 'NewsEntity could not be updated',
                'exception_text' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NewsEntity  $news
     * @return JsonResponse
     */
    public function destroy(NewsEntity $news)
    {
        try {
            $news->delete();

            return response()->json([
                'success' => true,
                'data' => $news
            ], 201);
        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'message' => 'NewsEntity could not be removed',
                'exception_text' => $exception->getMessage()
            ], 400);
        }
    }
}
