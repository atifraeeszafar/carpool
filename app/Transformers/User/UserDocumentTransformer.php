<?php

namespace App\Transformers\User;

use App\Models\User;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;

class UserDocumentTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'roles','document'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(UserDocuments $userDocument)
    {

        dd( $userDocument );

        $params = [
            'id' => $userDocument->id,
            'document_id' => $userDocument->document_id,
            'image' => $userDocument->image,
        ];

        $documentJson = json_decode($userDocument->extra_fields);

        $params  = array_merge($params,$documentJson);

        return $params;
    }
    
}
