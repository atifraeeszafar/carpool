<?php

namespace App\Http\Controllers\Api\V1\Common;

use GuzzleHttp\Client;
use App\Http\Controllers\Api\V1\BaseController;

/**
 * @group Translation
 * translation api
 */
class TranslationController extends BaseController
{
    /**
    * Translation api
    */
    public function index()
    {
        $client = new Client();
        $get_api_key = 'AIzaSyB_oJC2B0Gpqq2obBLA-oUXw9HRBp7nDmQ';
        $response = $client->get('https://sheets.googleapis.com/v4/spreadsheets/12sFjJTBGFdPg1OQ-XSmOfyceer5j-C2QqNKa2rDwpnw/values:batchGet?ranges=Settings!A:Z&key='.$get_api_key.'&ranges=Sheet1!A:Z');

        $data = json_decode($response->getBody()->getContents(), true);

        $settings = [];
        $language = [];
        $lang = [];

        for ($i = 1; $i < count($data["valueRanges"][0]['values']); $i++) {
            $sett = $data["valueRanges"][0]['values'][$i];
            if ($sett[0] != '') {
                $settings[$sett[0]][$sett[1]] = array_key_exists(2, $sett) ? $sett[2] : "TRUE";
            }
        }

        foreach ($data["valueRanges"][1]['values'] as $key => $value) {
            for ($i = 1; $i < count($value); $i++) {
                if ($key == 0) {
                    if ($value[$i] != "") {
                        if (key_exists($value[$i], $settings) && key_exists("show", $settings[$value[$i]])) {
                            if ($settings[$value[$i]]['show'] == "TRUE") {
                                $lang[$i] = array(
                                    "name" => $value[$i],
                                    "state" => true,
                                );
                            } else {
                                $lang[$i] = array(
                                    "name" => $value[$i],
                                    "state" => false,
                                );
                            }
                        } else {
                            $lang[$i] = array(
                                "name" => $value[$i],
                                "state" => true,
                            );
                        }
                    }
                } else {
                    if ($value[0] != "" && $lang[$i]["state"]) {
                        $language[$lang[$i]['name']][$value[0]] = $value[$i];
                    }
                }
            }
        }

        $std = new \stdClass();
        $std->data = $language;

        return $this->respondOk($language);
    }
}
