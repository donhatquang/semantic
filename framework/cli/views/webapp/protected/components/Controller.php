<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BaseController extends CController
{
	/**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'main';

    public $active = 'Home';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array(
        'Home' => array('welcome/index'),
        'Introduce' => array('introduce/index'),
        'Solution' => array('solution/index'),
        'News' => array('news/index'),
        'Contact' => array('contact/index'),
        'RSS' => array('rss/index'),
        'About' => array('about/index')
    );

    public function getResource($dir, $file) {
        return Yii::app()->request->baseUrl . '/assets/' . implode('/', $dir) . "/{$file}";
    }
}