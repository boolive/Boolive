<?php
/**
 * Виджет анонса страницы (статьи)
 *
 * @version 1.0
 */
namespace library\layouts\boolive\center\Content\option_part\Part\option_page\PagePreview;

use library\basic\interfaces\widgets\ViewObjectsList\ViewObjectsList,
    Boolive\values\Rule;

class PagePreview extends ViewObjectsList
{
    public function getInputRule()
    {
        return Rule::arrays(array(
            'GET' => Rule::arrays(array(
                'object' => Rule::entity()->required(), // объект, который отображать
                ), Rule::any() // не удалять другие элементы
            )), Rule::any() // не удалять другие элементы
        );
    }

    public function canWork()
    {
        if ($result = parent::canWork()){
            // По URL определяем объект и номер страницы
            $this->_input['GET']['objects_list'] = $this->_input['GET']['object']->findAll();
        }
        return $result;
    }

    public function work($v = array())
    {
        echo 'PagePreview';
    }
}
