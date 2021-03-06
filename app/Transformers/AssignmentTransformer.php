<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;

class AssignmentTransformer extends TransformerAbstract
{
    public function transform($assignment) {
        return [
            'id' => $assignment->id,
            'name' => $assignment->name,
            'videos' => array_values($assignment->videos->sortBy('name')->map(function($video) {
                return [
                    'id' => $video->id,
                    'name' => $video->name,
                    'duration' => $video->duration,
                    'url' => $video->url
                ];
            })->toArray())
        ];
    }
}