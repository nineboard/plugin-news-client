<?php
namespace Xpressengine\Plugins\NewsClient;

use Frontend;
use Presenter;
use Route;
use Xpressengine\Http\Request;
use Xpressengine\Plugin\AbstractPlugin;
use Xpressengine\Support\LaravelCache;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        // implement code

        $this->route();

        $register = app('xe.pluginRegister');
        $register->add(NewsWidget::class);

        app()->bind('xe.plugin.news_client', function () {
            return $this;
        });
    }

    protected function route()
    {
        // implement code

//        Route::fixed(
//            $this->getId(),
//            function () {
//                Route::get(
//                    '/',
//                    [
//                        'as' => 'news_client::index',
//                        'uses' => function (Request $request) {
//
//                            $title = 'News_Client';
//
//                            // set browser title
//                            Frontend::title($title);
//
//                            // load css file
//                            Frontend::css($this->asset('assets/style.css'))->load();
//
//                            // output
//                            return Presenter::make('news_client::views.index', ['title' => $title]);
//
//                        }
//                    ]
//                );
//            }
//        );

    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code

        parent::activate($installedVersion);
    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        // implement code

        parent::install();
    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @param string $installedVersion 이 플러그인의 현재 설치된 버전정보
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstall($installedVersion = null)
    {
        // implement code

        return parent::checkInstall($installedVersion);
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function update($installedVersion = null)
    {
        // implement code

        parent::update($installedVersion);
    }

    public function getHandler()
    {
        return new Handler(new LaravelCache(app('cache.store')), app('xe.config'));
    }
}
