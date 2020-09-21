<?php

use Illuminate\Database\Seeder;
use App\Base\Constants\Masters\UserNeededDocument as UserNeededDocumentSlug;
use App\Models\Admin\UserNeededDocument;

class UserNeededDocumentSeeder extends Seeder
{
    /**
    * List of all the documents to be created along with their details.
    *
    * @var array
    */
    protected $documents = [
        UserNeededDocumentSlug::DOCUMENTONE=>[
            'doc_type'=>'image',
            'has_identify_number'=>true,
            'identify_number_locale_key'=>'identification number', //if id number true
            'has_expiry_date'=>true,
            'active'=>true,
            'for_driver'=>true,
        ],
        UserNeededDocumentSlug::DOCUMENTTWO=>[
            'doc_type'=>'image',
            'has_identify_number'=>false,
            'has_expiry_date'=>true,
            'active'=>true,
            'for_driver'=>true,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            foreach ($this->documents as $documentSlug => $document) {

                // Create role if it doesn't exist
                $createdDocument = UserNeededDocument::firstOrCreate(['name' => $documentSlug], $document);
            }
        });
    }
}
