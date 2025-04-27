<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommanController
{
    public static function getDistricts()
    {
        return $districts = [
            "Ampara",
            "Anuradhapura",
            "Badulla",
            "Batticaloa",
            "Colombo",
            "Galle",
            "Gampaha",
            "Hambantota",
            "Jaffna",
            "Kalutara",
            "Kandy",
            "Kegalle",
            "Kilinochchi",
            "Kurunegala",
            "Mannar",
            "Matale",
            "Matara",
            "Monaragala",
            "Mullaitivu",
            "Nuwara Eliya",
            "Polonnaruwa",
            "Puttalam",
            "Ratnapura",
            "Trincomalee",
            "Vavuniya",
        ];
    }

    public static function getProvinces()
    {
        return $provinces = [
            "Central Province",
            "Eastern Province",
            "Northern Province",
            "North Central Province",
            "North Western Province",
            "Sabaragamuwa Province",
            "Southern Province",
            "Uva Province",
            "Western Province",
        ];
    }
}
