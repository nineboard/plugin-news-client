<?php
/**
 * ManagerController.php
 *
 * This file is part of the Xpressengine package.
 *
 * PHP version 7
 *
 * @category    NewsClient
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\NewsClient;

use App\Http\Controllers\Controller;
use XePresenter;
use Xpressengine\Http\Request;

/**
 * ManagerController
 *
 * @category    NewsClient
 *
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 *
 * @link        https://xpressengine.io
 */
class ManagerController extends Controller
{
    /**
     * ManagerController constructor.
     */
    public function __construct()
    {
        XePresenter::setSettingsSkinTargetId('news_client');
    }

    /**
     * get setting
     *
     * @return mixed|\Xpressengine\Presenter\Presentable
     */
    public function getSetting()
    {
        return XePresenter::make('setting', [
            'agree' => app('xe.news_client')->isAgree(),
        ]);
    }

    /**
     * post setting
     *
     * @param  Request  $request  request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSetting(Request $request)
    {
        app('xe.news_client')->setAgree($request->has('agree'));

        return redirect()->route('news_client::setting')
            ->with('alert', ['type' => 'success', 'message' => '저장되었습니다.']);
    }
}
