<?php

namespace factorenergia\adminlte3\widgets;

use yii\base\ErrorException;
use yii\bootstrap4\Widget;
use yii\helpers\Html;

/**
 * Class Callout
 * @package factorenergia\adminlte3\widgets
 *
 * @example
 *  echo Callout::widget(['type'=> Callout::TYPE_WARNING, 'title' => 'This is a callout', 'content' => 'Content'])
 *  Also possible
 *  Callout::begin(['type'=> Callout::TYPE_SUCCESS, 'title'=> 'Title']) ?>
 *      CONTENT
 *  Callout::end()
 */
class Callout extends Widget
{
    const TYPE_DANGER = 'danger';
    CONST TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    CONST TYPE_SUCCESS = 'success';

    /**
     * @var array supported type
     */
    public array $supportedType = ['danger', 'info', 'warning', 'success'];

    /**
     * @var string
     */
    public string $type = self::TYPE_INFO;

    /**
     * @var string
     */
    public ?string $title = null;

    /**
     * @var string
     */
    public ?string $content = null;

    /**
     * Callout options
     * @inheritdoc
     */
    public array $options = [];

    /**
     * Title options
     * @inheritdoc
     */
    public array $optionsTitle = [];

    /**
     * Content options
     * @inheritdoc
     */
    public array $optionsContent = [];

    /**
     * @var string $template
     */
    public $template = <<<html
        <div {options}>
            <h5 {optionsTitle}>{title}</h5>
            <p {optionsContent}>{content}</p>
        </div>
    html;

    public function init()
    {
        parent::init();

        if (!in_array($this->type, $this->supportedType)) {
            throw new ErrorException('Unsupported type: ' . $this->type);
        }

        Html::addCssClass($this->options, 'callout');
        Html::addCssClass($this->options, 'callout-' . $this->type);

        ob_start();
    }

    /**
     * @return string
     */
    public function run()
    {
        $content = ob_get_clean();

        return strtr($this->template, [
            '{options}' => Html::renderTagAttributes($this->options),
            '{optionsTitle}' => Html::renderTagAttributes($this->optionsTitle),
            '{optionsContent}' => Html::renderTagAttributes($this->optionsContent),
            '{title}' => $this->title,
            '{content}' => $this->content . $content
        ]);
    }
}