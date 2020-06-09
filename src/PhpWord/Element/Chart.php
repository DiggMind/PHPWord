<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Chart as ChartStyle;

/**
 * Chart element
 *
 * @since 0.12.0
 */
class Chart extends AbstractElement
{
    /**
     * Is part of collection
     *
     * @var bool
     */
    protected $collectionRelation = true;

    /**
     * Type
     *
     * @var string
     */
    private $type = 'pie';

    /**
     * Series
     *
     * @var array
     */
    private $series = array();

    /**
     * Chart style
     *
     * @var \PhpOffice\PhpWord\Style\Chart
     */
    private $style;

    private $max = 100;

    private $min = 0;

    private $majorUnit = 10;

    private $overlap = '100';
    /**
     * Create new instance
     *
     * @param string $type
     * @param array $categories
     * @param array $values
     * @param array $style
     * @param null|mixed $seriesName
     */
    public function __construct($type, $categories, $values, $style = null, $seriesName = null)
    {
        $this->setType($type);
        $this->addSeries($categories, $values, $seriesName);
        $this->style = $this->setNewStyle(new ChartStyle(), $style, true);
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param string $value
     */
    public function setType($value)
    {
        $enum = array('pie', 'doughnut', 'line', 'bar', 'stacked_bar', 'percent_stacked_bar', 'column', 'stacked_column', 'percent_stacked_column', 'area', 'radar', 'scatter');
        $this->type = $this->setEnumVal($value, $enum, 'pie');
    }

    /**
     * Add series
     *
     * @param array $categories
     * @param array $values
     * @param null|mixed $name
     */
    public function addSeries($categories, $values, $name = null)
    {
        $this->series[] = array(
            'categories' => $categories,
            'values'     => $values,
            'name'       => $name,
        );
    }

    /**
     * Get series
     *
     * @return array
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Get chart style
     *
     * @return \PhpOffice\PhpWord\Style\Chart
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * 获取最大值
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * 设置最大值
     * @param int $value
     */
    public function setMax(int $value)
    {
        $this->max = $value;
    }

    /**
     * 获取最大值
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * 设置最大值
     * @param int $value
     */
    public function setMin(int $value)
    {
        $this->min = $value;
    }

    /**
     * 获取雷达图的步进
     * @return int
     */
    public function getMajorUnit()
    {
        return $this->majorUnit;
    }

    /**
     * 设置雷达图的步进
     * @param int $value
     */
    public function setMajorUnit(int $value)
    {
        $this->majorUnit = $value;
    }

    /**
     * 设置系列重叠
     * @param string $value
     */

    public function setOverLap(string $value)
    {
        $this->overlap = $value;
    }

    /**
     * 设置系列重叠
     * @return string
     */
    public function getOverLap()
    {
        return $this->overlap;
    }
}
