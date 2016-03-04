<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Constants\AppConstant;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\ArticleType;
use Overtrue\Wechat\Js;

class EducationController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.wechat', ['except' => ['view']]);
    }

    public function injections()
    {
        return view('education.injection');
    }

    public function index(Request $request)
    {
        $topArticles = Article::where('top', true)->orderBy('updated_at','desc')->get();
        if (!$topArticles) {
            abort(404);
        } /*if>*/
        return view('education.article-index', ['articles' => $topArticles]);
    }

    public function find(Request $request)
    {
        $type = $request->input('type');
        $articles = Article::where('type_id', $type)->orderBy('updated_at', 'desc')->get();
        if (!$articles) {
            return response()->json(['result' => '-1']);
        } /*if>*/
        return response()->json(['result' => '-1', 'articles' => $articles]);
    }

    public function category(Request $request)
    {
        $type = ArticleType::where('type_en', $request->input('type'))->first();
        if (!$type) {
            abort(404);
        } /*if>*/

        $typeArticles = Article::where('type_id', $type->id)->orderBy('updated_at','desc')->get();
        if (!$typeArticles) {
            abort(404);
        } /*if>*/

        return view('education.article-category', ['title' => $type->type_ch, 'articles' => $typeArticles]);
    }

    public function view(Request $request)
    {
        $article = Article::where('id', $request->input('id'))->first();
        if (!$article) {
            abort(404);
        } /*if>*/

        $appId  = env('WX_APPID');
        $secret = env('WX_SECRET');
        $js = new Js($appId, $secret);

        $user = \Session::get(AppConstant::SESSION_USER_KEY);
        if (!is_null($user)) {
            $customer   = \Helper::getCustomer();
            $show       = \BeanRecharger::calculateStudy($customer->id);
            return view('education.article-view', ['article' => $article, 'show' => $show, 'js' => $js]);
        } else {
            return view('education.article-view', ['article' => $article, 'show' => false, 'js' => $js]);
        }

    }

    public function updateCount(Request $request)
    {
        $article = Article::where('id', $request->input('id'))->first();
        if(!$article) {
            return response()->json(['result' => '-1']);
        } /*if>*/
        $article->count += 1;
        $article->save();
        return response()->json(['result' => '1']);
    }

    public function updateBean(Request $request)
    {
        $customer = \Helper::getCustomer();
        if (!$customer != null) {
            return response()->json(['result' => '-1']);
        } /*if>*/
        \BeanRecharger::study($customer->id);
        return response()->json(['result' => '1']);
    }

} /*class*/
