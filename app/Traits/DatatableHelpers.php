<?php
namespace App\Traits;


trait DatatableHelpers
{

    public function getTranslations()
    {
        return [
            'paginate' => [
                'previous' => '<i class="fa-solid fa-angle-left"></i>',
                'next' => '<i class="fa-solid fa-angle-right"></i>'
            ],
            "search" => '',
            "sLengthMenu" => '_MENU_',
            "searchPlaceholder" => __('search')
        ];
    }
}