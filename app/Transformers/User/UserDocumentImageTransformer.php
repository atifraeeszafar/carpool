<?php

namespace App\Transformers\User;

use App\Models\User;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;
use App\Models\UserDocuments;
use App\Base\Constants\Document\Document;
use App\Base\Constants\Document\DocumentStatus;
use App\Models\UserDocumentImage;

class UserDocumentImageTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        // 'roles','document'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserDocumentImage $userDocument)
    {
    
        $params = [
            'image' => $userDocument->image,
        ];
    
        return $params;
    }
    
}
