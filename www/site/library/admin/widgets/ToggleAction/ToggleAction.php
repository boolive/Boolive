<?php
/**
 * Вид
 * Базовый объект для создания элементов интерфейса
 * @version 1.0
 */
namespace site\library\admin\widgets\ToggleAction;

use site\library\views\Widget\Widget,
    boolive\values\Rule;

class ToggleAction extends Widget
{
    /**
     * @var bool Текущее состояние действия (для текущего отображаемого объекта)
     */
    protected $_state;

    function startRule()
    {
        return Rule::arrays(array(
            'REQUEST' => Rule::arrays(array(
                'object' => Rule::any(
                    Rule::arrays(Rule::entity($this->object_rule->value())),
                    Rule::entity($this->object_rule->value())
                )->required(),
                'call' => Rule::string()->default('')->required(),
            ))
        ));
    }

    /**
     * Инициализация состояния.
     * Необходимо переопредлить в наследниках класса
     */
    protected function initState()
    {
        $this->_state = false;
    }

    /**
     * Текущее состояние действия
     * @return bool
     */
    function state()
    {
        return $this->_state;
    }

    /**
     * Выполнение действия
     */
    function toggle()
    {
        return false;
    }

    function startInit($input)
    {
        parent::startInit($input);
        if (!isset($this->_input_error)){
            $this->initState();
        }
    }

    function show($v = array(), $commands, $input)
    {
        if ($this->_input['REQUEST']['call'] == 'toggle'){
            return $this->toggle();
        }
        return null;
    }
}