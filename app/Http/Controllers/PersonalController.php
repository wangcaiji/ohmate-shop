<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;




class PersonalController extends Controller
{
    //
    function __construct()
    {
        // TODO: Implement __construct() method.
        $this->middleware('auth.wechat');
        $this->middleware('auth.access');
    }

    public function information()
    {
        return 'information';
    }

    public function beans()
    {
        return 'beans';
    }

    public function orders()
    {
        return 'orders';
    }

    public function advertisement()
    {
        if (!\Session::has('logged_user')) {
            return "session no exists";
        }/*if>*/

        $user = \Session::get('logged_user');

        $customer = Customer::where('openid', $user['openid'])->first();

        if (!$customer) {
            return redirect('/register/focus');
        } /*if>*/

        if ((!$customer->phone) || (!$customer->is_registered)) {
            return redirect('/register/create');
        } /*if>*/

        if (!$customer->qr_code) {
            return redirect($customer->qr_code);
        } /*if>*/

        return 'advertisement';
    }

} /*class*/
