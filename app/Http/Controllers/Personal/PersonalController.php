<?php

namespace App\Http\Controllers\Personal;

use App\Constants\AppConstant;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PersonalController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.wechat');
        $this->middleware('auth.access');
    }

    public function information()
    {
        $customer = \Helper::getCustomer();
        $data['nickname']           = $customer->nickname;
        $data['head_image_url']     = $customer->head_image_url;
        $data['type']               = $customer->type->type_ch;
        $data['beans_total']        = $customer->beans_total;
        return view('personal.information', ['data' => $data]);
    }

    private function createBeanItem($customerBean)
    {
        $day    = sprintf("%02d", $customerBean->updated_at->month) . '-' .
            sprintf("%02d", $customerBean->updated_at->day);
        $time   = sprintf("%02d", $customerBean->updated_at->hour) . ':' .
            sprintf("%02d", $customerBean->updated_at->minute);

        $type = $customerBean->rate->action_en;
        if ($type == AppConstant::BEAN_ACTION_CONSUME) {
            $result = '-' . (string)$customerBean->result;
        } else {
            $result = '+' . (string)$customerBean->result;
        } /*else>*/

        $item = array(
            'day'       => $day,
            'time'      => $time,
            'action'    => $customerBean->rate->action_ch,
            'icons'     => $customerBean->rate->icon_url,
            'result'    => $result,
        );
        return $item;
    }

    public function beans()
    {
        $customer       = \Helper::getCustomer();
        $beanThisYear   = $customer->beans;

        $resultArray = null;
        foreach ($beanThisYear as $bean) {
            $item = $this->createBeanItem($bean);
            $resultArray[$bean->updated_at->month][] = $item;
        } /*foreach>*/

        return view('personal.beans', [
            'year'  => Carbon::now()->year,
            'beans' => array_reverse($resultArray, true)
        ]);
    }

    public function gifts()
    {
        return view('personal.gifts');
    }

    public function friend()
    {
        $customer       = \Helper::getCustomer();
        $data['qrCode'] = $customer->qr_code;
        return view('personal.friend', ['data' => $data]);
    }

    public function beanRules()
    {
        return view('personal.bean-rules');
    }

    public function aboutUs()
    {
        return view('personal.about-us');
    }

}
